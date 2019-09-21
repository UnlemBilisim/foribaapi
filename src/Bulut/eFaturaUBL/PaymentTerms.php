<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 17:34
 */

namespace Bulut\eFaturaUBL;

/**
 * Ödeme koşullarının girildiği elemandır
 *
 * Class PaymentTerms
 * @package Bulut\eFaturaUBL
 */
class PaymentTerms
{

    /**
     * Ödeme koşulları ile ilgili açıklama serbest metin olarak girilir.
     *
     * @var array
     */
    public $Note;

    /**
     * Ödemenin gecikmesi durumunda uygulanacak ceza oranı numerik olarak girilir.
     *
     * @var integer
     */
    public $PenaltySurchargePercent;

    /**
     * Ödeme tutarı numerik olarak girilebilir.
     *
     * @var array (attrs)
     */
    public $Amount;

    /**
     * Ödemenin gecikmesi durumunda uygulanacak ceza tutarı numerik olarak girilir.
     *
     * @var array (attrs)
     */
    public $PenaltyAmount;

    /**
     * Son ödeme günü yıl-ay-gün formatında girilir.
     *
     * @var string
     */
    public $PaymentDueDate;

    /**
     * Ödeme dönemi girilir.
     *
     * @var SettlementPeriod
     */
    public $SettlementPeriod;
}