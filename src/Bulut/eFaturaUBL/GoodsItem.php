<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:58
 */

namespace Bulut\eFaturaUBL;

/**
 * Taşıması gerçekleşen mallar hakkındaki bilgileri içerir
 *
 * Class GoodsItem
 * @package Bulut\eFaturaUBL
 */
class GoodsItem
{
    /**
     * İlgili ürünü belge içinde tekil olarak tanımlar.
     *
     * @var string
     */
    public $ID;

    /**
     * Serbet metin olarak açıklama girilebilir.
     *
     * @var string
     */
    public $Description;

    /**
     * Ürün tehlikeli madde kategorisinde sayılıp sayılamayacağını gösteren bilgi.
     *
     * @var boolean
     */
    public $HazardousRiskIndicator;

    /**
     * Gümrük değeri tutarı girilir.
     *
     * @var Amount
     */
    public $DeclaredCustomsValueAmount;

    /**
     * Nakliye tutarı (navlun) girilir.
     *
     * @var Amount
     */
    public $DeclaredForCarriageValueAmount;

    /**
     * Ürünün GTIP kıymet değeri girilir.
     *
     * @var Amount
     */
    public $DeclaredStatisticsValueAmount;

    /**
     * FOB tutarı girilir.
     *
     * @var Amount
     */
    public $FreeOnBoardValueAmount;

    /**
     * Sigorta tutarı girilir.
     *
     * @var Amount
     */
    public $InsuranceValueAmount;

    /**
     * Ürünün değeri girilir. Ana seviyedeki Shipment'ın altında kullanımında toplam tutar bilgisi girilebilir.
     *
     * @var Amount
     */
    public $ValueAmount;

    /**
     * Brüt ağırlığı girilir.
     *
     * @var Measure
     */
    public $GrossWeightMeasure;

    /**
     *  Net ağırlığı girilir.
     *
     * @var Measure
     */
    public $NetWeightMeasure;

    /**
     *  Belli bir ücretin uygulanabileceği brüt ağırlığı girilir.
     *
     * @var Measure
     */
    public $ChargableWeightMeasure;

    /**
     * Brüt hacim girilir.
     *
     * @var Measure
     */
    public $GrossVolumeMeasure;

    /**
     * Net hacim girilir.
     *
     * @var Measure
     */
    public $NetVolumeMeasure;

    /**
     * Miktar girilir.
     *
     * @var integer
     */
    public $Quantity;

    /**
     * Ürünün veya malın GTIP numarası girilir.
     *
     * @var string
     */
    public $RequiredCustomsID;

    /**
     * Gümrük durum kodu girilir.
     *
     * @var string
     */
    public $CustomsStatusCode;

    /**
     * İstatistiksel, tarife veya mali amaçlı gümrük mal miktarı girilir.
     *
     * @var string
     */
    public $CustomsTariffQuantity;

    /**
     * Malların gümrükte ithalat için sınıflandırılmış olup olmadığını belirtir.
     *
     * @var boolean
     */
    public $CustomsImportClassifiedIndicator;

    /**
     * Belli bir ücretin uygulanabileceği miktar girilir.
     *
     * @var string
     */
    public $ChargeableQuantity;

    /**
     * Malların ne kadarının geri gelebileceği girilir.
     *
     * @var string
     */
    public $ReturnableQuantity;

    /**
     * Takip numarası girilir.
     *
     * @var string
     */
    public $TraceID;

    /**
     * Malların fatura kalemleriyle olan ilişkileri girilir.
     *
     * @var Item
     */
    public $Item;

    /**
     * Taşıma bedelinde indirim/fiyat artırımı var ise girilir.
     *
     * @var FreightAllowanceCharge
     */
    public $FreightAllowanceCharge;

    /**
     * Birim fiyat ve kalem toplam fiyat bilgileri girilir.
     *
     * @var InvoiceLine
     */
    public $InvoiceLine;

    /**
     * Sevkiyattaki mallar ile ilgili her türlü sıcaklık bilgisi girilebilir.
     *
     * @var Temperature
     */
    public $Temperature;

    /**
     * Ürünlerin üretildiği adres girilir.
     *
     * @var OriginAddress
     */
    public $OriginAddress;

    /**
     * Ürünlerin diğer ölçümleri girilir.
     *
     * @var MeasurementDimension
     */
    public $MeasurementDimension;

}