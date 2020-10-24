<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 00:10
 */

namespace Bulut\DespatchService;

class GetDesEnvelopeStatus
{
    public $soapAction = "getDesEnvelopeStatus";
    public $methodName = "getDesEnvelopeStatusRequest";
    public $Identifier;
    public $VKN_TCKN;
    public $UUID;
    public $Parameters;

    /**
     * @param mixed $Identifier
     */
    public function setIdentifier($Identifier)
    {
        $this->Identifier = $Identifier;
    }

    /**
     * @param mixed $VKN_TCKN
     */
    public function setVKNTCKN($VKN_TCKN)
    {
        $this->VKN_TCKN = $VKN_TCKN;
    }

    /**
     * @param mixed $UUID
     */
    public function setUUID($UUID)
    {
        $this->UUID = $UUID;
    }

    /**
     * @param mixed $Parameters
     */
    public function setParameters($Parameters)
    {
        $this->Parameters = $Parameters;
    }


}
