<?php


namespace Bulut\eFaturaUBL;

/**
 * İstif yeri bilgisi girilir.
 *
 * Class Stowage
 * @package Bulut\eFaturaUBL
 */
class Stowage
{
    /**
     * İstif yeri mekan numarası girilir.
     *
     * @var string
     */
    public $LocationID;

    /**
     * Mekan bilgisi detaylı olarak girilir.
     *
     * @var Location
     */
    public $Location;

    /**
     * İstif yeri ölçüleri girilir.
     *
     * @var MeasurementDimension
     */
    public $MeasurementDimension;
}