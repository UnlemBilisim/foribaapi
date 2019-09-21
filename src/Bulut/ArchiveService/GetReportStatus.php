<?php


namespace Bulut\ArchiveService;


class GetReportStatus
{
    public $soapAction = "getReportStatus";
    public $methodName = "getReportStatusRequestType";
    public $prefix = false;
    public $namespace = "http://fitcons.com/earchive/report";

    public $UUID;
    public $VKN;

    /**
     * @param mixed $UUID
     */
    public function setUUID($UUID)
    {
        $this->UUID = $UUID;
    }

    /**
     * @param mixed $VKN
     */
    public function setVKN($VKN)
    {
        $this->VKN = $VKN;
    }


}