<?php


namespace Bulut\eFaturaUBL;

/**
 * Kurumun kayıtlı olduğu organizasyon hakkında bilgileri tutar. Örneğin sanayi odası veya ticaret odası.
 *
 * Class CorporateRegistrationScheme
 * @package Bulut\eFaturaUBL
 */
class CorporateRegistrationScheme
{
    /**
     * Kayıt yeri numarası girilebilir.
     *
     * @var string
     */
    public $ID;

    /**
     * Kayıt yeri ismi girilebilir.
     *
     * @var string
     */
    public $Name;

    /**
     * Kayıt yeri tipi girilebilir
     *
     * @var string
     */
    public $CorporateRegistrationTypeCode;

    /**
     * Kayıt yeri adresi girilebilir.
     *
     * @var JurisdictionRegionAddress
     */
    public $JuridictionRegionAddress;
}