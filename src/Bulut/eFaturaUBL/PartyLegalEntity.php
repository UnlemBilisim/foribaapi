<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:40
 */

namespace Bulut\eFaturaUBL;


class PartyLegalEntity
{
    /**
     * @var |String
     */
    public $RegistrationName;

    /**
     * @var |String
     */
    public $CompanyID;

    /**
     * @var \Bulut\eFaturaUBL\HeadOfficeParty
     */
    public $HeadOfficeParty;
}