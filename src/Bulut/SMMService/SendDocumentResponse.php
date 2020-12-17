<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 27.12.2017
 * Time: 16:46
 */

namespace Bulut\SMMService;


class SendDocumentResponse
{
    public $UUID;
    public $ID;
    public $CustDocID;
    public $Type;
    public $DocType;
    public $ViewData;

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
    public function getViewData()
    {
        return $this->ViewData;
    }


}