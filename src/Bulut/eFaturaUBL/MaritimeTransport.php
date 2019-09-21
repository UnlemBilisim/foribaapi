<?php


namespace Bulut\eFaturaUBL;

/**
 * Deniz taşımacılığındaki gemi bilgileri girilir.
 *
 * Class MaritimeTransport
 * @package Bulut\eFaturaUBL
 */
class MaritimeTransport
{
    /**
     * Geminin varsa IMO ve MMSI numarası girilir.
     *
     * @var string
     */
    public $VesselID;

    /**
     * Geminin adı girilir.
     *
     * @var string
     */
    public $VesselName;

    /**
     * Geminin radyo çağrı adı girilir.
     *
     * @var string
     */
    public $RadioCallSignID;

    /**
     * Geminin ihtiyaçları bu elemana girilir.
     *
     * @var string
     */
    public $ShipsRequirements;

    /**
     * Geminin brüt ağırlığı girilir.
     *
     * @var array (attrs)
     */
    public $GrossTonnageMeasure;

    /**
     * Geminin net ağırlığı girilir.
     *
     * @var array (attrs)
     */
    public $NetTonnageMeasure;

    /**
     * Geminin kayıt dokümanı referansı girilir.
     *
     * @var RegistryCertificateDocumentReference
     */
    public $RegistryCertificateDocumentReference;

    /**
     * Geminin kayıt limanı bilgisi girilir.
     *
     * @var RegistryPortLocation
     */
    public $RegistryPortLocation;
}