<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 13:41
 */

namespace Bulut\eFaturaUBL;


class ReceiptAdvice
{

    /**
     * @var |String
     */
    public $UBLVersionID;

    /**
     * @var |String
     */
    public $CustomizationID;

    /**
     * @var |String
     */
    public $ProfileID;

    /**
     * @var |String
     */
    public $ID;

    /**
     * @var |String
     */
    public $CopyIndicator;

    /**
     * @var |String
     */
    public $UUID;

    /**
     * @var |String
     */
    public $IssueDate;

    /**
     * @var |String
     */
    public $IssueTime;

    /**
     * @var |Array
     */
    public $Note;

    /**
     * @var |String
     */
    public $ReceiptAdviceTypeCode;

    /**
     * @var |Bulut|eFaturaUBL|OrderReference
     */
    public $OrderReference;

    /**
     * @var |Bulut|eFaturaUBL|DespatchDocumentReference
     */
    public $DespatchDocumentReference;

    /**
     * @var |Bulut|eFaturaUBL|AdditionalDocumentReference
     */
    public $AdditionalDocumentReference;

    /**
     * @var |Bulut|eFaturaUBL|Signature
     */
    public $Signature;

    /**
     * @var |Bulut|eFaturaUBL|DeliveryCustomerParty
     */
    public $DeliveryCustomerParty;

    /**
     * @var |Bulut|eFaturaUBL|Shipment
     */
    public $Shipment;

    /**
     * @var |Bulut|eFaturaUBL|ReceiptLine
     */
    public $ReceiptLine;


}