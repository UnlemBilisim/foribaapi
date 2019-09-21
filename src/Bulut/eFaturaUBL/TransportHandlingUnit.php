<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:39
 */

namespace Bulut\eFaturaUBL;

/**
 * Taşıma ünitesi hakkında detaylı bilgi girilir.
 *
 * Class TransportHandlingUnit
 * @package Bulut\eFaturaUBL
 */
class TransportHandlingUnit
{
    /**
     * Taşıma ünitesi numarası girilir.
     *
     * @var string
     */
    public $ID;

    /**
     * Taşıma ünitesi tipi kodlu olarak girilir.
     *
     * @var string
     */
    public $TransportHandlingUnitTypeCode;

    /**
     * Nasıl paketlenip taşınacağı kodlu olarak tanımlar.
     *
     * @var string
     */
    public $HandlingCode;

    /**
     * Nasıl paketlenip taşınacağıserbest metin olarak tanımlar.
     *
     * @var string
     */
    public $HandlingInstructions;

    /**
     * Tehlikeli madde içerip içermediğini belirtir.
     *
     * @var boolean
     */
    public $HazardousRiskIndicator;

    /**
     * Toplam ürün miktarı girilir.
     *
     * @var integer
     */
    public $TotalGoodsItemQuantity;

    /**
     * Toplam paket miktarı girilir.
     *
     * @var integer
     */
    public $TotalPackageQuantity;

    /**
     * Zarar bilgisi girilir.
     *
     * @var string
     */
    public $DamageRemarks;

    /**
     * Takip numarası girilir.
     *
     * @var string
     */
    public $TraceID;

    /**
     * İçerdiği paket bilgileri girilir.
     *
     * @var ActualPackage
     */
    public $ActualPackage;

    /**
     * Ekipman bilgisi girilir.
     *
     * @var TransportEquipment[]
     */
    public $TransportEquipment;

    /**
     * Taşıma şekli bilgisi girilir.
     *
     * @var TransportMeans
     */
    public $TransportMeans;

    /**
     * Taşıma sırasındaki tehlikeli malların bilgisi girilir.
     *
     * @var HazardousGoodsTransit
     */
    public $HazardousGoodsTransit;

    /**
     * Taşıma ünitesi ölçüleri girilir.
     *
     * @var MeasurementDimension
     */
    public $MeasurementDimension;

    /**
     * Taşıma ünitesi için maksimum sıcaklık girilir.
     *
     * @var MinimumTemperature
     */
    public $MinimumTemperature;

    /**
     *  Taşıma ünitesi için minimum sıcaklık girilir.
     *
     * @var MaximumTemperature
     */
    public $MaximumTemperature;

    /**
     * Yerde kapladığı alan bilgisi girilir.
     *
     * @var FloorSpaceMeasurementDimension
     */
    public $FloorSpaceMeasurementDimension;

    /**
     * Palette kapladığı alan blgisi girilir.
     *
     * @var PalletSpaceMeasurementDimension
     */
    public $PalletSpaceMeasurementDimension;

    /**
     * İlgili gönderi belgesine referans girilir.
     *
     * @var ShipmentDocumentReference
     */
    public $ShipmentDocumentReference;

    /**
     * Gümrük numaralandırma bilgisi girilir.
     *
     * @var CustomsDeclaration
     */
    public $CustomsDeclaration;

}