<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 13:49
 */

namespace Bulut\eFaturaUBL;


class Signature
{
    /**
     * @var |String
     */
    public $ID;

    /**
     * @var |Bulut|eFaturaUBL|SignatoryParty
     */
    public $SignatoryParty;

    /**
     * @var |Bulut|eFaturaUBL|DigitalSignatureAttachment
     */
    public $DigitalSignatureAttachment;
}