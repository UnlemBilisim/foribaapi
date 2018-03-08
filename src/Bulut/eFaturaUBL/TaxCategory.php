<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:29
 */

namespace Bulut\eFaturaUBL;


class TaxCategory
{
    /**
     * @var |Bulut|eFaturaUBL|TaxScheme
     */
    public $TaxScheme;

    /**
     * @var |String
     */
    public $TaxExemptionReasonCode;

    /**
     * @var |String
     */
    public $TaxExemptionReason;
}