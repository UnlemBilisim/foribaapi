<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 15:18
 */

namespace Bulut\eFaturaUBL;

/**
 * Fatura sürecindeki diğer ilgili fatura dokümanlarına referans vermek için kullanılır.
 * Örneğin iade faturalarında iade edilen faturaya ilişkin referans bilgisi bu elmanın altındaki “InvoiceDocumentReference”
 * elemanına eklenir. Ayrıca “CreditNote” ve “DebitNote” gibi yurtdışı ticarette iade işlemleri için sıkça
 * kullanılan belgelerede bu eleman aracılığı ile referans verilir
 *
 * Class BillingReference
 * @package Bulut\eFaturaUBL
 */
class BillingReference
{
    /**
     * Önceki ilişkili fatura belgelerine referans bilgisi girilir. Örneğin iade edilen faturaya referans bu eleman ile verilir.
     *
     * @var InvoiceDocumentReference
     */
    public $InvoiceDocumentReference;

    /**
     * Yurt dışında bir kurum kendine fatura kesebilmektedir. Bu eleman bu belgeye referans için kullanılmaktadır.
     *
     * @var SelfBilledInvoiceDocumentReference
     */
    public $SelfBilledInvoiceDocumentReference;

    /**
     * İlgili CreditNote (Satıcı tarafından düzenlenip alıcının borcunu düşürmek için kullanılan belge) dokümanına referans bilgisini tutar.
     *
     * @var CreditNoteDocumentReference
     */
    public $CreditNoteDocumentReference;

    /**
     * Yurt dışında bir kurum kendine iade faturası kesebilmektedir. Bu eleman bu belgeye referans için kullanılmaktadır.
     *
     * @var SelfBilledCreditNoteDocumentReference
     */
    public $SelfBilledCreditNoteDocumentReference;

    /**
     * İlgili DebitNote (Alıcı tarafından düzenlenip alıcının borcunu düşürmek için kullanılan belge) dokümanına referans bilgisini tutar.
     *
     * @var DebitNoteDocumentReference
     */
    public $DebitNoteDocumentReference;

    /**
     * İlgili hatırlatma belgesine referans girilir.
     *
     * @var ReminderDocumentReference
     */
    public $ReminderDocumentReference;

    /**
     * Diğer başka dokümanlara referans bilgisi girilebilir.
     *
     * @var AdditionalDocumentReference
     */
    public $AdditionalDocumentReference;

    /**
     * Detaylı olarak belli bir kaleme referans atmak istenirse kullanılır.
     *
     * @var BillingReferenceLine
     */
    public $BillingReferenceLine;
}