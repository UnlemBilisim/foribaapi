<?php


namespace Bulut\eFaturaUBL;

/**
 * Taşıma sırasındaki tehlikeli malları anlatır.
 *
 * Class HazardousGoodsTransit
 * @package Bulut\eFaturaUBL
 */
class HazardousGoodsTransit
{
    /**
     * Taşıma sırasında her hangi bir tehlikeli durum olması durumunda nasıl müdahale edileceğini anlatan kod girilebilir.
     *
     * @var string
     */
    public $TransportEmergencyCardCode;

    /**
     * Paketleme kriterleri kodu girilir.
     *
     * @var string
     */
    public $PackagingCriteriaCode;

    /**
     * Ürünün taşımasına yönelik kanun ve kuralları belirten kod girilir.
     *
     * @var string
     */
    public $HazardousRegulationCode;

    /**
     * ABD Ulaştırma Bakanlığı tarafından belirlenen Tehlikeli Maddeler için Soluma Toksisitesi Tehlike Bölgesini belirten kod girilir.
     *
     * @var string
     */
    public $InhalationToxicityZoneCode;

    /**
     * Tehlikeli kargonun taşınmasının yetki kodu girilir.
     *
     * @var string
     */
    public $TransportAuthorizationCode;

    /**
     * Ürünü güvenle taşınması için gerekli maximum sıcaklık girilir.
     *
     * @var MaximumTemperature
     */
    public $MaximumTemperature;

    /**
     * Ürünü güvenle taşınması için gerekli minimum sıcaklık girilir.
     *
     * @var MinimumTemperature
     */
    public $MinimumTemperature;

}