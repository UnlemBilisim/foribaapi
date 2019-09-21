<?php


namespace Bulut\ArchiveService;


class GetReportData
{
    public $soapAction = "getReportData";
    public $methodName = "getReportDataRequest";
    public $prefix = false;
    public $namespace = "http://fitcons.com/earchive/report";

    public $UUID;
    public $VKN_TCKN;

    /**
     * @return mixed
     */
    public function getUUID()
    {
        return $this->UUID;
    }

    /**
     * @param mixed $UUID
     */
    public function setUUID($UUID)
    {
        $this->UUID = $UUID;
    }

    /**
     * @return mixed
     */
    public function getVKNTCKN()
    {
        return $this->VKN_TCKN;
    }

    /**
     * @param mixed $VKN_TCKN
     */
    public function setVKNTCKN($VKN_TCKN)
    {
        $this->VKN_TCKN = $VKN_TCKN;
    }


}