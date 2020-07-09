<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 09:54
 */

namespace Bulut\FITApi;


use Bulut\Exceptions\GlobalForibaException;
use Bulut\Exceptions\SchemaValidationException;
use Bulut\Exceptions\UnauthorizedException;
use Bulut\SMMService\CancelDocument;
use Bulut\SMMService\CancelDocumentResponse;
use Bulut\SMMService\GetDocument;
use Bulut\SMMService\GetDocumentResponse;
use Bulut\SMMService\SendDocument;
use Bulut\SMMService\SendDocumentResponse;
use GuzzleHttp\Client;

class FITMMService
{
    private static $TEST_URL = "https://earsivwstest.fitbulut.com/ClientEMmServicesPort.svc";
    private static $PROD_URL = "https://earsivws.fitbulut.com/ClientEMmServicesPort.svc";
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
            } else if(is_array($val)){
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
                    throw new SchemaValidationException(implode('","', $fault_array['detail']["message"]));
                }
                else
                    throw new SchemaValidationException('Bilinmeyen bir şema hatası oluştu.');
            }

            //$detail = (isset($fault_array['detail']) ? implode('","', isset($fault_array['detail']["processingFaultType"]) : '');
            throw new GlobalForibaException("Fatal Error, Code : ".$fault_array['faultcode']." String : ".$fault_array['faultstring']);
        }

        return $soap;
    }

    private function fillObj(&$object, $data){

        $arr = [];
        $this->xml2array($data, $arr);

        foreach ($arr as $key => $val){

            if(is_array($val)){
                $pathClass = "\\Bulut\\SMMService\\".$key;
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


        if(get_class($request) == CancelDocument::class){
            $xmlMake = str_replace(['get:', ':get'],['esmm:', ':esmm'], $xmlMake);
        }

        if(get_class($request) == SendDocument::class){
            $xmlMake = str_replace(['get:', ':get'],['esmm:', ':esmm'], $xmlMake);
        }

        if(get_class($request) == GetDocument::class){
            $xmlMake = str_replace(['get:', ':get'],['esmm:', ':esmm'], $xmlMake);
        }

        $response = $this->client->request('POST', self::$URL, [
            'headers' => $this->headers,
            'body' => $xmlMake,
            'http_errors' => false,
            'debug' => true
        ]);
        $responseBody = $response->getBody()->getContents();
        return $responseBody;
    }

    public function GetDocumentRequest(GetDocument $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];
        $responseObj = new GetDocumentResponse();
        $this->fillObj($responseObj, $responseData->getDocumentResponse->getDocumentResponse);
        return $responseObj;
    }

    public function SendDocumentRequest(SendDocument $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];
        $responseObj = new SendDocumentResponse();
        $this->fillObj($responseObj, $responseData->sendDocumentResponse->SendDocumentResponse);

        return $responseObj;
    }

    public function CancelDocumentRequest(CancelDocument $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $responseData = $soap->xpath('//s:Body')[0];
        $responseObj = new CancelDocumentResponse();
        $this->fillObj($responseObj, $responseData->cancelDocumentResponse->cancelDocumentResponse);

        return $responseObj;
    }
}
