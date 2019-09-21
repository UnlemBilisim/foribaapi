<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:46
 */

namespace Bulut\eFaturaUBL;

/**
 * Teslimat koşulları girilir.
 *
 * Class DeliveryTerms
 * @package Bulut\eFaturaUBL
 */
class DeliveryTerms
{
    /**
     * Teslim koşulları girilir (örneğin CIF, FOB).
     *
     * @var string
     */
    public $ID;

    /**
     * Teslimat koşulları serbest metin olarak girilir.
     *
     * @var string
     */
    public $SpecialTerms;

    /**
     * Teslimat koşullarının kapsadığı tutar girilebilir
     *
     * @var float
     */
    public $Amount;
}