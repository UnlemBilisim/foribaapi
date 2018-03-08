<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 00:45
 */

namespace Bulut\eFaturaUBL;


class DocumentResponse
{
    /**
     * @var |Bulut|eFaturaUBL|LineResponse
     */
    public $LineResponse;
    /**
     * @var |Bulut|eFaturaUBL|DocumentReference
     */
    public $DocumentReference;
    /**
     * @var |Bulut|eFaturaUBL|Response
     */
    public $Response;
}