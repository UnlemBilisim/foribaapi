<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 02:36
 */

namespace Bulut\eFaturaUBL;

/**
 * Bu eleman adres bilgilerinin tanımlanmasında kullanılacaktır.
 *
 * Class Address
 * @package Bulut\eFaturaUBL
 */
class Address
{
    /**
     * Mahalle, meydan, bulvar, cadde, sokak ve küme evlere karşılık gelecek şekilde,
     * standart sayısal eşdeğer olarak TÜİK tarafından verilmiş olan “sabit tanımlama numarası” girilebilecektir.
     *
     * @var string
     */
    public $ID;

    /**
     * Posta Kutusu girilecektir.
     *
     * @var
     */
    public $Postbox;

    /**
     * İç kapı numarası girilecektir.
     *
     * @var string
     */
    public $Room;

    /**
     * Meydan/bulvar/cadde/sokak/küme evler/site adı bilgileri girilecektir.
     *
     * @var string
     */
    public $StreetName;

    /**
     * Blok adı girilebilecektir.
     *
     * @var string
     */
    public $BlockName;

    /**
     * Bina girilebilecektir.
     *
     * @var string
     */
    public $BuildingName;

    /**
     * Bina veya bloğa ait dış kapı numarası girilecektir.
     *
     * @var string
     */
    public $BuildingNumber;

    /**
     * İlçe/semt adı bilgileri girilecektir.
     *
     * @var string
     */
    public $CitySubdivisionName;

    /**
     * İl adı girilecektir.
     *
     * @var string
     */
    public $CityName;

    /**
     * Posta kod numarası girilecektir.
     *
     * @var string
     */
    public $PostalZone;

    /**
     * Kasaba/köy/mezra/mevkii bilgileri girilecektir.
     *
     * @var string
     */
    public $Region;

    /**
     * Mahalle adı girilecektir.
     *
     * @var string
     */
    public $District;

    /**
     * Ülke
     *
     * @var Country
     */
    public $Country;

}