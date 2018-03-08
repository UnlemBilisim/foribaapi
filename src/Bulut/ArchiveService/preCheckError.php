<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 27.12.2017
 * Time: 16:51
 */

namespace Bulut\ArchiveService;


class preCheckError
{
    public $UUID;
    public $Vkn;
    public $InvoiceNumber;
    public $ErrorCode;
    public $ErrorDesc;
    public $Filename;

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
    public function getVkn()
    {
        return $this->Vkn;
    }

    /**
     * @return mixed
     */
    public function getInvoiceNumber()
    {
        return $this->InvoiceNumber;
    }

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->ErrorCode;
    }

    /**
     * @return mixed
     */
    public function getErrorDesc()
    {
        return $this->ErrorDesc;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->Filename;
    }


}