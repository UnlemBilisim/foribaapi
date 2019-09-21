<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:08
 */

namespace Bulut\eFaturaUBL;

/**
 * Bu elemanda teslim alınan mal hakkında bilgiler yer alacaktır.
 *
 * Class ReceiptLine
 * @package Bulut\eFaturaUBL
 */
class ReceiptLine
{
    /**
     * Kalem numarası girilir.
     *
     * @var string
     */
    public $ID;

    /**
     * Kalem açıklaması girilir.
     *
     * @var array
     */
    public $Note;

    /**
     * Teslim alınan mal adedi girilir.
     *
     * @var array (val = string, attrs = [unitCode="C62"] )
     */
    public $ReceivedQuantity;

    /**
     * Eksik olan mal adedi girilir.
     *
     * @var array (val = string, attrs = [unitCode="C62"] )
     */
    public $ShortQuantity;

    /**
     * Kabul edilmeyen mal adedi girilir.
     *
     * @var array (val = string, attrs = [unitCode="C62"] )
     */
    public $RejectedQuantity;

    /**
     * Reddedilme sebebi kodu girilir.
     *
     * @var string
     */
    public $RejectReasonCode;

    /**
     * Reddedilme sebebi açıklaması girilir.
     *
     * @var string
     */
    public $RejectReason;

    /**
     * Fazla teslim alınan mal adedi girilir.
     *
     * @var array (val = string, attrs = [unitCode="C62"] )
     */
    public $OversupplyQuantity;

    /**
     * Teslim alma tarihi girilir.
     *
     * @var string
     */
    public $ReceivedDate;

    /**
     * Geç teslim edilmesi durumunda şikayet kodlu olarak girilir.
     *
     * @var string
     */
    public $TimingComplaintCode;

    /**
     * Geç teslim edilmesi durumunda şikayet açıklaması girilir.
     *
     * @var string
     */
    public $TimingComplaint;

    /**
     * İlgili sipariş dokümanı kalemi bilgisi girilir.
     *
     * @var OrderLineReference
     */
    public $OrderLineReference;

    /**
     *  İlgili irsaliye dokümanı kalemi girilir.
     *
     * @var DespatchLineReference
     */
    public $DespatchLineReference;

    /**
     *  İlgili dokümanların bilgisi girilir.
     *
     * @var DocumentReference
     */
    public $DocumentReference;

    /**
     * Teslim alınan mal bilgisi girilir.
     *
     * @var Item
     */
    public $Item;

    /**
     *  Mal birim fiyatı girilir.
     *
     * @var Shipment
     */
    public $Shipment;
}