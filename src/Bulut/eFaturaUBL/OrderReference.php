<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 13:43
 */

namespace Bulut\eFaturaUBL;

/**
 * Siparişe ait bilgiler girilecektir.
 *
 * Class OrderReference
 * @package Bulut\eFaturaUBL
 */
class OrderReference
{

    /**
     * Sipariş numarası girilecektir.
     *
     * @var string
     */
    public $ID;

    /**
     * Satıcının verdiği sipariş numarası girilecektir.
     *
     * @var string
     */
    public $SalesOrderID;

    /**
     * Sipariş tarihi girilecektir.
     *
     * @var string
     */
    public $IssueDate;

    /**
     * Sipariş tipi girilecektir.
     *
     * @var string
     */
    public $OrderTypeCode;

    /**
     * Ek dökümanlar
     *
     * @var DocumentReference
     */
    public $DocumentReference;
}