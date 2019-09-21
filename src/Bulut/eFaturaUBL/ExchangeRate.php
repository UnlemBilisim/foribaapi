<?php


namespace Bulut\eFaturaUBL;

/**
 * Kur bilgileri ve kurun tarihi girilir
 *
 * Class ExchangeRate
 * @package Bulut\eFaturaUBL
 */
class ExchangeRate
{
    /**
     * Kaynak Para Birimi Kodu.
     *
     * @var string
     */
    public $SourceCurrencyCode;

    /**
     * Hedef Para Birimi Kodu.
     *
     * @var string
     */
    public $TargetCurrencyCode;

    /**
     * Döviz kuru girilir.
     *
     * @var float
     */
    public $CalculationRate;

    /**
     * Kurun tarihi yıl-ay-gün şeklinde girilir.
     *
     * @var string
     */
    public $Date;
}