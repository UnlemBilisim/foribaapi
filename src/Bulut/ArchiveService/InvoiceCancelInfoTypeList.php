<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 19:49
 */

namespace Bulut\ArchiveService;


class InvoiceCancelInfoTypeList
{

    public $invoiceId;
    public $vkn;
    public $branch;
    public $totalAmount;
    public $cancelDate;
    public $custInvID;

    /**
     * @param mixed $invoiceId
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }

    /**
     * @param mixed $vkn
     */
    public function setVkn($vkn)
    {
        $this->vkn = $vkn;
    }

    /**
     * @param mixed $branch
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
    }

    /**
     * @param mixed $totalAmount
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @param mixed $cancelDate
     */
    public function setCancelDate($cancelDate)
    {
        $this->cancelDate = $cancelDate;
    }

    /**
     * @param mixed $custInvID
     */
    public function setCustInvID($custInvID)
    {
        $this->custInvID = $custInvID;
    }


}