<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:40
 */

namespace Bulut\eFaturaUBL;

/**
 * Tarafın sicil bilgilerini veya merkez bilgilerini içerir.
 *
 * Class PartyLegalEntity
 * @package Bulut\eFaturaUBL
 */
class PartyLegalEntity
{
    /**
     * Kayıt ismi girilir.
     *
     * @var string
     */
    public $RegistrationName;

    /**
     * Kayıt numarası girilir.
     *
     * @var string
     */
    public $CompanyID;

    /**
     * Kayıt tarihi girilir.
     *
     * @var string
     */
    public $RegistrationDate;

    /**
     * Tek bir kişiye ait olup olmadığını belirtir.
     *
     * @var boolean
     */
    public $SolePrioprietorshipIndicator;

    /**
     * Ödenmiş sermaye bilgisi girilir.
     *
     * @var array (attrs)
     */
    public $CorporateStockAmount;

    /**
     * Şirketin halka açık olup olmadığının göstergesi girilebilir.
     *
     * @var boolean
     */
    public $FullyPaidSharesIndicator;

    /**
     * Kayıtlı olduğu yerin bilgilerini içerir.
     *
     * @var CorporateRegistrationScheme
     */
    public $CorporateRegistrationScheme;

    /**
     *  Merkez bilgilerini içerir.
     *
     * @var HeadOfficeParty
     */
    public $HeadOfficeParty;
}