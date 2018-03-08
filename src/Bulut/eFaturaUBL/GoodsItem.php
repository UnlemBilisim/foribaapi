<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:58
 */

namespace Bulut\eFaturaUBL;


class GoodsItem
{
    /**
     * @var |Array (val = string, attrs = [currencyID="TRY"] )
     */
    public $ValueAmount;

    /**
     * @var |Bulut|eFaturaUBL|InvoiceLine
     */
    public $InvoiceLine;

    /**
     * @var |String
     */
    public $RequiredCustomsID;
}