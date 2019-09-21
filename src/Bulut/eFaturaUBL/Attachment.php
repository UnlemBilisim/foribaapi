<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 13:32
 */

namespace Bulut\eFaturaUBL;

/**
 * Belgelerde referans verilmek istenen referansların ya da belgelere eklenmek istenen dokümanların yer aldığı elemandır.
 *
 * Class Attachment
 * @package Bulut\eFaturaUBL
 */
class Attachment
{
    /**
     * İlişkilendirilmek istenen dokümanın URI formatında referansını tutar.
     * Eğer Attachment elemanı, bir “DigitalSignatureAttachment” ise (diğer bir deyişle Signature Elemanının içerisine yeralıyorsa)
     * External Reference zorunlu bir elemandır.
     *
     * @var ExternalReference
     */
    public $ExternalReference;

    /**
     * EmbeddedDocumentBinaryObject: İlişiklendirilmiş dokümanı base64Encoded formatında tutar.
     *
     * @var EmbeddedDocumentBinaryObject
     */
    public $EmbeddedDocumentBinaryObject;

}