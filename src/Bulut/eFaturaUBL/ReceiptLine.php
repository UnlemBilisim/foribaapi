<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:08
 */

namespace Bulut\eFaturaUBL;


class ReceiptLine
{
    /**
     * @var |String
     */
    public $ID;

    /**
     * @var |Array (val = string, attrs = [unitCode="C62"] )
     */
    public $ReceivedQuantity;

    /**
     * @var |Array (val = string, attrs = [unitCode="C62"] )
     */
    public $RejectedQuantity;

    /**
     * @var |Array (val = string, attrs = [unitCode="C62"] )
     */
    public $ShortQuantity;

    /**
     * @var |Array (val = string, attrs = [unitCode="C62"] )
     */
    public $OversupplyQuantity;

    /**
     * @var |String
     */
    public $RejectReason;

    /**
     * @var |String
     */
    public $TimingComplaint;

    /**
     * @var |Bulut|eFaturaUBL|OrderLineReference
     */
    public $OrderLineReference;

    /**
     * @var |Bulut|eFaturaUBL|DespatchLineReference
     */
    public $DespatchLineReference;

    /**
     * @var |Bulut|eFaturaUBL|Item
     */
    public $Item;
}