<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:11
 */

namespace Bulut\eFaturaUBL;


class Item
{
    /**
     * @var |String
     */
    public $Name;

    /**
     * @var |Bulut|eFaturaUBL|BuyersItemIdentification
     */
    public $BuyersItemIdentification;

    /**
     * @var |Bulut|eFaturaUBL|SellersItemIdentification
     */
    public $SellersItemIdentification;

    /**
     * @var |Bulut|eFaturaUBL|OriginCountry
     */
    public $OriginCountry;
}