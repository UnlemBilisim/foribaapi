<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 10:36
 */
namespace Bulut\SMMService;

class CancelDocument
{
    public $soapAction = "cancelDocument";
    public $methodName = "cancelDocumentRequest";
    public $prefix = false;
    public $namespace = "http://foriba.com/eSmm/";

    public $VKN_TCKN;
    public $Branch = "default";
    public $CancelDocDetails = [];

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
     * @param array $CancelDocDetails
     */
    public function setCancelDocDetails(array $CancelDocDetails)
    {
        $this->CancelDocDetails = $CancelDocDetails;
    }




}