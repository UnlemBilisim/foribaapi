<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:11
 */

namespace Bulut\eFaturaUBL;

/**
 * Mal/Hizmet bilgilerinin girildiği bölümdür.
 *
 * Class Item
 * @package Bulut\eFaturaUBL
 */
class Item
{
    /**
     * Mal/Hizmet hakkında açıklama serbest metin olarak girilir.
     *
     * @var string
     */
    public $Description;

    /**
     * Mal/hizmet adı serbest metin olarak girilir.
     *
     * @var string
     */
    public $Name;

    /**
     * Mal/hizmet ile ilgili anahtar kelimeler veya fatura satır tipi bilgileri girilebilir.
     *
     * @var string
     */
    public $Keyword;

    /**
     * Mal/hizmet marka adı serbest metin olarak girilir.
     *
     * @var string
     */
    public $BrandName;

    /**
     * Mal/hizmet model adı serbest metin olarak girilir.
     *
     * @var string
     */
    public $ModelName;

    /**
     * Alıcının mal/hizmete verdiği tanımlama bilgisi girilir.
     *
     * @var BuyersItemIdentification
     */
    public $BuyersItemIdentification;

    /**
     * Satıcının mal/hizmete verdiği tanımlama bilgisi girilir.
     *
     * @var SellersItemIdentification
     */
    public $SellersItemIdentification;

    /**
     * Üreticinin mal/hizmete verdiği tanımlama bilgisi girilir. Araç Tescil Faturalarında Şasi Numarası bu elemana girilecektir.
     *
     * @var ManufacturersItemIdentification
     */
    public $ManufacturersItemIdentification;

    /**
     * Mal/hizmet için diğer kullanılabilecek sınıflandırma bilgileri girilebilir.
     *
     * @var AdditionalItemIdentification
     */
    public $AdditionalItemIdentification;

    /**
     * Menşei bilgisi girilebilir.
     *
     * @var OriginCountry
     */
    public $OriginCountry;

    /**
     * Emtia sınıflandırma bilgisi girilir.
     *
     * @var CommodityClassification
     */
    public $CommodityClassification;

    /**
     * Parti lot bilgisi, ürün takip numarası, üretim zamanı, seri numarası ve kayıt numarası gibi bilgiler girilebilir.
     *
     * @var ItemInstance
     */
    public $ItemInstance;
}