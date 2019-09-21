<?php


namespace Bulut\eFaturaUBL;

/**
 * Alıcı tarafın bilgilerini tutan elemandır.
 *
 * Class CustomerParty
 * @package Bulut\eFaturaUBL
 */
class CustomerParty
{
    /**
     * Alıcı tarafın bilgilerini tutan elemandır.
     *
     * @var Party
     */
    public $Party;

    /**
     * ReceiptAdvice içerisinde kullanımında teslim alan bilgisi girilebilir.
     *
     * @var DeliveryContact
     */
    public $DeliveryContact;
}