<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:06
 */

namespace Bulut\eFaturaUBL;

/**
 * Gönderi (Kargo) bilgileri girilir.
 *
 * Class Shipment
 * @package Bulut\eFaturaUBL
 */
class Shipment
{

    /**
     * Kargo numarası girilir.
     *
     * @var string
     */
    public $ID;

    /**
     * Kargonun nasıl paketlenip taşınacağı kodlu olarak tanımlar (örneğin kırılacak mal).
     *
     * @var string
     */
    public $HandlingCode;

    /**
     * Kargonun nasıl paketlenip taşınacağı serbest metin olarak tanımlar.
     *
     * @var string
     */
    public $HandlingInstructions;

    /**
     * Brüt ağırlık girilir.
     *
     * @var array (val = string, attrs = [unitCode="KGM"] )
     */
    public $GrossWeightMeasure;

    /**
     * Net ağırlık girilir.
     *
     * @var array (val = string, attrs = [unitCode="KGM"] )
     */
    public $NetWeightMeasure;

    /**
     * Brüt hacim girilir.
     *
     * @var array (val = string, attrs = [unitCode="KGM"] )
     */
    public $GrossVolumeMeasure;

    /**
     * Net hacim girilir.
     *
     * @var array (val = string, attrs = [unitCode="KGM"] )
     */
    public $NetVolumeMeasure;

    /**
     * Toplam mal miktarı girilir.
     *
     * @var array (val = string, attrs = [unitCode="KGM"] )
     */
    public $TotalGoodsItemQuantity;

    /**
     * Toplam taşıma ünitesi miktarı girilir.
     *
     * @var array (val = string, attrs = [unitCode="KGM"] )
     */
    public $TotalTransportHandlingUnitQuantity;

    /**
     * Sigorta tutarı girilir.
     *
     * @var array (val = string, attrs = [unitCode="KGM"] )
     */
    public $InsuranceValueAmount;

    /**
     * Beyan edilen gümrük değeri tutarı girilir.
     *
     * @var array (val = string, attrs = [unitCode="KGM"] )
     */
    public $DeclaredCustomsValueAmount;

    /**
     * Beyan edilen taşıma ücreti (navlun) girilir.
     *
     * @var array (val = string, attrs = [unitCode="KGM"] )
     */
    public $DeclaredForCarriageValueAmount;

    /**
     * Ürünün GTIP kıymet değeri girilir.
     *
     * @var array (val = string, attrs = [unitCode="KGM"] )
     */
    public $DeclaredStatisticsValueAmount;

    /**
     * FOB değeri girilir.
     *
     * @var array (val = string, attrs = [unitCode="KGM"] )
     */
    public $FreeOnBoardValueAmount;

    /**
     * Özel talimatlar serbest metin olarak
     *
     * @var string
     */
    public $SpecialInstructions;

    /**
     * DespatchLine/Shipment elemanı içerisinde kullanımında fiyat bilgileri girilir.
     *
     * @var GoodsItem
     */
    public $GoodsItem;

    /**
     * Gönderinin hangi aşamada olduğu bilgisi girilir. Ayrıca taşıyıcı (plaka, şoför) gibi detay bilgiler girilir.
     *
     * @var ShipmentStage
     */
    public $ShipmentStage;

    /**
     * DespatchAdvice dokümanı içerisinde kullanımında taşıyıcı firma, fiili sevk tarihi ve asıl teslim tarihi bilgileri girilir.
     *
     * @var Delivery
     */
    public $Delivery;

    /**
     * Taşıma üniteleri bilgisi girilir.
     *
     * @var TransportHandlingUnit
     */
    public $TransportHandlingUnit;

    /**
     * Ürünlerin geri iade edileceği adres girilir.
     *
     * @var ReturnAddress
     */
    public $ReturnAddress;

    /**
     * İlk ulaşım limanı girilir.
     *
     * @var FirstArrivalPortLocation
     */
    public $FirstArrivalPortLocation;

    /**
     * Son çıkış limanı girilir.
     *
     * @var LastExitPortLocation
     */
    public $LastExitPortLocation;




}