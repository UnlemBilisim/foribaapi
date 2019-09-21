<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 02:37
 */

namespace Bulut\eFaturaUBL;

/**
 * Ülke bilgisi girilecektir.
 *
 * Class Country
 * @package Bulut\eFaturaUBL
 */
class Country
{
    /**
     * “IdentificationCode” elemanı ülkeleri tanımlamak için kullanılan kodlu elemandır.
     * Bu eleman değer kümesini ISO 3166-1-alpha-2 Ülke Kodları listesinden almalıdır.
     *
     * @var string
     */
    public $IdentificationCode;

    /**
     * Ülkeleri tanımlamak için kullanılan metin elemanıdır.
     *
     * @var string
     */
    public $Name;
}