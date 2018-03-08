<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 12:37
 */

namespace Bulut\ArchiveService;


class GetSignedInvoiceResponse
{
    public $UUID;
    public $vkn;
    public $invoiceNumber;
    public $Detail;
    public $Hash;
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
        return $this->vkn;
    }

    /**
     * @return mixed
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }


    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->Detail;
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->Hash;
    }

    /**
     * @return mixed
     */
    public function getBinaryData()
    {
        return $this->binaryData;
    }



}