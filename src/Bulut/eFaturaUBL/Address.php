<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 02:36
 */

namespace Bulut\eFaturaUBL;


class Address
{

    /**
     * @var |String
     */
    public $ID;

    /**
     * @var |String
     */
    public $Room;


    /**
     * @var |String
     */
    public $StreetName;

    /**
     * @var |String
     */
    public $BuildingName;

    /**
     * @var |String
     */
    public $BuildingNumber;
    /**
     * @var |String
     */
    public $CitySubdivisionName;
    /**
     * @var |String
     */
    public $CityName;
    /**
     * @var |String
     */
    public $PostalZone;

    /**
     * @var |String
     */
    public $Region;

    /**
     * @var |Bulut|eFaturaUBL|Country
     */
    public $Country;
}