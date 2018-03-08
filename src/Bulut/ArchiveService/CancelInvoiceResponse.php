<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 20:30
 */

namespace Bulut\ArchiveService;


class CancelInvoiceResponse
{
    public $Result;
    public $invoiceCancellation;

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
    public function getInvoiceCancellation()
    {
        return $this->invoiceCancellation;
    }


}