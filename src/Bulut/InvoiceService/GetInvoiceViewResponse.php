<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 25.12.2017
 * Time: 23:39
 */

namespace Bulut\InvoiceService;


class GetInvoiceViewResponse
{
    public $DocType;
    public $DocData;

    /**
     * @return mixed
     */
    public function getDocData()
    {
        return $this->DocData;
    }

    /**
     * @return mixed
     */
    public function getDocType()
    {
        return $this->DocType;
    }

    /**
     * @param mixed $DocType
     */
    public function setDocType($DocType)
    {
        $this->DocType = $DocType;
    }

    /**
     * @param mixed $DocData
     */
    public function setDocData($DocData)
    {
        $this->DocData = $DocData;
    }





}