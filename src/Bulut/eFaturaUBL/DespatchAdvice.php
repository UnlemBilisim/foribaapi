<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:22
 */

namespace Bulut\eFaturaUBL;


class DespatchAdvice
{

    /**
     * @var |String
     */
    public $DespatchAdviceTypeCode;


    /**
     * @var |Bulut|eFaturaUBL|OrderReference
     */
    public $OrderReference;

    /**
     * @var |Bulut|eFaturaUBL|AdditionalDocumentReference
     */
    public $AdditionalDocumentReference;

    /**
     * @var |Bulut|eFaturaUBL|Signature
     */
    public $Signature;

    /**
     * @var |Bulut|eFaturaUBL|DespatchSupplierParty
     */
    public $DespatchSupplierParty;

    /**
     * @var |Bulut|eFaturaUBL|DeliveryCustomerParty
     */
    public $DeliveryCustomerParty;

    /**
     * @var |Bulut|eFaturaUBL|DespatchLine Array
     */
    public $DespatchLine;


}