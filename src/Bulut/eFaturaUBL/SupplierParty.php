<?php


namespace Bulut\eFaturaUBL;

/**
 * Satıcı bilgilerini tutan elemandır
 *
 * Class SupplierParty
 * @package Bulut\eFaturaUBL
 */
class SupplierParty
{
    /**
     * Satıcı tarafı tanımlar
     *
     * @var Party
     */
    public $Party;

    /**
     * DespatchSupplierParty elemanı altında kullanılması durumunda teslim eden bilgisi girilir.
     *
     * @var DespatchContact
     */
    public $DespatchContact;
}