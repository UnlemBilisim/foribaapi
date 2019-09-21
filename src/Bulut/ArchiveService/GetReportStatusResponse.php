<?php


namespace Bulut\ArchiveService;


class GetReportStatusResponse
{
    public $Result;
    public $StatusCode;
    public $Detail;

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
    public function getStatusCode()
    {
        return $this->StatusCode;
    }

    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->Detail;
    }


}