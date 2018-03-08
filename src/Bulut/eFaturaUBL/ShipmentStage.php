<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:32
 */

namespace Bulut\eFaturaUBL;


class ShipmentStage
{
    /**
     * @var |Bulut|eFaturaUBL|TransportMeans
     */
    public $TransportMeans;

    /**
     * @var |Bulut|eFaturaUBL|DriverPerson Array
     */
    public $DriverPerson;

    /**
     * @var |String
     */
    public $TransportModeCode;
}