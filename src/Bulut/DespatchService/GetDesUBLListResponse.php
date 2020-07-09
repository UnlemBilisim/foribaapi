<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 18:23
 */

namespace Bulut\DespatchService;


class GetDesUBLListResponse
{
    public $UUID;
    public $Identifier;
    public $VKN_TCKN;
    public $EnvType;
    public $InsertDateTime;
    public $ID;
    public $EnvUUID;

    /**
     * @return mixed
     */
    public function getUUID()
    {
        return $this->UUID;
    }

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->Identifier;
    }

    /**
     * @return mixed
     */
    public function getVKNTCKN()
    {
        return $this->VKN_TCKN;
    }

    /**
     * @return mixed
     */
    public function getEnvType()
    {
        return $this->EnvType;
    }

    /**
     * @return mixed
     */
    public function getInsertDateTime()
    {
        return $this->InsertDateTime;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return mixed
     */
    public function getEnvUUID()
    {
        return $this->EnvUUID;
    }



}