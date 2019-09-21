<?php


namespace Bulut\eFaturaUBL;

/**
 * Fatura ile ilgili belgelerin kalemlerine referans eklemek için kullanılır.
 *
 * Class BillingReferenceLine
 * @package Bulut\eFaturaUBL
 */
class BillingReferenceLine
{
    /**
     * Kalem numarası girilir.
     *
     * @var string
     */
    public $ID;

    /**
     * Kalemin tutarı girilir
     *
     * @var string
     */
    public $Amount;

    /**
     * Kaleme eğer indirim veya fiyat artırımı uygulanmışsa girilir.
     *
     * @var AllowanceCharge
     */
    public $AllowanceCharge;
}