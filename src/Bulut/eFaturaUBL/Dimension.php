<?php


namespace Bulut\eFaturaUBL;

/**
 * Boyut bilgileri girilir
 *
 * Class Dimension
 * @package Bulut\eFaturaUBL
 */
class Dimension
{
    /**
     * Hangi özelliğin ölçüldüğü girilir.
     *
     * @var string
     */
    public $AttributeID;

    /**
     * Ölçüm girilir.
     *
     * @var array ( attrs = unitCode="MTR")
     */
    public $Measure;

    /**
     * Açıklama girilir.
     *
     * @var string
     */
    public $Description;

    /**
     * Minimum ölçüm girilir.
     *
     * @var array ( attrs = unitCode="MTR")
     */
    public $MinimumMeasure;

    /**
     * Maximum ölçüm girilir.
     *
     * @var array ( attrs = unitCode="MTR")
     */
    public $MaximumMeasure;

}