<?php


namespace Bulut\ArchiveService;


class GetReportListResponse
{
    public $Result;
    public $Reports;

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
    public function getReports()
    {
        return $this->Reports;
    }
}