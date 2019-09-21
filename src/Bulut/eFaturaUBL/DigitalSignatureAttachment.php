<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 13:51
 */

namespace Bulut\eFaturaUBL;

/**
 * Bu alana UBLExtensions alanına eklenen dijital imzaya referans eklenecektir.
 *
 * Class DigitalSignatureAttachment
 * @package Bulut\eFaturaUBL
 */
class DigitalSignatureAttachment
{
    /**
     * Referans Bilgisi
     * Stowage
     * @var ExternalReference
     */
    public $ExternalReference;
}