<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:06
 */

namespace Bulut\eFaturaUBL;

/**
 * Ürün tesliman bilgileri detaylı olarak girilir.
 *
 * Class Delivery
 * @package Bulut\eFaturaUBL
 */
class Delivery
{
    /**
     * Teslimatı belge içerisinde tekil olarak tanımlar.
     *
     * @var string
     */
    public $ID;

    /**
     * Ürün miktarı girilir.
     *
     * @var string
     */
    public $Quantity;

    /**
     * Gerçekleşen teslim tarihi yazılır.
     *
     * @var string
     */
    public $ActualDeliveryDate;

    /**
     * Gerçekleşen teslim zamanı yazılır.
     *
     * @var string
     */
    public $ActualDeliveryTime;

    /**
     * Son teslim tarihi girilir.
     *
     * @var string
     */
    public $LatestDeliveryDate;

    /**
     * Son teslim zamanı girilir.
     *
     * @var string
     */
    public $LatestDeliveryTime;

    /**
     * Takip numarası girilir.
     *
     * @var string
     */
    public $TrackingID;

    /**
     * Teslimat adresi girilir.
     *
     * @var DeliveryAddress
     */
    public $DeliveryAddress;

    /**
     * Alternatif teslim yeri girilir
     *
     * @var AlternativeDeliveryLocation
     */
    public $AlternativeDeliveryLocation;

    /**
     * Tahmini teslim dönemi girilir.
     *
     * @var EstimatedDeliveryPeriod
     */
    public $EstimatedDeliveryPeriod;

    /**
     * Taşıyıcı taraf girilir.
     *
     * @var CarrierParty
     */
    public $CarrierParty;

    /**
     * Teslimat yapılacak (ürünleri teslim alacak) taraf girilir.
     *
     * @var DeliveryParty
     */
    public $DeliveryParty;

    /**
     * Gönderi bilgisi girilir.
     *
     * @var Despatch
     */
    public $Despatch;

    /**
     *  Teslimat şartları girilir.
     *
     * @var DeliveryTerms
     */
    public $DeliveryTerms;

    /**
     * Yük/kargo bilgileri girilir.
     *
     * @var Shipment
     */
    public $Shipment;

}