<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 00:33
 */
namespace Bulut\FITApi;
use Bulut\Exceptions\GlobalForibaException;
use Bulut\Exceptions\SchemaValidationException;
use Bulut\Exceptions\UnauthorizedException;
use Bulut\InvoiceService\UBLList;
use GuzzleHttp\Client;
use Bulut\InvoiceService\GetEnvelopeStatus;
use Bulut\InvoiceService\GetEnvelopeStatusResponse;
use Bulut\InvoiceService\GetUbl;
use Bulut\InvoiceService\GetUblList;
use Bulut\InvoiceService\GetUblListResponse;
use Bulut\InvoiceService\GetUblResponse;
use Bulut\InvoiceService\GetUserList;
use Bulut\InvoiceService\GetUserListResponse;
use Bulut\InvoiceService\GetInvoiceView;
use Bulut\InvoiceService\GetInvoiceViewResponse;
use Bulut\InvoiceService\SendUBL;
use Bulut\InvoiceService\SendUBLResponse;

class FITInvoiceService {
    private static $TEST_URL = "https://efaturawstest.fitbulut.com/ClientEInvoiceServices/ClientEInvoiceServicesPort.svc";
    private static $PROD_URL = "https://efaturaws.fitbulut.com/ClientEInvoiceServices/ClientEInvoiceServicesPort.svc";
    private static $URL = "";
    private  $client;
    private $headers = [
        'Content-Type' => 'text/xml;charset=UTF-8',
        'Accept' => 'text/xml',
        'Cache-Control' =>  'no-cache',
        'Pragma' => 'no-cache'
    ];
    private $soapXmlPref = "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ein=\"http:/fitcons.com/eInvoice/\">
           <soapenv:Header/>
           <soapenv:Body>
           %s
           </soapenv:Body>
            </soapenv:Envelope>
    ";
    private $soapSubClassPrefix = "ein";

    /**
     * FITInvoiceService constructor.
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

    /**
     * Basic Auth fonksiyonu.
     *
     * @param $username
     * @param $password
     * @return string
     */
    protected function getAuth($username, $password){
        return base64_encode($username.':'.$password);
    }

    /**
     * Nesneyi SOAP/XML Çeviren sınıf.
     *
     * @param $methodName
     * @param $variables
     * @return string
     */
    protected  function makeXml($methodName, $variables){

        $subXml = "";
        foreach ($variables as $key => $val){

            if(is_array($val)){
                foreach ($val as $v) {

                    if(is_object($v)){
                        $get_variables = get_object_vars($v);
                        $methodName = $get_variables['methodName'];
                        $soapAction = $get_variables['soapAction'];
                        unset($get_variables['methodName']);
                        unset($get_variables['soapAction']);
                        $subXml .= '<'.$this->soapSubClassPrefix.':'.$key.'>';
                        foreach ($get_variables as $mainKey => $variable){

                            if(strlen($variable) > 0){
                                $subXml .= '<'.$this->soapSubClassPrefix.':'.$mainKey.'>'.(string)$variable.'</'.$this->soapSubClassPrefix.':'.$mainKey.'>';
                            }

                        }
                        $subXml .= '</'.$this->soapSubClassPrefix.':'.$key.'>';
                        //$subXml = $this->makeXml($methodName, $get_variables);
                    }
                    else{
                        if(strlen($v) > 0)
                            $subXml .= '<'.$this->soapSubClassPrefix.':'.$key.'>'.(string)$v.'</'.$this->soapSubClassPrefix.':'.$key.'>';
                    }

                }
            }else{
                if(strlen($val) > 0)
                    $subXml .= '<'.$this->soapSubClassPrefix.':'.$key.'>'.(string)$val.'</'.$this->soapSubClassPrefix.':'.$key.'>';
            }
        }
        $treeXml = '<'.$this->soapSubClassPrefix.':'.$methodName.'>'.$subXml.'</'.$this->soapSubClassPrefix.':'.$methodName.'>';
        $mainXml = sprintf($this->soapXmlPref, $treeXml);
        return trim($mainXml);
    }

    /**
     * Foribadan gelene cevabı işleyen SOAP/XML sınıfı.
     *
     * @param $responseText
     * @return \SimpleXMLElement
     * @throws GlobalForibaException
     * @throws SchemaValidationException
     * @throws UnauthorizedException
     * @throws \Exception
     */
    protected  function getXml($responseText){
        $soap = simplexml_load_string($responseText);
        $soap->registerXPathNamespace('s', 'http://schemas.xmlsoap.org/soap/envelope/');
        if(isset($soap->xpath('//s:Body/s:Fault')[0])){
            $fault = $soap->xpath('//s:Body/s:Fault')[0];

            if($fault->faultstring == "Unauthorized")
                throw new UnauthorizedException($fault->faultstring, $fault->faultcode);
            else if($fault->faultstring == "Şema validasyon hatası")
            {
                $message = $soap->xpath('//s:Body/s:Fault/detail/ProcessingFault/Message');
                if(isset($message[0]))
                    throw  new SchemaValidationException($message[0]);
                else
                    throw  new SchemaValidationException('Bilinmeyen bir şema hatası oluştu.');
            }
            else if($fault->faultcode == "s:Server"){
                $message = $soap->xpath('//s:Body/s:Fault/detail/ProcessingFault/Message');
                if(isset($message[0])){
                    $fault->faultstring = $message;
                    $fault->faultcode = $soap->xpath('//s:Body/s:Fault/detail/ProcessingFault/Code')[0];
                }
                throw new GlobalForibaException($fault->faultstring, $fault->faultcode);
            }
            else
                throw new \Exception("Fatal Error : Code '".$fault->faultcode."', Message '".$fault->faultstring."' [".$responseText."].");
        }
        return $soap;
    }

    protected  function fillObj(&$object, $data){
        $vars = get_object_vars($object);
        foreach ($vars as $key => $val){
            $object->{$key} = (string)$data->{$key};
        }
    }

    /**
     * İstekleri Foriba üzerine iletmeye yardımcı fonksiyon.
     *
     * @param $request
     * @return mixed
     */
    protected function request($request){
        $get_variables = get_object_vars($request);
        $methodName = $get_variables['methodName'];
        $soapAction = $get_variables['soapAction'];
        unset($get_variables['methodName']);
        unset($get_variables['soapAction']);
        $xmlMake = $this->makeXml($methodName, $get_variables);
        $this->headers['SOAPAction'] = $soapAction;
        $this->headers['Content-Length'] = strlen($xmlMake);
        $response = $this->client->request('POST', self::$URL, [
            'headers' => $this->headers,
            'body' => $xmlMake,
            'http_errors' => false
        ]);
        return $response->getBody()->getContents();
    }

    /**
     * @param GetUserList $request
     * @return array GetUserListResponse
     * @throws
     */
    public function GetUserListRequest(GetUserList $request) //: GetUserListResponse
    {
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $userlist = $soap->xpath('//s:Body')[0];
        $list = [];
        foreach ($userlist->getUserListResponse->User as $user){
            $responseObj = new GetUserListResponse();
            $this->fillObj($responseObj, $user);
            $list[] = $responseObj;
        }
        return $list;
    }

    /**
     * @param GetUblList $request
     * @return array GetUblListResponse
     * @throws
     */
    public function GetUblListRequest(GetUblList $request){
        $responseText = $this->request($request);

        $soap = $this->getXml($responseText);
        $ublList = $soap->xpath('//s:Body')[0];
        $list = [];
        foreach ($ublList->getUBLListResponse->UBLList as $ubl){
            $responseObj = new GetUblListResponse();
            $this->fillObj($responseObj, $ubl);
            $list[] = $responseObj;
        }
        return $list;
    }

    /**
     * @param GetInvoiceView $request
     * @return GetInvoiceViewResponse
     * @throws
     */
    public function GetInvoiceViewRequest(GetInvoiceView $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $body = $soap->xpath('//s:Body')[0];
        $responseObj = new GetInvoiceViewResponse();
        $responseObj->DocData = (string)$body->getInvoiceViewResponse->DocData;
        $responseObj->setDocType($request->DocType);
        return $responseObj;
    }
    /**
     * @param GetUbl $request
     * @return array
     * @throws
     */
    public function GetUblRequest(GetUbl $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $ubl = $soap->xpath('//s:Body')[0];
        $list = [];

        if(count($ubl->getUBLResponse->DocData) > 1){

            foreach ($ubl->getUBLResponse->DocData as $data){
                
                $responseObj = new GetUblResponse();
                $responseObj->DocData = (string)$data;
                $responseObj->setDocType($request->Parameters);
                $list[] = $responseObj;
            }
        }else{
            $responseObj = new GetUblResponse();
            $responseObj->DocData = (string)$ubl->getUBLResponse->DocData;
            $responseObj->setDocType($request->Parameters);
            $list[] = $responseObj;
        }


        return $list;
    }

    /**
     * @param GetEnvelopeStatus $request
     * @return array GetEnvelopeResponse
     * @throws
     */
    public function GetEnvelopeStatusRequest(GetEnvelopeStatus $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $ublList = $soap->xpath('//s:Body')[0];
        $list = [];
        foreach ($ublList->getEnvelopeStatusResponse->Response as $status){
            $responseObj = new GetEnvelopeStatusResponse();
            $this->fillObj($responseObj, $status);
            $list[] = $responseObj;
        }
        return $list;
    }

    /**
     * @param SendUBL $request
     * @return array SendUBLResponse
     * @throws
     */
    public function SendUBLRequest(SendUBL $request){
        $responseText = $this->request($request);
        $soap = $this->getXml($responseText);
        $ublList = $soap->xpath('//s:Body')[0];
        $list = [];
        foreach ($ublList->sendUBLResponse->Response as $status){
            $responseObj = new SendUBLResponse();
            $this->fillObj($responseObj, $status);
            $list[] = $responseObj;
        }
        return $list;
    }
}