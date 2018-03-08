<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 18:10
 */

namespace Bulut\eFaturaUBL;


class FinancialAccount
{
    /**
     * @var |String
     */
    public $ID;

    /**
     * @var |String
     */
    public $CurrencyCode;

    /**
     * @var |String
     */
    public $PaymentNote;

    /**
     * @var \Bulut\eFaturaUBL\FinancialInstitutionBranch
     */
    public $FinancialInstitutionBranch;

}