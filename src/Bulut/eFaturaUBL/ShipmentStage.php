<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:32
 */

namespace Bulut\eFaturaUBL;

/**
 * Bu elemana taşıma faz bilgileri yazılır.
 *
 * Class ShipmentStage
 * @package Bulut\eFaturaUBL
 */
class ShipmentStage
{
    /**
     * Aşama bilgisi numarasi girilir.
     *
     * @var string
     */
    public $ID;

    /**
     *  Bu taşıma fazının hangi modda (hava, deniz, kara) gerçekleştiği bilgisi girilir.
     *
     * @var string
     */
    public $TransportModeCode;

    /**
     * Bu taşıma fazının nasıl bir araç ile gerçekleştiği bilgisi girilir (örneğin, kamyon, tır, gemi)
     *
     * @var string
     */
    public $TransportMeansCode;

    /**
     * Bu fazda gerçekleştirilen taşımanın güzergahı kodlu olarak girilir.
     *
     * @var string
     */
    public $TransitDirectionCode;

    /**
     * Fazla ilgili detay bilgi girilir (örneğin güzergah)
     *
     * @var string
     */
    public $Instructions;

    /**
     * Fazla ilgili detay bilgi girilir (örneğin güzergah)
     *
     * @var TransitPeriod
     */
    public $TransitPeriod;

    /**
     * Taşımada kullanılan vasıta hakkında detay bilgi girilir (örneğin kamyon plaka numarası)
     *
     * @var TransportMeans
     */
    public $TransportMeans;

    /**
     * Şoför bilgileri girilir.
     *
     * @var DriverPerson[]
     */
    public $DriverPerson;


}