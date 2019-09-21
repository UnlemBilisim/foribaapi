<?php


namespace Bulut\eFaturaUBL;

/**
 * Her türlü alternatif iletişim kanalının tanımlanmasında kullanılacaktır.
 *
 * Class Communication
 * @package Bulut\eFaturaUBL
 */
class Communication
{
    /**
     * Bu eleman için UN/EDIFACT 3155 İletişim Numarası Kod Listesi kullanılmalıdır. Bknz. Kod Listeleri.
     *
     * @var string
     */
    public $ChannelCode;

    /**
     * Bu eleman metin olarak kanal adı için kullanılacaktır
     *
     * @var string
     */
    public $Channel;

    /**
     * Bu eleman iletişim adresini metin olarak tutar.
     *
     * @var string
     */
    public $Value;
}