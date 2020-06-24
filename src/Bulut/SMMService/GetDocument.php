<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 10:35
 */

namespace Bulut\SMMService;

class GetDocument
{
    public $soapAction = "getDocument";
    public $methodName = "getDocumentRequest";
    public $prefix = false;
    public $namespace = "http://foriba.com/eSmm/";

    public $VKN_TCKN;
    public $GetDocDetails = [];

    /**
     * @param mixed $VKN_TCKN
     */
    public function setVKNTCKN($VKN_TCKN)
    {
        $this->VKN_TCKN = $VKN_TCKN;
    }

    /**
     * @param array $GetDocDetails
     */
    public function setGetDocDetails(array $GetDocDetails)
    {
        $this->GetDocDetails = $GetDocDetails;
    }


}