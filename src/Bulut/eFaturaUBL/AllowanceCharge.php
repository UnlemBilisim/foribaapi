<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:34
 */

namespace Bulut\eFaturaUBL;

/**
 * Iskonto veya artırımların tanımlandığı elemandır.
 * AllowanceChargeReason: Iskonto/ Artırım Nedeni
 * MultiplierFactorNumeric: Iskonto/ Artırım Oranı
 * SequenceNumeric: Sıra Numarası
 * Amount: Iskonto/ Artırım Tutarı
 * BaseAmount: İskonto veya artırımın uygulandığı tutar
 * PerUnitAmount: Ürün adetine göre iskonto veya artırımın uygulandığı durumlarda uygulanan ürün miktarını gösterir
 *
 * Class AllowanceCharge
 * @package Bulut\eFaturaUBL
 */
class AllowanceCharge
{
    /**
     * Iskonto ise “false”, artırım ise “true” girilir.
     *
     * @var boolean
     */
    public $ChargeIndicator;

    /**
     * Iskonto veya artırımın sebebi serbest metin olarak girilir.
     *
     * @var string
     */
    public $AllowanceChargeReason;

    /**
     * Iskonto veya artırım oranı numerik olarak girilir.
     *
     * @var string
     */
    public $MultiplierFactorNumeric;

    /**
     * Birden fazla iskonto veya fiyat artırımı kullanılması durumunda sıra numarası girilir.
     *
     * @var integer
     */
    public $SequenceNumeric;

    /**
     * Iskonto veya artırım miktarı numerik girilir.
     *
     * @var Amount
     */
    public $Amount;

    /**
     * Iskonto veya artırım oranının uygulandığı tutar girilir.
     *
     * @var BaseAmount
     */
    public $BaseAmount;

    /**
     * Ürün adetine göre iskonto veya artırımın uygulandığı durumlarda uygulanan ürün miktarını gösterir
     *
     * @var integer
     */
    public $PerUnitAmount;

}
