<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 02:11
 */

namespace Bulut\eFaturaUBL;


/**
 * Referans verilen ya da eklenen belgelere ilişkin bilgiler girilecektir
 *
 * Class DocumentReference
 * @package Bulut\eFaturaUBL
 */
class DocumentReference
{
    /**
     * Referans verilen veya eklenen belgenin sıra numarası girilecektir.
     *
     * @var string
     */
    public $ID;

    /**
     * Belgenin düzenlenme tarihi girilecektir.
     *
     * @var string
     */
    public $IssueDate;

    /**
     * Bu eleman belge seviyesinde kullanılmayacaktır. Kullanım alanı sistem seviyesinde dönen uygulama yanıtı (ApplicationResponse) belgesinin içindedir.
     *
     * @var string
     */
    public $DocumentTypeCode;

    /**
     * Referans verilen veya eklenen belgenin tipi girilecektir. Örnek olarak “XSLT”, “REKLAM”, “PROFORMA”,  “GÖRÜŞME DETAYI” ve benzeri değerler girilebilir.
     *
     * @var string
     */
    public $DocumentType;

    /**
     * Referans verilen ya da eklenen belgelere ilişkin serbest metin açıklaması girilebilir.
     *
     * @var string
     */
    public $DocumentDesciption;

    /**
     * Ek belgeler.
     *
     * @var Attachment
     */
    public $Attachment;

    /**
     * Referans verilen ya da eklenen belgenin geçerlilik süresi girilebilir.
     *
     * @var ValidityPeriod
     */
    public $ValidityPeriod;

    /**
     * Referans verilen ya da eklenen belgeyi yayınlayan taraf bilgisi girilebilir.
     *
     * @var IssuerParty
     */
    public $IssuerParty;


}