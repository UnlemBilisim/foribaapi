<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:38
 */

namespace Bulut\eFaturaUBL;

/**
 * Malların alıcıya gönderimlesi için satıcıdan teslim alınması kapsamında zaman ve mekan bilgileri girilir.
 *
 * Class Despatch
 * @package Bulut\eFaturaUBL
 */
class Despatch
{
    /**
     * İlgili gönderimi belge içerisinde tekil olarak tanımlar.
     *
     * @var string
     */
   public $ID;

    /**
     * Gerçekleşen gönderim tarihi girilir. (Fiili Sevk Tarihi)
     *
     * @var string
     */
   public $ActualDespatchDate;

    /**
     * Gerçekleşen gönderim zamanı girilir.  (Fiili Sevk Zamanı)
     *
     * @var string
     */
   public $ActualDespatchTime;

    /**
     * Serbest metin olarak gönderime yönelik açıklamalar girilir.
     *
     * @var string
     */
   public $Instructions;

    /**
     * Malların gönderim için alınacağı adres girilir.
     *
     * @var DespatchAddress
     */
   public $DespatchAddress;

    /**
     * Malları satıcıdan teslim alacak taraf bilgileri girilir.
     *
     * @var DespatchParty
     */
   public $DespatchParty;

    /**
     * Malları satıcıdan teslim alacak tarafın iletişim bilgileri girilir.
     *
     * @var Contact
     */
   public $Contact;

    /**
     * Tahmini teslim alış dönemi girilir.
     *
     * @var EstimatedDespatchPeriod
     */
   public $EstimatedDespatchPeriod;
}