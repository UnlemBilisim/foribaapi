<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:14
 */

namespace Bulut\eFaturaUBL;


class Invoice
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
     * @var |String
     */
    public $InvoiceTypeCode;
    /**
     * @var |Array
     */
    public $Note;
    /**
     * @var |String
     */
    public $DocumentCurrencyCode;
    /**
     * @var |String
     */
    public $LineCountNumeric;

    /**
     * @var |Bulut|eFaturaUBL|BillingReference
     */
    public $BillingReference;

    /**
     * @var \Bulut\eFaturaUBL\AdditionalDocumentReference
     */
    public $AdditionalDocumentReference;

    /**
     * @var \Bulut\eFaturaUBL\DespatchDocumentReference
     */
    public $DespatchDocumentReference;

    /**
     * @var |Bulut|eFaturaUBL|Signature
     */
    public $Signature;

    /**
     * @var |Bulut|eFaturaUBL|AccountingSupplierParty
     */
    public $AccountingSupplierParty;

    /**
     * @var |Bulut|eFaturaUBL|AccountingCustomerParty
     */
    public $AccountingCustomerParty;

    /**
     * @var \Bulut\eFaturaUBL\AllowanceCharge
     */
    public $AllowanceCharge;

    /**
     * @var |Bulut|eFaturaUBL|TaxTotal
     */
    public $TaxTotal;

    /**
     * @var |Bulut|eFaturaUBL|LegalMonetaryTotal
     */
    public $LegalMonetaryTotal;

    /**
     * @var \Bulut\eFaturaUBL\BuyerCustomerParty
     */
    public $BuyerCustomerParty;

    /**
     * @var \Bulut\eFaturaUBL\PaymentMeans
     */
    public $PaymentMeans;

    /**
     * @var \Bulut\eFaturaUBL\Delivery
     */
    public $Delivery;

    /**
     * @var \Bulut\eFaturaUBL\PaymentTerms
     */
    public $PaymentTerms;

    /**
     * @var \Bulut\eFaturaUBL\OriginatorDocumentReference
     */
    public $OriginatorDocumentReference;

    /**
     * @var \Bulut\eFaturaUBL\PaymentAlternativeExchangeRate
     */
    public $PaymentAlternativeExchangeRate;

    /**
     * @var \Bulut\eFaturaUBL\InvoicePeriod
     */
    public $InvoicePeriod;

    /**
     * @var \Bulut\eFaturaUBL\TaxRepresentativeParty
     */
    public $TaxRepresentativeParty;

    /**
     * @var \Bulut\eFaturaUBL\InvoiceLine Array
     */
    public $InvoiceLine;


}
