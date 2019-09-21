<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 14:33
 */

namespace Bulut\eFaturaUBL;

/**
 * Taşıma şekli bilgileri girilir.
 *
 * Class TransportMeans
 * @package Bulut\eFaturaUBL
 */
class TransportMeans
{
    /**
     * Seyahat/Sefer numarası girilir.
     *
     * @var string
     */
    public $JourneyID;

    /**
     * Kayıtlı olduğu ülke kodlu olarak girilir.
     *
     * @var string
     */
    public $RegistrationNationalityID;

    /**
     * Kayıtlı olduğu ülke serbest metin olarak girilir.
     *
     * @var string
     */
    public $RegistrationNationality;

    /**
     * Yön bilgisi kodlu olarak girilir.
     *
     * @var string
     */
    public $DirectionCode;

    /**
     * Taşıma şekli kodlu olarak girilir.
     *
     * @var string
     */
    public $TransportMeansTypeCode;

    /**
     * Ticaret servisi kodlu olarak girilir.
     *
     * @var string
     */
    public $TradeServiceCode;

    /**
     * İstifleme bilgisi kodlu olarak girilir.
     *
     * @var Stowage
     */
    public $Stowage;

    /**
     * Hava taşımacılığı bilgisi girilir.
     *
     * @var AirTransport
     */
    public $AirTransport;

    /**
     * Karayolu taşımacılığı bilgisi girilir.
     *
     * @var RoadTransport
     */
    public $RoadTransport;

    /**
     * Demiryolu taşımacılığı bilgisi girilir.
     *
     * @var RailTransport
     */
    public $RailTransport;

    /**
     * Deniz taşımacılığı bilgisi girilir.
     *
     * @var MaritimeTransport
     */
    public $MaritimeTransport;

    /**
     * Bu araca sahip olan taraf bilgisi girilir.
     *
     * @var OwnerParty
     */
    public $OwnerParty;

    /**
     * Ölçüm bilgileri girilir.
     *
     * @var MeasurementDimension
     */
    public $MeasurementDimension;
}