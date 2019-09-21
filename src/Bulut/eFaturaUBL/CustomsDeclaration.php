<?php


namespace Bulut\eFaturaUBL;

/**
 * Ürün hakkında gümrük numaralandırma bilgisi girilir.
 *
 * Class CustomsDeclaration
 * @package Bulut\eFaturaUBL
 */
class CustomsDeclaration
{
    /**
     * Ürünün ilgili gümrük numarası girilir
     *
     * @var string
     */
    public $ID;

    /**
     * Numaralandırmayı yapan kurum bilgisi girilir
     *
     * @var IssuerParty
     */
    public $IssuerParty;

}