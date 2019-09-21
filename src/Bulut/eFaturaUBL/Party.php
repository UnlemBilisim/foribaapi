<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 13:53
 */

namespace Bulut\eFaturaUBL;

/**
 * Tarafları (kurum ve şahıslar) tanımlamak için kullanılır.
 *
 * Class Party
 * @package Bulut\eFaturaUBL
 */
class Party
{
    /**
     * Tarafın web sayfası adresi metin olarak girilir.
     *
     * @var string
     */
    public $WebsiteURI;

    /**
     * Tarafın ana faaliyet (NACE) kodu girilecektir.
     *
     * @var string
     */
    public $IndustryClassificationCode;

    /**
     * Tarafın vergi kimlik numarası veya TC kimlik numarası metin olarak girilir.
     *
     * @var PartyIdentification
     */
    public $PartyIdentification;

    /**
     * Taraf eğer kurum ise kurum ismi bu elemana metin olarak girilir.
     *
     * @var PartyName
     */
    public $PartyName;

    /**
     * Tarafın adresi girilir.
     *
     * @var PostalAddress
     */
    public $PostalAddress;

    /**
     * Tarafın var ise depo bilgileri girilir.
     *
     * @var PostalAddress
     */
    public $PhysicalLocation;

    /**
     * Tarafın vergi kimlik numarası girilmişse bu alana vergi dairesi adı girilir.
     *
     * @var PartyTaxScheme
     */
    public $PartyTaxScheme;

    /**
     * Tarafın diğer kayıtlı olduğu yerlerin bilgileri ve kayıtlı olduğu yerlerdeki kayıt numaraları detaylı olarak girilecektir.
     *
     * @var PartyLegalEntity
     */
    public $PartyLegalEntity;

    /**
     * Tarafın iletişim bilgileri girilir.
     *
     * @var Contact
     */
    public $Contact;

    /**
     * Taraf eğer şahıssa bu eleman kullanılır.
     *
     * @var Person
     */
    public $Person;

    /**
     * Tarafın şubesine ait bilgiler bu elemana girilir.
     *
     * @var AgentParty
     */
    public $AgentParty;


}

