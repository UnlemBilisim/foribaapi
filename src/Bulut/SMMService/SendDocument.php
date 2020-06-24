<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 10:35
 */

namespace Bulut\SMMService;

class SendDocument
{

    public $soapAction = "sendDocument";
    public $methodName = "sendDocumentRequest";
    public $prefix = false;
    public $namespace = "http://foriba.com/eSmm/";

    public $VKN_TCKN;
    public $Branch = "default";
    public $SendDocDetails = [];

    /**
     * @param mixed $VKN_TCKN
     */
    public function setVKNTCKN($VKN_TCKN)
    {
        $this->VKN_TCKN = $VKN_TCKN;
    }

    /**
     * @param string $Branch
     */
    public function setBranch(string $Branch)
    {
        $this->Branch = $Branch;
    }

    /**
     * @param array $SendDocDetails
     */
    public function setSendDocDetails(array $SendDocDetails)
    {
        $this->SendDocDetails = $SendDocDetails;
    }





}