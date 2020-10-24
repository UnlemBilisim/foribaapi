<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 20:30
 */

namespace Bulut\SMMService;


class CancelDocumentResponse
{
    public $ID;
    public $CustDocID;
    public $Type;
    public $DocType;
    public $Result;
    public $ResultDescription;

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
    public function getCustDocID()
    {
        return $this->CustDocID;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @return mixed
     */
    public function getDocType()
    {
        return $this->DocType;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->Result;
    }

    /**
     * @return mixed
     */
    public function getResultDescription()
    {
        return $this->ResultDescription;
    }


}