<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 11:28
 */

namespace Bulut\InvoiceService;


class GetUserListResponse
{
    public $Identifier;
    public $Alias;
    public $Title;
    public $Type;
    public $RegisterTime;
    public $FirstCreationTime;

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->Identifier;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->Alias;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->Title;
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
    public function getRegisterTime()
    {
        return $this->RegisterTime;
    }

    /**
     * @return mixed
     */
    public function getFirstCreationTime()
    {
        return $this->FirstCreationTime;
    }


}