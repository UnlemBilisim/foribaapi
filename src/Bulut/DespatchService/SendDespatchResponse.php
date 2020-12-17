<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 25.12.2017
 * Time: 23:07
 */

namespace Bulut\DespatchService;


class SendDespatchResponse
{
    public $EnvUUID;
    public $UUID;
    public $ID;
    public $CustDesID;

    /**
     * @return mixed
     */
    public function getEnvUUID()
    {
        return $this->EnvUUID;
    }

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
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return mixed
     */
    public function getCustDesID()
    {
        return $this->CustDesID;
    }


}