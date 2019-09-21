<?php


namespace Bulut\eFaturaUBL;

/**
 * Parti lot bilgisi, ürün takip numarası, üretim zamanı, seri numarası ve kayıt numarası gibi bilgiler girilebilir.
 *
 * Class ItemInstance
 * @package Bulut\eFaturaUBL
 */
class ItemInstance
{
    /**
     * Ürün İz Numarası girilebilir.
     *
     * @var string
     */
    public $ProductTraceID;

    /**
     * Üretim tarihi girilir.
     *
     * @var string
     */
    public $ManufacturedDate;

    /**
     * Üretim zamanı girilir.
     *
     * @var string
     */
    public $ManufacturedTime;

    /**
     * Son kullanım tarihi girilir.
     *
     * @var string
     */
    public $BestBeforeDate;

    /**
     * Kayıt numarası girilir.
     *
     * @var string
     */
    public $RegistrationID;

    /**
     * Seri numarası girilir.
     *
     * @var string
     */
    public $SerialID;

    /**
     * Ürün hakkında başka özellikler var ise girilir.
     *
     * @var string
     */
    public $AdditionalItemProperty;

    /**
     * Lot numarası girilir
     *
     * @var string
     */
    public $LotIdentification;
}