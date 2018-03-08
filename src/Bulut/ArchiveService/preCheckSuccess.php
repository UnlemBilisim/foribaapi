<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 27.12.2017
 * Time: 16:47
 */

namespace Bulut\ArchiveService;


class preCheckSuccess
{
    public $UUID;
    public $Vkn;
    public $InvoiceNumber;
    public $SuccessCode;
    public $SuccessDesc;
    public $Filename;
    public $sha256Hash;
    public $binaryData;

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
    public function getSuccessCode()
    {
        return $this->SuccessCode;
    }

    /**
     * @return mixed
     */
    public function getSuccessDesc()
    {
        return $this->SuccessDesc;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->Filename;
    }

    /**
     * @return mixed
     */
    public function getSha256Hash()
    {
        return $this->sha256Hash;
    }

    /**
     * @return mixed
     */
    public function getBinaryData()
    {
        return $this->binaryData;
    }


}
