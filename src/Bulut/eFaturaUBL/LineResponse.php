<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 00:43
 */

namespace Bulut\eFaturaUBL;

/**
 * Bir belgenin belli bir kalemine yanıt verilirken bu eleman kullanılabilecektir.
 *
 * Class LineResponse
 * @package Bulut\eFaturaUBL
 */
class LineResponse
{
    /**
     * Kalem Bilgisi
     *
     * @var LineReference
     */
    public $LineReference;

    /**
     * Yanıt
     *
     * @var Response
     */
    public $Response;
}