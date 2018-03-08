<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 10:37
 */
namespace Bulut\ArchiveService;

class RetriggerOperationResponse
{
    public $Result;
    public $responseCode;
    public $responsedetail;

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
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @return mixed
     */
    public function getResponsedetail()
    {
        return $this->responsedetail;
    }





}