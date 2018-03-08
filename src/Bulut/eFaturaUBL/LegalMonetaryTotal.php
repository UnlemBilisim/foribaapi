<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:32
 */

namespace Bulut\eFaturaUBL;


class LegalMonetaryTotal
{
    /**
     * @var |Array (val = string, attrs = [currencyID="TRY"] )
     */
    public $LineExtensionAmount;

    /**
     * @var |Array (val = string, attrs = [currencyID="TRY"] )
     */
    public $TaxExclusiveAmount;

    /**
     * @var |Array (val = string, attrs = [currencyID="TRY"] )
     */
    public $TaxInclusiveAmount;

    /**
     * @var |Array (val = string, attrs = [currencyID="TRY"] )
     */
    public $AllowanceTotalAmount;

    /**
     * @var |Array (val = string, attrs = [currencyID="TRY"] )
     */
    public $PayableAmount;

}