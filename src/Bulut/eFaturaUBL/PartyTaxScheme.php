<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 02:38
 */

namespace Bulut\eFaturaUBL;

/**
 * Bu eleman aracılığıyla Tarafın(Party) vergi dairesi ile ilgili bilgiler verilir
 *
 * Class PartyTaxScheme
 * @package Bulut\eFaturaUBL
 */
class PartyTaxScheme
{
    /**
     * İhracat faturasında ilgili ülkedeki kurumun resmi ünvanı yazılır.
     *
     * @var string
     */
    public $RegistrationName;

    /**
     * İhracat faturasında ilgili ülkedeki kurumun vergi kayıt kodu yazılır.
     *
     * @var string
     */
    public $CompanyID;

    /**
     * Vergi Dairesi adı
     *
     * @var TaxScheme
     */
    public $TaxScheme;
}