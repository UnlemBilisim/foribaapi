<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 13:49
 */

namespace Bulut\eFaturaUBL;

/**
 * Bu elemana belgelerde kullanılan mali mühür/elektronik imza ile ilgili bilgiler girilir.
 *
 * Class Signature
 * @package Bulut\eFaturaUBL
 */
class Signature
{
    /**
     * Bu alana dokumana eklenecek elektronik imza ile ilgili bir referans numarası verilecektir.
     *
     * @var string
     */
    public $ID;

    /**
     * Bu alana dokumanı imzalayan imza sahibinin bilgileri eklenecektir.
     *
     * @var SignatoryParty
     */
    public $SignatoryParty;

    /**
     * Bu alana UBLExtensions alanına eklenen dijital imzaya referans eklenecektir.
     *
     * @var DigitalSignatureAttachment
     */
    public $DigitalSignatureAttachment;
}