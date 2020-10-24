<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 17:50
 */

namespace Bulut\DespatchService;


class GetDesUBLList
{
    public $soapAction = "getDesUBLList";
    public $methodName = "getDesUBLListRequest";
    public $Identifier;
    public $VKN_TCKN;
    public $UUID;
    public $DocType;
    public $Type;
    public $FromDate;
    public $ToDate;

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
     * @param mixed $DocType
     */
    public function setDocType($DocType)
    {
        $this->DocType = $DocType;
    }

    /**
     * @param mixed $Type
     */
    public function setType($Type)
    {
        $this->Type = $Type;
    }

    /**
     * @param mixed $FromDate
     */
    public function setFromDate($FromDate)
    {
        $this->FromDate = date('c', strtotime($FromDate));
    }

    /**
     * @param mixed $ToDate
     */
    public function setToDate($ToDate)
    {
        $this->ToDate = date('c', strtotime($ToDate));
    }

}