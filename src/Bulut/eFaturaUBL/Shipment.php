<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:06
 */

namespace Bulut\eFaturaUBL;


class Shipment
{

    /**
     * @var |String
     */
    public $ID;

    /**
     * @var |Bulut|eFaturaUBL|Delivery
     */
    public $Delivery;

    /**
     * @var |Bulut|eFaturaUBL|ShipmentStage
     */
    public $ShipmentStage;

    /**
     * @var |Bulut|eFaturaUBL|TransportHandlingUnit
     */
    public $TransportHandlingUnit;

    /**
     * @var |Bulut|eFaturaUBL|GoodItem
     */
    public $GoodItem;

    /**
     * @var |Array (val = string, attrs = [unitCode="KGM"] )
     */
    public $GrossWeightMeasure;

    /**
     * @var |Array (val = string, attrs = [unitCode="KGM"] )
     */
    public $NetWeightMeasure;

    /**
     * @var |String
     */
    public $TotalTransportHandlingUnitQuantity;

    /**
     * @var |Array (val = string, attrs = [ currencyID="USD"] )
     */
    public $InsuranceValueAmount;

    /**
     * @var |Array (val = string, attrs = [ currencyID="USD"] )
     */
    public $DeclaredForCarriageValueAmount;

}