<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 23:58
 */

namespace Bulut\DespatchService;


class GetDesUBLResponse
{
    public $DocData;
    public $DocType;

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




}