<?php


namespace Bulut\eFaturaUBL;

/**
 * Mekan bilgisi girilir.
 *
 * Class Location
 * @package Bulut\eFaturaUBL
 */
class Location
{
    /**
     * Mekanı tanımlamak için kullanılır (örneğin GLN numarası)
     *
     * @var string
     */
    public $ID;

    /**
     * Addres bilgisini tutar.
     *
     * @var Address
     */
    public $Address;
}