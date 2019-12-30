<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 10:36
 */

namespace Bulut\ArchiveService;

class GetInvoiceDocument
{
    public $soapAction = "getInvoiceDocument";
    public $methodName = "getInvoiceDocumentRequestType";
    public $prefix = false;
    public $namespace = "http://fitcons.com/earchive/invoice";

    public $UUID;
    public $vkn;
    public $invoiceNumber;
    public $outputType;
    public $custInvId;

    /**
     * @param mixed $UUID
     */
    public function setUUID($UUID)
    {
        $this->UUID = $UUID;
    }

    /**
     * @param mixed $vkn
     */
    public function setVkn($vkn)
    {
        $this->vkn = $vkn;
    }

    /**
     * @param mixed $invoiceNumber
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    /**
     * @param mixed $outputType
     */
    public function setOutputType($outputType)
    {
        $this->outputType = $outputType;
    }

    /**
     * @param mixed $custInvId
     */
    public function setCustInvId($custInvId)
    {
        $this->custInvId = $custInvId;
    }




}
