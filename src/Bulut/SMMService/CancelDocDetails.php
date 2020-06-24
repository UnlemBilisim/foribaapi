<?php


namespace Bulut\SMMService;


class CancelDocDetails
{
    public $ID;
    public $CustDocID;
    public $Type;
    public $DocType;
    public $TotalAmount;
    public $CancelDate;
    public $Parameters;

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @param mixed $CustDocID
     */
    public function setCustDocID($CustDocID)
    {
        $this->CustDocID = $CustDocID;
    }

    /**
     * @param mixed $Type
     */
    public function setType($Type)
    {
        $this->Type = $Type;
    }

    /**
     * @param mixed $DocType
     */
    public function setDocType($DocType)
    {
        $this->DocType = $DocType;
    }

    /**
     * @param mixed $TotalAmount
     */
    public function setTotalAmount($TotalAmount)
    {
        $this->TotalAmount = $TotalAmount;
    }

    /**
     * @param mixed $CancelDate
     */
    public function setCancelDate($CancelDate)
    {
        $this->CancelDate = $CancelDate;
    }

    /**
     * @param mixed $Parameters
     */
    public function setParameters($Parameters)
    {
        $this->Parameters = $Parameters;
    }


}