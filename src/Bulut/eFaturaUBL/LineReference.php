<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 00:41
 */

namespace Bulut\eFaturaUBL;

/**
 * Kalem ile ilgili tanımlayıcı bilgilere bu elemanda yer verilecektir.
 *
 * Class LineReference
 * @package Bulut\eFaturaUBL
 */
class LineReference
{
    /**
     * Kalem Numarası. Kalemin sıra numarası girilecektir.
     *
     * @var string
     */
    public $LineID;

    /**
     * Kalemin durum bilgisi girilebilecektir.
     *
     * @var string
     */
    public $LineStatusCode;

    /**
     * Referans Belge
     *
     * @var DocumentReference
     */
    public $DocumentReference;
}