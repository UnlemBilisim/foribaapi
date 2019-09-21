<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:42
 */

namespace Bulut\eFaturaUBL;

/**
 * Ödeme şeklinin girildiği elemandır.
 *
 * Class PaymentMeans
 * @package Bulut\eFaturaUBL
 */
class PaymentMeans
{

    /**
     * Ödeme şeklinin kodu girilir. Bu eleman için UN/EDIFACT 4461 Ödeme Çeşitleri Kod Listesi kullanılacaktır.
     *
     * @var string
     */
    public $PaymentMeansCode;

    /**
     * Son ödeme günü yıl-ay-gün formatında girilir.
     *
     * @var string
     */
    public $PaymentDueDate;

    /**
     * Ödeme kanalı kodu girilir.
     *
     * @var string
     */
    public $PaymentChannelCode;

    /**
     * Ödeme ile ilgili açıklamalar serbest metin olarak girilir.
     *
     * @var string
     */
    public $InstructionNote;

    /**
     * Ödeme yapan tarafın hesap bilgileri girilir.
     *
     * @var PayerFinancialAccount
     */
    public $PayerFinancialAccount;

    /**
     * Ödeme yapılacak hesap girilir.
     *
     * @var PayeeFinancialAccount
     */
    public $PayeeFinancialAccount;
}