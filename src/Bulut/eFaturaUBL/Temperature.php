<?php


namespace Bulut\eFaturaUBL;

/**
 * Sıcaklık bilgisi girilir.
 *
 * Class Temperature
 * @package Bulut\eFaturaUBL
 */
class Temperature
{
    /**
     * Sıcaklık nitelik numarası girilir.
     *
     * @var string
     */
    public $AttributeID;

    /**
     * Ölçüm girilir.
     *
     * @var array (unitCode="CEL")
     */
    public $Measure;

    /**
     * Açıklama girilir
     *
     * @var string
     */
    public $Description;
}