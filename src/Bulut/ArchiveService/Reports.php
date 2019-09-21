<?php


namespace Bulut\ArchiveService;


class Reports
{
    public $uuid;
    public $tcknVkn;
    public $periodCode;
    public $sectionStartDate;
    public $sectionEndDate;
    public $partNumber;
    public $invoiceCount;
    public $invoiceTotalAmount;
    public $cancelInvoiceCount;
    public $calcelInvoiceTotalAmount;
    public $gibStatus;

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return mixed
     */
    public function getTcknVkn()
    {
        return $this->tcknVkn;
    }

    /**
     * @return mixed
     */
    public function getPeriodCode()
    {
        return $this->periodCode;
    }

    /**
     * @return mixed
     */
    public function getSectionStartDate()
    {
        return $this->sectionStartDate;
    }

    /**
     * @return mixed
     */
    public function getSectionEndDate()
    {
        return $this->sectionEndDate;
    }

    /**
     * @return mixed
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * @return mixed
     */
    public function getInvoiceCount()
    {
        return $this->invoiceCount;
    }

    /**
     * @return mixed
     */
    public function getInvoiceTotalAmount()
    {
        return $this->invoiceTotalAmount;
    }

    /**
     * @return mixed
     */
    public function getCancelInvoiceCount()
    {
        return $this->cancelInvoiceCount;
    }

    /**
     * @return mixed
     */
    public function getCalcelInvoiceTotalAmount()
    {
        return $this->calcelInvoiceTotalAmount;
    }

    /**
     * @return mixed
     */
    public function getGibStatus()
    {
        return $this->gibStatus;
    }


}