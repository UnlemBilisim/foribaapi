<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:03
 */

namespace Bulut\eFaturaUBL;

/**
 * Belgede geçen mal/hizmete ilişkin bilgilerin girildiği elemandır.
 *
 * Class InvoiceLine
 * @package Bulut\eFaturaUBL
 */
class InvoiceLine
{
    /**
     *  Kalem sıra numarası girilir.
     *
     * @var string
     */
    public $ID;

    /**
     * Kalem hakkında açıklama serbest metin olarak girilir.
     *
     * @var array
     */
    public $Note;

    /**
     * Mal/hizmet miktarı birimi ile birlikte girilir.
     *
     * @var string
     */
    public $InvoicedQuantity;

    /**
     * Fatura ile ilişkili sipariş dokümanının kalemlerine referans atmak için kullanılır.
     *
     * @var OrderLineReference
     */
    public $OrderLineReference;

    /**
     * Fatura ile ilişkili irsaliye dokümanının kalemlerine referans atmak için kullanılır.
     *
     * @var DespatchLineReference
     */
    public $DespatchLineReference;

    /**
     * Fatura ile ilişkili alındı dokümanının kalemlerine referans atmak için kullanılır.
     *
     * @var ReceiptLineReference
     */
    public $ReceiptLineReference;

    /**
     * Kalem bazlı teslimat olması durumunda bu eleman doldurulur.
     *
     * @var Delivery
     */
    public $Delivery;

    /**
     * Mal/hizmet miktarı ile Mal/hizmet birim fiyatının çarpımı ile bulunan tutardır (varsa iskonto düşülür)
     *
     * @var array (val = string, attrs = [currencyID="TRY"] )
     */
    public $LineExtensionAmount;

    /**
     * Kalem bazlı ıskonto/artırım tutarıdır.
     *
     * @var AllowanceCharge
     */
    public $AllowanceCharge;
    
    /**
     * Kalem bazlı vergi bilgilerinin girildiği elemandır.
     *
     * @var TaxTotal
     */
    public $TaxTotal;

    /**
     * Kalem bazlı tevkifat uygulanması durumunda bu eleman kullanılır.
     *
     * @var WithholdingTaxTotal
     */
    public $WithholdingTaxTotal;
    
   /**
    *  Mal/hizmet hakkında bilgiler buraya girilir.
    *
     * @var Item
     */
    
    public $Item;

    /**
     * Mal/hizmet birim fiyatı hakkında bilgiler buraya girilir.
     *
     * @var Price
     */
    
    public $Price;

    /**
     * Eğer ürün için ek bir birim kodu kullanılması gerekiyorsa bu elemanın içindeki InvoicedQuantity elemanı (diğer opsyonel elemanlar boş bırakılarak) kullanılabilir.
     *
     * @var SubInvoiceLine
     */
    public $SubInvoiceLine;



}