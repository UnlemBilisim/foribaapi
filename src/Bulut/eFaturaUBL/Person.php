<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 18:08
 */

namespace Bulut\eFaturaUBL;

/**
 * Şahısla ilgili bilgiler girilecektir.
 *
 * Class Person
 * @package Bulut\eFaturaUBL
 */
class Person
{
    /**
     * Şahsın ilk adı girilecektir.
     *
     * @var string
     */
    public $FirstName;

    /**
     * Şahsın soyadı girilecektir.
     *
     * @var string
     */
    public $FamilyName;

    /**
     * Şahsın ünvanı girilecektir.
     *
     * @var string
     */
    public $Title;

    /**
     * Şahsın diğer isimleri yazılacaktır.
     *
     * @var string
     */
    public $MiddleName;

    /**
     * Şahsın adının ön eki varsa bu alana girilecektir.
     *
     * @var string
     */
    public $NameSuffix;

    /**
     * Şahsın milliyeti girilecektir.
     *
     * @var string
     */
    public $NationalityID;

    /**
     * Şahsın hesap bilgileri girilecektir.
     *
     * @var FinancialAccount
     */
    public $FinancialAccount;

    /**
     * Şahsın kimlik dokümanına (Örneğin pasaport numarası buraya yazılacaktır) referans girilebilecektir.
     *
     * @var IdentityDocumentReference
     */
    public $IdentityDocumentReference;

}