<?php


namespace Bulut\eFaturaUBL;

/**
 * Belgelerde dönem kullanılması halinde dönem bu elemanda gösterilir.
 *
 * Class Period
 * @package Bulut\eFaturaUBL
 */
class Period
{
    /**
     * Başlangıç Tarihi
     *
     * @var string
     */
    public $StartDate;

    /**
     * Başlangıç Saati
     *
     * @var string
     */
    public $StartTime;

    /**
     * Bitiş Tarihi
     *
     * @var string
     */
    public $EndDate;

    /**
     * Bitiş Saati
     *
     * @var string
     */
    public $EndTime;

    /**
     * Dönem süresi numerik olarak, dönem aralığı tipi’de “unitCode” attribute değerine yıl için “ANN”, ay için “MON”, gün için “DAY” ve saat için “HUR” girilmesi gerekmektedir.
     *
     * @var array
     */
    public $DurationMeasure;

    /**
     * Dönemin açıklaması serbest metin olarak girilecektir.
     *
     * @var string
     */
    public $Description;
}