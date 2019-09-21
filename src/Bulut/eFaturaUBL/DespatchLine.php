<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:49
 */

namespace Bulut\eFaturaUBL;

/**
 * Bu elemanda irsaliyede yer alan gönderilere ait bilgiler yer alacaktır
 *
 * Class DespatchLine
 * @package Bulut\eFaturaUBL
 */
class DespatchLine
{
    /**
     * İrsaliye kalemi numarası girilir.
     *
     * @var string
     */
    public $ID;

    /**
     * Kalem ile ilgili açıklama girilir.
     *
     * @var string
     */
    public $Note;

    /**
     * Gönderimi gerçekleştirilen mal adedi girilir.
     *
     * @var array (val = string, attrs = [unitCode="C62"] )
     */
    public $DeliveredQuantity;

    /**
     * İleriki bir tarihte gönderilecek mal adedi bilgisi girilir.
     *
     * @var array (val = string, attrs = [unitCode="C62"] )
     */
    public $OutstandingQuantity;

    /**
     * İleriki tarihte gönderilecek malın sebebi girilir.
     *
     * @var string
     */
    public $OutstandingReason;

    /**
     * Fazla miktarda gönderilen malın adedi girilir.
     *
     * @var array (val = string, attrs = [unitCode="C62"] )
     */
    public $OversupplyQuantity;

    /**
     * İlgili sipariş dokümanı kalemine referans girilir.
     *
     * @var OrderLineReference
     */
    public $OrderLineReference;

    /**
     * İlgili dokümanlara referans girilir.
     *
     * @var DocumentReference
     */
    public $DocumentReference;

    /**
     * Mal bilgisi girilir.
     *
     * @var Item
     */
    public $Item;

    /**
     * Ürün birim fiyatı bilgisi girilir.
     *
     * @var Shipment
     */
    public $Shipment;
}