<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 18:10
 */

namespace Bulut\eFaturaUBL;

/**
 * Hesap bilgilerinin tutulduğu bölümdür.
 *
 * Class FinancialAccount
 * @package Bulut\eFaturaUBL
 */
class FinancialAccount
{
    /**
     * Hesap numarası metin olarak girilir.
     *
     * @var string
     */
    public $ID;

    /**
     * Hesabın para birimi kodu girilir.
     *
     * @var string
     */
    public $CurrencyCode;

    /**
     * Ödeme ile ilgili açıklama serbest metin olarak girilir.
     *
     * @var string
     */
    public $PaymentNote;

    /**
     * Hesabın bulunduğu banka ve şube bilgileri girilebilir.
     *
     * @var FinancialInstitutionBranch
     */
    public $FinancialInstitutionBranch;

}