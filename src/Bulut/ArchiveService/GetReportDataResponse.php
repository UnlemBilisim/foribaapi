<?php


namespace Bulut\ArchiveService;


class GetReportDataResponse
{
    public $Result;
    public $Detail;
    public $binaryData;

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
    public function getDetail()
    {
        return $this->Detail;
    }

    /**
     * @return mixed
     */
    public function getBinaryData()
    {
        return $this->binaryData;
    }


}
