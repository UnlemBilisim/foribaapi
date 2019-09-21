<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:29
 */

namespace Bulut\eFaturaUBL;

/**
 * Belge üzerinde yer alan vergi türü, muafiyet ve istisnalara ilişkin bilgiler girilir.
 *
 * Class TaxCategory
 * @package Bulut\eFaturaUBL
 */
class TaxCategory
{
    /**
     * Vergi türü ismi girilebilecektir.
     *
     * @var string
     */
    public $Name;

    /**
     * Vergi muafiyet, istisna sebepleri bu alana kodlu olarak girilecektir.
     *
     * @var string
     */
    public $TaxExemptionReasonCode;

    /**
     * Vergi muafiyet, istisna sebepleri bu alana serbest metin olarak girilecektir.
     *
     * @var string
     */
    public $TaxExemptionReason;

    /**
     * Uygulanan vergi türü hakkında bilgiler girilir.
     *
     * @var TaxScheme
     */
    public $TaxScheme;

}