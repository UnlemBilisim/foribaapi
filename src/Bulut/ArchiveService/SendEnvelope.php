<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 10:36
 */

namespace Bulut\ArchiveService;

class SendEnvelope
{
    public $soapAction = "sendEnvelope";
    public $methodName = "sendInvoiceRequestType";
    public $prefix = false;
    public $namespace = "http://fitcons.com/earchive/invoice";

    public $senderID;
    public $receiverID;
    public $docType;
    public $fileName;
    public $hash;
    public $binaryData;
    public $customizationParams;

    /**
     * @param mixed $senderID
     */
    public function setSenderID($senderID)
    {
        $this->senderID = $senderID;
    }

    /**
     * @param mixed $receiverID
     */
    public function setReceiverID($receiverID)
    {
        $this->receiverID = $receiverID;
    }

    /**
     * @param mixed $docType
     */
    public function setDocType($docType)
    {
        $this->docType = $docType;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @param mixed $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @param mixed $binaryData
     */
    public function setBinaryData($binaryData)
    {
        $this->binaryData = $binaryData;
    }

    /**
     * @param mixed $customizationParams
     */
    public function setCustomizationParams($customizationParams)
    {
        $this->customizationParams = $customizationParams;
    }


}