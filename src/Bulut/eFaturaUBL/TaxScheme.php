<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 02:38
 */

namespace Bulut\eFaturaUBL;

/**
 * Bu eleman aracılığıyla vergi dairesi ile ilgili bilgiler verilebileceği gibi vergi ile ilgili bilgiler de verilebilir.
 * Bu elemanın farklı kullanımları için ilgili belge açıklamalarına bakınız.
 *
 * Class TaxScheme
 * @package Bulut\eFaturaUBL
 */
class TaxScheme
{
    /**
     * Vergilendirme şemasının ID bilgisi girilir.
     *
     * @var string
     */
    public $ID;

    /**
     * Bu eleman “Party” elemanı içerisinde kullanıldığında vergi dairesi adını içermektedir.
     *
     * @var string
     */
    public $Name;

    /**
     * Vergi Tipi Kodu girilecektir.
     *
     * @var string
     */
    public $TaxTypeCode;
}