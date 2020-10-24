<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 27.12.2017
 * Time: 16:46
 */

namespace Bulut\SMMService;


class GetDocumentResponse
{
    public $UUID;
    public $ID;
    public $Type;
    public $ViewType;
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
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @return mixed
     */
    public function getViewType()
    {
        return $this->ViewType;
    }

    /**
     * @return mixed
     */
    public function getDocData()
    {
        return $this->DocData;
    }



}