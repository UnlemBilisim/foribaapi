<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 00:45
 */

namespace Bulut\eFaturaUBL;

/**
 * Belgelere ilişkin kabul, red ve diğer mesajlar bu elemana girilecektir.
 *
 * Class DocumentResponse
 * @package Bulut\eFaturaUBL
 */
class DocumentResponse
{
    /**
     * Yanıt
     *
     * @var Response
     */
    public $Response;

    /**
     * Yanıt verilen belgeye referans bilgisi içermektedir.
     *
     * @var DocumentReference
     */
    public $DocumentReference;

    /**
     * Satıra yanıt bilgilerini içerir. Dokümanın belli bir kalemi ile ilgili red ve düzeltme talebi olma durumunda
     * cbc:LineID elemanı ilgili kalem numarasını içerecektir.
     *
     * @var LineResponse
     */
    public $LineResponse;

}