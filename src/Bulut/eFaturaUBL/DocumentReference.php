<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 02:11
 */

namespace Bulut\eFaturaUBL;


class DocumentReference
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
    public $DocumentTypeCode;

    /**
     * @var |String
     */
    public $DocumentType;

    /**
     * @var |String
     */
    public $DocumentDescription;

    /**
     * @var |Bulut|eFaturaUBL|Attachment
     */
    public $Attachment;


}