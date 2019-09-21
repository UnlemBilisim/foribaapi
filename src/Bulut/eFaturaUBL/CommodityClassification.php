<?php


namespace Bulut\eFaturaUBL;

/**
 * Ürün hakkında uluslararası standart veya ulusal kodlar (örneğin, Sağlık Uygulama Tebliği) tabanlı sınıflandırma bilgisi vermek istenmesi durumunda girilir.
 *
 * Class CommodityClassification
 * @package Bulut\eFaturaUBL
 */
class CommodityClassification
{
    /**
     * Ürün hakkında uluslararası standart veya ulusal kodlar (örneğin, Sağlık Uygulama Tebliği) tabanlı sınıflandırma bilgisi vermek istenmesi durumunda girilir.
     * <cbc:ItemClassificationCode listAgencyID="113" listID="UNSPSC">12344321</cbc:ItemClassificationCode>
     *
     * @var array (attrs = listAgencyID="113" listID="UNSPSC")
     */
    public $ItemClassificationCode;
}