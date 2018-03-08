<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:34
 */

namespace Bulut\eFaturaUBL;


class AllowanceCharge
{
    /**
     * @var |String
     */
    public $ChargeIndicator;

    /**
     * @var |String
     */
    public $MultiplierFactorNumeric;

    /**
     * @var |Array (val = string, attrs = [currencyID="TRY"] )
     */
    public $Amount;

    /**
     * @var |Array (val = string, attrs = [currencyID="TRY"] )
     */
    public $BaseAmount;

}