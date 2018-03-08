<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 11:18
 */

namespace Bulut\InvoiceService;


class GetUserList
{
    public $soapAction = "getUserList";
    public $methodName = "getUserListRequest";
    public $Identifier;
    public $VKN_TCKN;
    public $Role;
    public $RegisteredAfter;
    public $Filter_VKN_TCKN;

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
     * @param mixed $Role
     */
    public function setRole($Role)
    {
        $this->Role = $Role;
    }

    /**
     * @param mixed $RegisteredAfter
     */
    public function setRegisteredAfter($RegisteredAfter)
    {
        $this->RegisteredAfter = $RegisteredAfter;
    }

    /**
     * @param mixed $Filter_VKN_TCKN
     */
    public function setFilterVKNTCKN($Filter_VKN_TCKN)
    {
        $this->Filter_VKN_TCKN = $Filter_VKN_TCKN;
    }




}