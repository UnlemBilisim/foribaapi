<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:25
 */

namespace Bulut\eFaturaUBL;

/**
 * Vergi ve diğer yasal yükümlülüklerin hesaplaması ile ilgili bilgiler ile belge
 * üzerinde hesaplanan toplam vergi ve yasal yükümlülük tutarı girilecektir.
 *
 * Class TaxTotal
 * @package Bulut\eFaturaUBL
 */
class TaxTotal
{

    /**
     * Hesaplanan vergilerin toplam tutarı girilir.
     *
     * @var string
     */
    public $TaxAmount;

    /**
     * Vergi hesaplaması ile ilgili bilgilere yer verilir.
     *
     * @var TTransportEquipmentaxSubtotal
     */
    public $TaxSubtotal;
}