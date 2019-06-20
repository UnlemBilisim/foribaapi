<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:03
 */

namespace Bulut\eFaturaUBL;


class InvoiceLine
{
    /**
     * @var |String
     */
    public $ID;

    /**
     * @var |String
     */
    public $InvoicedQuantity;

    /**
     * @var |Array (val = string, attrs = [currencyID="TRY"] )
     */
    public $LineExtensionAmount;

    /**
     * @var |Bulut|eFaturaUBL|AllowanceCharge
     */
    public $AllowanceCharge;
    
    /**
     * @var |Bulut|eFaturaUBL|TaxTotal
     */
    public $TaxTotal;
    
   /**
     * @var |Bulut|eFaturaUBL|Item
     */
    
    public $Item;

    /**
     * @var |Bulut|eFaturaUBL|Price
     */
    
    public $Price;
    /**
     * @var Array
     */
    public $Note;


}
