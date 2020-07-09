<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 00:15
 */

namespace Bulut\DespatchService;


class GetDesEnvelopeStatusResponse
{
    public $UUID;
    public $IssueDate;
    public $DocumentTypeCode;
    public $DocumentType;
    public $ResponseCode;
    public $Description;
    public $DocData;

    /**
     * @return mixed
     */
    public function getUUID()
    {
        return $this->UUID;
    }

    /**
     * @return mixed
     */
    public function getIssueDate()
    {
        return $this->IssueDate;
    }

    /**
     * @return mixed
     */
    public function getDocumentTypeCode()
    {
        return $this->DocumentTypeCode;
    }

    /**
     * @return mixed
     */
    public function getDocumentType()
    {
        return $this->DocumentType;
    }

    /**
     * @return mixed
     */
    public function getResponseCode()
    {
        return $this->ResponseCode;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @return mixed
     */
    public function getDocData()
    {
        return $this->DocData;
    }


}