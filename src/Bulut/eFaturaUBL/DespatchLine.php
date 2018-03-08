<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:49
 */

namespace Bulut\eFaturaUBL;


class DespatchLine
{
    /**
     * @var |String
     */
    public $ID;

    /**
     * @var |Array (val = string, attrs = [unitCode="C62"] )
     */
    public $DeliveredQuantity;

    /**
     * @var |Array (val = string, attrs = [unitCode="C62"] )
     */
    public $OutstandingQuantity;

    /**
     * @var |String
     */
    public $OutstandingReason;

    /**
     * @var |Bulut|eFaturaUBL|OrderLineReference
     */
    public $OrderLineReference;

    /**
     * @var |Bulut|eFaturaUBL|Item
     */
    public $Item;

    /**
     * @var |Bulut|eFaturaUBL|Shipment
     */
    public $Shipment;
}