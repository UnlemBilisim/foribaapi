<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 17:30
 */

namespace Bulut\eFaturaUBL;


class PayeeFinancialAccount
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
     * @var \Bulut\eFaturaUBL\FinancialInstitutionBranch
     */
    public $FinancialInstitutionBranch;
}