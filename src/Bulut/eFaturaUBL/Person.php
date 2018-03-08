<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 18:08
 */

namespace Bulut\eFaturaUBL;


class Person
{
    /**
     * @var |String
     */
    public $FirstName;

    /**
     * @var |String
     */
    public $FamilyName;

    /**
     * @var |String
     */
    public $Title;

    /**
     * @var |String
     */
    public $MiddleName;

    /**
     * @var |String
     */
    public $NationalityID;

    /**
     * @var \Bulut\eFaturaUBL\FinancialAccount
     */
    public $FinancialAccount;

    /**
     * @var \Bulut\eFaturaUBL\IdentityDocumentReference
     */
    public $IdentityDocumentReference;

}