<?php


namespace Bulut\ArchiveService;


class GetReportList
{
    public $soapAction = "getReportList";
    public $methodName = "getReportListRequest";
    public $prefix = false;
    public $namespace = "http://fitcons.com/earchive/report";

    public $startDate;
    public $endDate;
    public $vkn;
    public $approved;

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getVkn()
    {
        return $this->vkn;
    }

    /**
     * @param mixed $vkn
     */
    public function setVkn($vkn)
    {
        $this->vkn = $vkn;
    }

    /**
     * @return mixed
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * @param mixed $approved
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    }
}