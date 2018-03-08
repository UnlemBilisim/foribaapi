<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 17:36
 */

namespace Bulut\eFaturaUBL;


class OriginatorDocumentReference
{
    /**
     * @var |String
     */
    public $ID;

    /**
     * @var |String
     */
    public $IssueDate;

    /**
     * @var |String
     */
    public $DocumentDescription;

    /**
     * @var \Bulut\eFaturaUBL\IssuerParty
     */
    public $IssuerParty;

}