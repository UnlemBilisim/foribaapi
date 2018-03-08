<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 10:37
 */
namespace Bulut\ArchiveService;

class RetriggerOperation
{
    public $soapAction = "retriggerOperation";
    public $methodName = "retriggerServiceRequest";
    public $prefix = false;
    public $namespace = "http://fitcons.com/earchive/invoice";

    public $VKN;
    public $branch;
    public $invoiceID;
    public $invoiceUUID;
    public $customizationParams;

    /**
     * @param mixed $VKN
     */
    public function setVKN($VKN)
    {
        $this->VKN = $VKN;
    }

    /**
     * @param mixed $branch
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
    }

    /**
     * @param mixed $invoiceID
     */
    public function setInvoiceID($invoiceID)
    {
        $this->invoiceID = $invoiceID;
    }

    /**
     * @param mixed $invoiceUUID
     */
    public function setInvoiceUUID($invoiceUUID)
    {
        $this->invoiceUUID = $invoiceUUID;
    }

    /**
     * @param mixed $customizationParams
     */
    public function setCustomizationParams($customizationParams)
    {
        $this->customizationParams = $customizationParams;
    }


}