<?php


namespace Bulut\eFaturaUBL;

/**
 * Parasal toplamlar ile genel tutarların girildiği elemandır
 *
 * Class MonetaryTotal
 * @package Bulut\eFaturaUBL
 */
class MonetaryTotal
{
    /**
     * Mal/hizmet miktarı ile Mal/hizmet birim fiyatının çarpımı ile bulunan tutardır.
     *
     * @var array (val = string, attrs = [currencyID="TRY"] )
     */
    public $LineExtensionAmount;

    /**
     * Vergiler hariç, ıskonto veya artırım dahil toplam tutar girilir.(Vergi Matrahı).
     *
     * @var array (val = string, attrs = [currencyID="TRY"] )
     */
    public $TaxExclusiveAmount;

    /**
     * Vergiler, ıskonto ve artırım dahil toplam tutar girilir.
     *
     * @var array (val = string, attrs = [currencyID="TRY"] )
     */
    public $TaxInclusiveAmount;

    /**
     * Toplam ıskonto tutarı girilir.
     *
     * @var array (val = string, attrs = [currencyID="TRY"] )
     */
    public $AllowanceTotalAmount;

    /**
     * Toplam fiyat artırımı tutarı girilir.
     *
     * @var array (val = string, attrs = [currencyID="TRY"] )
     */
    public $ChargeTotalAmount;

    /**
     * Yuvarlama tutarı girilir.
     *
     * @var array (val = string, attrs = [currencyID="TRY"] )
     */
    public $PayableRoundingAmount;

    /**
     * Ödenecek tutar girilir.
     *
     * @var array (val = string, attrs = [currencyID="TRY"] )
     */
    public $PayableAmount;
}