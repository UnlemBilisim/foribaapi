<?php


namespace Bulut\SMMService;


class SendDocDetails
{
    public $UUID;
    public $Type;
    public $DocType;
    public $DocData;
    public $ViewType;
    public $Parameters;

    /**
     * @param mixed $UUID
     */
    public function setUUID($UUID)
    {
        $this->UUID = $UUID;
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
     * @param mixed $DocData
     */
    public function setDocData($DocData)
    {
        $this->DocData = $DocData;
    }

    /**
     * @param mixed $ViewType
     */
    public function setViewType($ViewType)
    {
        $this->ViewType = $ViewType;
    }

    /**
     * @param mixed $Parameters
     */
    public function setParameters($Parameters)
    {
        $this->Parameters = $Parameters;
    }


}