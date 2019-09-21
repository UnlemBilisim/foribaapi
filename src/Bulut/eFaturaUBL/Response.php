<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 00:37
 */

namespace Bulut\eFaturaUBL;

/**
 * Yanıta ait detaylar bu elemanda gösterilecektir
 *
 * Class Response
 * @package Bulut\eFaturaUBL
 */
class Response
{
    /**
     * Response elemanını tekil olarak tanımlayan numaradır.
     *
     * @var string
     */
    public $ReferenceID;

    /**
     * YanıtKodu
     *
     * @var string
     */
    public $ResponseCode;

    /**
     * Tanımlama. Yanıt ile ilgili açıklamalar bu elemana serbest metin olarak yazılabilecektir.
     *
     * @var string
     */
    public $Description;
}