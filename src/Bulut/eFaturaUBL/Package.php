<?php


namespace Bulut\eFaturaUBL;

/**
 * Taşıma sırasındaki paket bilgisi girilir.
 *
 * Class Package
 * @package Bulut\eFaturaUBL
 */
class Package
{
    /**
     * Paket numarası girilir.
     *
     * @var string
     */
    public $ID;

    /**
     * Paket adedi girilir.
     *
     * @var string
     */
    public $Quantity;

    /**
     * Paket materyali geri dönüşümlü olup olmadığını belirtir.
     *
     * @var boolean
     */
    public $ReturnableMaterialIndicator;

    /**
     * Paketleme seviyesini belirtir.
     *
     * @var string
     */
    public $PackageLevelCode;

    /**
     * Paketleme tipini belirtir.
     *
     * @var string
     */
    public $PackagingTypeCode;

    /**
     * Paketleme materyalini belirtir.
     *
     * @var string
     */
    public $PackagingMaterial;

    /**
     * İçerdiği diğer paketler girilir.
     *
     * @var ContainedPackage
     */
    public $ContainedPackage;

    /**
     * İçerdiği ürünler girilir.
     *
     * @var GoodsItem
     */
    public $GoodsItem;

    /**
     * Paket boyutları girilir.
     *
     * @var MeasurementDimension
     */
    public $MeasurementDimension;
}