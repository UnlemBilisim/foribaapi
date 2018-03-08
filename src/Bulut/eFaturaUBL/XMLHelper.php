<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 00:50
 */

namespace Bulut\eFaturaUBL;


class XMLHelper
{

    private $object = "";

    private $namespaces = [
        'xmlns' => "urn:oasis:names:specification:ubl:schema:xsd:ApplicationResponse-2",
        'xmlns:cac' => "urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2",
        'xmlns:cbc' => "urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2",
        'xmlns:ds' => "http://www.w3.org/2000/09/xmldsig#",
        'xmlns:ext' => "urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2",
        'xmlns:ns8' => "urn:oasis:names:specification:ubl:schema:xsd:ApplicationResponse-2",
        'xmlns:xades' => "http://uri.etsi.org/01903/v1.3.2#",
        'xmlns:xsi' => "http://www.w3.org/2001/XMLSchema-instance",
        'xsi:schemaLocation' => "urn:oasis:names:specification:ubl:schema:xsd:Invoice-2 UBL-Invoice-2.1.xsd"
    ];



    public function  __construct($object)
    {
        $this->object = $object;
    }

    private function makeXml($object, &$xml){

        $data = get_object_vars($object);

        foreach ($data as $key => $val){
            if(is_object($val)){
                $xml .= '<cac:'.$key.'>';
                $this->makeXml($val, $xml);
                $xml .= '</cac:'.$key.'>';
            }else{
                if(is_array($val)){
                    if(isset($val['val'])){

                        $xml .= '<cbc:'.$key.' '.implode(' ', $val['attrs']).'>'.$val['val'].'</cbc:'.$key.'>';
                    }else{
                        foreach ($val as $v){
                            if(is_object($v)){
                                $xml .= '<cac:'.$key.'>';
                                $this->makeXml($v, $xml);
                                $xml .= '</cac:'.$key.'>';
                            }else{

                                $xml .= '<cbc:'.$key.'>'.$v.'</cbc:'.$key.'>';
                            }
                        }
                    }

                }else{
                    if(!empty($val))
                        $xml .= '<cbc:'.$key.'>'.$val.'</cbc:'.$key.'>';
                }

            }
        }

    }

    private function makeNamespaces(){
        $ns = [];
        foreach ($this->namespaces as $key => $val){
            $ns[] = $key.'="'.$val.'"';
        }
        return $ns;
    }

    public function getApplicationResponseXML(){
        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xml .= "<ApplicationResponse ".implode(' ', $this->makeNamespaces()).">";
        $this->makeXml($this->object, $xml);
        $xml .= "</ApplicationResponse>";

        return $xml;
    }

    public function getInvoiceResponseXML(){

        $this->namespaces['xmlns'] = "urn:oasis:names:specification:ubl:schema:xsd:Invoice-2";
        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xml .= "<Invoice ".implode(' ', $this->makeNamespaces()).">";
        $xml .= '<ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent>
                <ds:Signature>
                    <ds:SignedInfo>
                        <ds:CanonicalizationMethod Algorithm=""/>
                        <ds:SignatureMethod Algorithm=""/>
                        <ds:Reference>
                            <ds:DigestMethod Algorithm=""/>
                            <ds:DigestValue/>
                        </ds:Reference>
                    </ds:SignedInfo>
                    <ds:SignatureValue/>
                </ds:Signature>
            </ext:ExtensionContent>
        </ext:UBLExtension>
    </ext:UBLExtensions>';
        $this->makeXml($this->object, $xml);
        $xml .= "</Invoice>";

        return $xml;
    }

    public static function CreateGUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}