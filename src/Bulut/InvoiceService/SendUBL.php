<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 11:46
 */

namespace Bulut\InvoiceService;


class SendUBL
{
    public $soapAction = "sendUBL";
    public $methodName = "sendUBLRequest";
    public $VKN_TCKN;
    public $SenderIdentifier;
    public $ReceiverIdentifier;
    public $DocType;
    public $DocData;

    /**
     * @param mixed $VKN_TCKN
     */
    public function setVKNTCKN($VKN_TCKN)
    {
        $this->VKN_TCKN = $VKN_TCKN;
    }

    /**
     * @param mixed $DocType
     */
    public function setDocType($DocType)
    {
        $this->DocType = $DocType;
    }

    /**
     * @param mixed $SenderIdentifier
     */
    public function setSenderIdentifier($SenderIdentifier)
    {
        $this->SenderIdentifier = $SenderIdentifier;
    }

    /**
     * @param mixed $ReceiverIdentifier
     */
    public function setReceiverIdentifier($ReceiverIdentifier)
    {
        $this->ReceiverIdentifier = $ReceiverIdentifier;
    }

    /**
     * @param mixed $DocData
     */
    public function setDocData($DocData)
    {
        $this->DocData = $DocData;
    }


}