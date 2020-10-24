<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 09:54
 */

namespace Bulut\FITApi;


use Bulut\ArchiveService\GetReportData;
use Bulut\ArchiveService\GetReportDataResponse;
use Bulut\ArchiveService\GetReportList;
use Bulut\ArchiveService\GetReportListRequest;
use Bulut\ArchiveService\GetReportListResponse;
use Bulut\ArchiveService\GetReportStatus;
use Bulut\ArchiveService\GetReportStatusResponse;
use Bulut\Exceptions\GlobalForibaException;
use Bulut\Exceptions\SchemaValidationException;
use Bulut\Exceptions\UnauthorizedException;
use GuzzleHttp\Client;
use Bulut\ArchiveService\CancelInvoice;
use Bulut\ArchiveService\CancelInvoiceResponse;
use Bulut\ArchiveService\GetSignedInvoice;
use Bulut\ArchiveService\GetSignedInvoiceResponse;
use Bulut\ArchiveService\GetUserList;
use Bulut\ArchiveService\GetUsertListResponse;
use Bulut\ArchiveService\GetInvoiceDocument;
use Bulut\ArchiveService\GetInvoiceDocumentResponse;
use Bulut\ArchiveService\RetriggerOperation;
use Bulut\ArchiveService\RetriggerOperationResponse;
use Bulut\ArchiveService\SendEnvelope;
use Bulut\ArchiveService\SendEnvelopeResponse;
use Bulut\ArchiveService\SendInvoice;
use Bulut\ArchiveService\SendInvoiceResponse;


class FITArchiveService
{
    private static $TEST_URL = "https://earsivwstest.fitbulut.com/ClientEArsivServicesPort.svc";
    private static $PROD_URL = "https://earsivws.fitbulut.com/ClientEArsivServicesPort.svc";
    private static $URL = "";

    private  $client;
    private $headers = [
        'Content-Type' => 'text/xml;charset=UTF-8',
        'Accept' => 'text/xml',
        'Cache-Control' =>  'no-cache',
        'Pragma' => 'no-cache'
    ];

    private $soapXmlPref = "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:get=\"{namespace}\">
           <soapenv:Header/>
           <soapenv:Body>
           %s
           </soapenv:Body>
            </soapenv:Envelope>
    ";


    private $soapSubClassPrefix = "get";

    private $lastRequest;
    private $lastResponse;

    /**
     * FITArchiveService constructor.
     * @param array $options
     * @param bool $isTest
     *
     *
     */
    public function __construct($options = [], $isTest = false)
    {

        self::$URL = self::$PROD_URL;
        if($isTest){
            self::$URL = self::$TEST_URL;
        }

        $parsed_url = parse_url(self::$URL);
        $this->headers['Host'] = $parsed_url['host'];
        $this->headers['Authorization'] = "Basic ".$this->getAuth($options['username'], $options['password']);

        $this->client = new Client();
    }

    public function getLastRequest(){
        return $this->lastRequest;
    }

    public function getLastResponse(){
        return $this->lastResponse;
    }

    /**
    * @param string $TEST_URL
    */
    public static function setTestUrl($TEST_URL)
    {
        self::$TEST_URL = $TEST_URL;
    }

    /**
     * @param string $PROD_URL
     */
    public static function setProdUrl($PROD_URL)
    {
        self::$PROD_URL = $PROD_URL;
    }


    /**
     * @param string $soapXmlPref
     */
    public function setSoapXmlPref($soapXmlPref)
    {
        $this->soapXmlPref = $soapXmlPref;
    }

    /**
     * @param string $soapSubClassPrefix
     */
    public function setSoapSubClassPrefix($soapSubClassPrefix)
    {
        $this->soapSubClassPrefix = $soapSubClassPrefix;
    }

    private function getAuth($username, $password){
        return base64_encode($username.':'.$password);
    }

    private function makeSubXml($variables, &$subXml, $prefix, $namespace){

        foreach ($variables as $key => $val){
            if(is_object($val)){
                $this->makeSubXml($val, $subXml, $prefix, $namespace);
            } else{
                if(strlen($val) > 0)
                    $subXml .= '<'.($prefix ? $this->soapSubClassPrefix.':' : '').''.$key.'>'.(string)$val.'</'.($prefix ? $this->soapSubClassPrefix.':' : '').''.$key.'>';
            }

        }
    }

    private function makeXml($methodName, $variables, $prefix, $namespace){

        $subXml = "";
        foreach ($variables as $key => $val)
        {
            if(is_array($val) && count($val) == 0){

                $subXml .= '<'.($prefix ? $this->soapSubClassPrefix.':' : '').''.$key.'/>';

            }else{

                $subXml .= '<'.($prefix ? $this->soapSubClassPrefix.':' : '').''.$key.'>';
                if(is_array($val) || is_object($val)){
                    $this->makeSubXml($val, $subXml, $prefix, $namespace);
                }
                else
                {
                    if(strlen($val) > 0)
                        $subXml .= (string)$val;
                }

                $subXml .='</'.($prefix ? $this->soapSubClassPrefix.':' : '').$key.'>';
            }
        }
        $treeXml = '<'.$this->soapSubClassPrefix.':'.$methodName.'>'.$subXml.'</'.$this->soapSubClassPrefix.':'.$methodName.'>';
        $replaced = str_replace('{namespace}', $namespace, $this->soapXmlPref);
        $mainXml = sprintf($replaced, $treeXml);
        return trim($mainXml);

    }

    private function getXml($responseText){

        $soap = simplexml_load_string($responseText);
        $soap->registerXPathNamespace('s', 'http://schemas.xmlsoap.org/soap/envelope/');

        if(isset($soap->xpath('//s:Body/s:Fault')[0]))
        {
            $fault = $soap->xpath('//s:Body/s:Fault')[0];
            $fault_array = [];
            $this->xml2array($fault, $fault_array);

            if($fault->faultstring == "Unauthorized")
                throw new UnauthorizedException($fault_array['faultstring'], (int)$fault_array['faultcode']);
            else if($fault->faultstring == "Şema validasyon hatası")
            {
                if(isset($fault_array['detail'])){
                    throw new SchemaValidationException(implode('","', $fault_array['detail']["processingFaultType"]));
                }
                else
                    throw new SchemaValidationException('Bilinmeyen bir şema hatası oluştu.');
            }

            $detail = (isset($fault_array['detail']) ? implode('","', $fault_array['detail']["processingFaultType"]) : '');
            throw new GlobalForibaException("Fatal Error, Code : ".$fault_array['faultcode']." String : ".$fault_array['faultstring'].". Detail : \"".$detail.'""');
        }

        return $soap;
    }

    private function fillObj(&$object, $data){

        $arr = [];
        $this->xml2array($data, $arr);

        foreach ($arr as $key => $val){

            if(is_array($val)){
                $pathClass = "\\Bulut\\ArchiveService\\".$key;
                $nobje = new $pathClass();

                foreach ($val as $key2 => $val2){
                    $nobje->{$key2} = $val2;
                }
                $object->{$key} = $nobje;
            }else{
                $object->{$key} = $val;
            }
        }
    }

    private function xml2array ( $xmlObject, &$out = array () )
    {
        foreach ( (array) $xmlObject as $index => $node )
            $out[$index] = ( is_object ( $node ) ) ? $this->xml2array ( $node ) : $node;

        return $out;
    }

    protected function request($request){

        $get_variables = get_object_vars($request);
        $methodName = $get_variables['methodName'];
        $soapAction = $get_variables['soapAction'];
        $prefix = $get_variables['prefix'];
        $namespace = $get_variables['namespace'];
        unset($get_variables['methodName']);
        unset($get_variables['soapAction']);
        unset($get_variables['prefix']);
        unset($get_variables['namespace']);
        $xmlMake = $this->makeXml($methodName, $get_variables, $prefix, $namespace);


        $this->headers['SOAPAction'] = $soapAction;
        $this->headers['Content-Length'] = strlen($xmlMake);


        if(get_class($request) == CancelInvoice::class){
            $xmlMake = str_replace(['get:', ':get'],['inv:', ':inv'], $xmlMake);
        }

        if(get_class($request) == SendInvoice::class){
            $xmlMake = str_replace(['get:', ':get'],['inv:', ':inv'], $xmlMake);
        }

        if(get_class($request) == SendEnvelope::class){
            $xmlMake = str_replace(['get:', ':get'],['inv:', ':inv'], $xmlMake);
        }
        $this->lastRequest = $xmlMake;

        $response = $this->client->request('POST', self::$URL, [
            'headers' => $this->headers,
            'body' => $xmlMake,
            'http_errors' => false
        ]);
        $body = $response->getBody()->getContents();
        $this->lastResponse = $body;
        return $body;
    }

    public function GetInvoiceDocumentRequest(GetInvoiceDocument $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];
        $responseObj = new GetInvoiceDocumentResponse();
        $this->fillObj($responseObj, $responseData->getInvoiceDocumentResponseType);
        return $responseObj;
    }

    public function GetSignedInvoiceRequest(GetSignedInvoice $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];
        $responseObj = new GetSignedInvoiceResponse();
        $this->fillObj($responseObj, $responseData->getSignedInvoiceResponseType);

        return $responseObj;
    }

    public function GetUserListRequest(GetUserList $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];
        $responseObj = new GetUsertListResponse();
        $this->fillObj($responseObj, $responseData->getUserListResponse);

        return $responseObj;
    }

    public function GetRetriggerOperationRequest(RetriggerOperation $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];
        $responseObj = new RetriggerOperationResponse();
        $this->fillObj($responseObj, $responseData->retriggerServiceResponse);

        return $responseObj;
    }

    public function CancelInvoiceRequest(CancelInvoice $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];
        $responseObj = new CancelInvoiceResponse();
        $this->fillObj($responseObj, $responseData->invoiceCancellationServiceResponseType);

        return $responseObj;
    }

    public function SendInvoiceRequest(SendInvoice $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];
        $responseObj = new SendInvoiceResponse();
        $this->fillObj($responseObj, $responseData->sendInvoiceResponseType);

        return $responseObj;
    }


    public function SendEnvelopeRequest(SendEnvelope $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];
        $responseObj = new SendEnvelopeResponse();
        $this->fillObj($responseObj, $responseData->sendInvoiceResponseType);

        return $responseObj;
    }

    public function GetReportList(GetReportList $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];

        $responseObj = new GetReportListResponse();
        $this->fillObj($responseObj, $responseData->getReportListResponse);

        unset($responseObj->Reports->uuid);
        unset($responseObj->Reports->tcknVkn);
        unset($responseObj->Reports->periodCode);
        unset($responseObj->Reports->sectionStartDate);
        unset($responseObj->Reports->sectionEndDate);
        unset($responseObj->Reports->partNumber);
        unset($responseObj->Reports->invoiceCount);
        unset($responseObj->Reports->invoiceTotalAmount);
        unset($responseObj->Reports->cancelInvoiceCount);
        unset($responseObj->Reports->calcelInvoiceTotalAmount);
        unset($responseObj->Reports->gibStatus);

        return $responseObj;
    }

    public function GetReportData(GetReportData $request){
        $responseText = $this->request($request);

        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];

        $responseObj = new GetReportDataResponse();
        $this->fillObj($responseObj, $responseData->getReportDataResponse);

        return $responseObj;
    }

    public function GetReportStatus(GetReportStatus $request){
        $responseText = $this->request($request);

        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];

        $responseObj = new GetReportStatusResponse();
        $this->fillObj($responseObj, $responseData->getReportStatusResponseType);

        return $responseObj;
    }
}
