<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:25
 */

namespace Bulut\eFaturaUBL;


class TaxSubtotal
{
    /**
     * @var |Array (val = string, attrs = [ currencyID="TRY"] )
     */
    public $TaxableAmount;

    /**
     * @var |Array (val = string, attrs = [ currencyID="TRY"] )
     */
    public $TaxAmount;

    /**
     * @var |String
     */
    public $CalculationSequenceNumeric;

    /**
     * @var |String
     */
    public $Percent;

    /**
     * @var |Bulut|eFaturaUBL|TaxCategory
     */
    public $TaxCategory;

}