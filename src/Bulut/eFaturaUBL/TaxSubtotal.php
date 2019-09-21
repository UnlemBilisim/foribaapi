<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:25
 */

namespace Bulut\eFaturaUBL;

/**
 * Vergi ve diğer yasal yükümlülüklerin hesaplaması ile ilgili bilgilere yer verilecektir
 *
 * Class TaxSubtotal
 * @package Bulut\eFaturaUBL
 */
class TaxSubtotal
{
    /**
     * Verginin üzerinden hesaplandığı tutar (matrah) bilgisi girilecektir.
     *
     * @var array (val = string, attrs = [ currencyID="TRY"] )
     */
    public $TaxableAmount;

    /**
     * Hesaplanan Vergi Tutarıdır.
     *
     * @var array (val = string, attrs = [ currencyID="TRY"] )
     */
    public $TaxAmount;

    /**
     * Vergi hesaplamasında belli bir sıra izlenmesi veya birden fazla vergi hesaplaması yapılması halinde ilgili sıra numarası girilecektir.
     *
     * @var integer
     */
    public $CalculationSequenceNumeric;

    /**
     * Belge para birimi cinsinden toplam vergi tutarıdır.
     *
     * @var array (val = string, attrs = [ currencyID="TRY"] )
     */
    public $TransactionCurrencyTaxAmount;

    /**
     * Vergi oranı girilebilecektir.
     *
     * @var integer
     */
    public $Percent;

    /**
     * Vergileme ölçüsü olarak miktar(kilogram,  metre vb.) kullanılması halinde ilgili tarife bilgileri bu elemana girilecektir.
     *
     * @var array (val = string, attrs = [ currencyID="TRY"] )
     */
    public $BaseUnitMeasure;

    /**
     * Vergileme ölçüsü olarak tutar(perakende satış fiyatı gibi.) kullanılması halinde ilgili tarife bilgileri bu elemana girilecektir.
     *
     * @var array (val = string, attrs = [ currencyID="TRY"] )
     */
    public $PerUnitAmount;

    /**
     * Verginin türü ile ilgili bilgiler girilecektir.
     *
     * @var TaxCategory
     */
    public $TaxCategory;

}