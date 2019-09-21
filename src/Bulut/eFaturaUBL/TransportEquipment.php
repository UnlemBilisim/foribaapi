<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:39
 */

namespace Bulut\eFaturaUBL;

/**
 * Taşıma ekipmanı bilgileri girilir.
 *
 * Class TransportEquipment
 * @package Bulut\eFaturaUBL
 */
class TransportEquipment
{
    /**
     * Tekil numarası girilir. Örneğin Dorse Plaka numarası.
     *
     * @var array (val = string, attrs = [schemeID="DORSEPLAKA"])
     */
    public $ID;

    /**
     * Ekipman tipi kodu girilir.
     *
     * @var string
     */
    public $TransportEquipmentTypeCode;

    /**
     * Serbest metin açıklama girilir.
     *
     * @var string
     */
    public $Description;
}