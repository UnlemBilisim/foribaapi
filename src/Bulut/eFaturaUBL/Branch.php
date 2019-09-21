<?php


namespace Bulut\eFaturaUBL;

/**
 * Şube bilgisi girilir.
 *
 * Class Branch
 * @package Bulut\eFaturaUBL
 */
class Branch
{
    /**
     * Şube adı girilir.
     *
     * @var string
     */
    public $Name;

    /**
     * Banka bilgisi girilir.
     *
     * @var FinancialInstitution
     */
    public $FinancialInstitution;
}