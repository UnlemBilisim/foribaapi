<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:09
 */

namespace Bulut\eFaturaUBL;

/**
 * Siparişin kalemlerine referans atmak için kullanılır
 *
 * Class OrderLineReference
 * @package Bulut\eFaturaUBL
 */
class OrderLineReference
{
    /**
     * Kalem numarası girilir.
     *
     * @var string
     */
    public $LineID;

    /**
     * Alıcının verdiği kalem numarası verilir.
     *
     * @var string
     */
    public $SalesOrderLineID;

    /**
     * Sipariş Kaleminin tekil numarası girilir.
     *
     * @var string
     */
    public $UUID;

    /**
     * Kalemin durumu girilir.
     *
     * @var string
     */
    public $LineStatusCode;

    /**
     * İlgili sipariş belgesine referans verilir.
     *
     * @var OrderReference
     */
    public $OrderReference;
}