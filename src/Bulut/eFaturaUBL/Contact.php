<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 02:38
 */

namespace Bulut\eFaturaUBL;

/**
 * Bu elemana irtibat bilgileri yazılabilecektir.
 *
 * Class Contact
 * @package Bulut\eFaturaUBL
 */
class Contact
{
    /**
     * İrtibatın numara bilgisi yazılabilir.
     *
     * @var string
     */
    public $ID;

    /**
     * İrtibatın ismi metin olarak yazılabilir.
     *
     * @var string
     */
    public $Name;

    /**
     * Telefon numarası metin olarak girilecektir.
     *
     * @var string
     */
    public $Telephone;

    /**
     * Fax numarası metin olarak girilecektir.
     *
     * @var string
     */
    public $Telefax;

    /**
     * Elektronik posta adresi metin olarak girilecektir.
     *
     * @var string
     */
    public $ElectronicMail;

    /**
     * Serbest metin açıklama girilebilecektir.
     *
     * @var string
     */
    public $Note;

    /**
     * Başka iletişim kanalı veya ilave telefon, fax ve elektronik posta kullanılıyor ise bu eleman kanalın tanımlanmasında kullanılacaktır.
     *
     * @var OtherCommunication
     */
    public $OtherCommunication;
}