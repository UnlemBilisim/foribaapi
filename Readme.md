# Foriba E-Fatura ve E-Arşiv SDK

Forabi eFatura ve eArşiv PHP SDK. PHP ile eArşiv ve eFatura gönderim klavuzu.
## İçerik

 
 - [Kurulum](#kurulum)
 - [Gereksinimler](#e-fatura-kay%C4%B1tl%C4%B1-kullan%C4%B1c%C4%B1lar-sorgulama)
 - [E-Fatura Servisi](#e-fatura-gelengiden-faturalar%C4%B1-sorgulama)
 - [E-Fatura Kayıtlı Kullanıcılar Sorgulama](#e-fatura-kay%C4%B1tl%C4%B1-kullan%C4%B1c%C4%B1lar-sorgulama)
 - [E-Fatura Gelen/Giden Faturaları Sorgulama](#e-fatura-gelengiden-faturalar%C4%B1-sorgulama)
 - [E-Fatura, Gelen/Giden Fatura PDF veya HTML İndirme.](#e-fatura-gelengiden-fatura-pdf-veya-html-%C4%B0ndirme)
 - [E-Fatura Gelen/Giden Fatura UBL İndirme.](#e-fatura-gelengiden-fatura-ubl-%C4%B0ndirme)
 - [E-Fatura Zarf Sorgulama](#e-fatura-zarf-sorgulama)
 - [E-Fatura Uygulama Yanıtı UBL Oluşturma ( Örnek )](#e-fatura-uygulama-yan%C4%B1t%C4%B1-ubl-olu%C5%9Fturma--%C3%96rnek-)
 - [E-Fatura UBL Oluşturma ( örnek )](#e-fatura-ubl-olu%C5%9Fturma--%C3%B6rnek-)
 - [E-Fatura Gönderme](#e-fatura-g%C3%B6nderme)
 - [E-Arşiv Fatura](#e-ar%C5%9Fiv-fatura)
 - [E-Arşiv Fatura Oluşturma](#e-ar%C5%9Fiv-fatura-olu%C5%9Fturma)
 - [E-Arşiv Fatura Gönderme](#e-ar%C5%9Fiv-fatura-g%C3%B6nderme)
 - [E-Arşiv Zarf Gönderme](#e-ar%C5%9Fiv-zarf-g%C3%B6nderme)
 - [E-Arşiv Fatura İptal Etme](#e-ar%C5%9Fiv-fatura-%C4%B0ptal-etme)
 - [E-Arşiv Fatura Tekrar Tetikleme](#e-ar%C5%9Fiv-fatura-tekrar-tetikleme)
 - [E-Arşiv Kayıtlı Kullanıcılar Listesi](#e-ar%C5%9Fiv-kay%C4%B1tl%C4%B1-kullan%C4%B1c%C4%B1lar-listesi)
 - [E-Arşiv Fatura Görüntüsü İndirme](#e-ar%C5%9Fiv-fatura-g%C3%B6r%C3%BCnt%C3%BCs%C3%BC-%C4%B0ndirme)
 - [E-Arşiv Fatura İmzalama](#e-ar%C5%9Fiv-fatura-%C4%B0mzalama)

# Kurulum
```sh
composer require unlembilisim/foribaapi:dev-master
```
veya 

Dosyaları ZIP olarak indirerek kullanmaya başlayabilirsiniz.
```php
require 'vendor/autoload.php';
```
Dosyasının sisteminize dahil ederek eFatura ve eArşiv servislerini kullanmaya başlayabilirsiniz.

## Gereksinimler

 - GuzzleHttp
 - ZipArchive
 - PHP 7.0 veya üzeri.

## E-Fatura

Yeni nesil E-Fatura göndermek için kullanacağımız sınıf;
```php
use Bulut\FITApi\FITInvoiceService;
$service = new \Bulut\FITApi\FITInvoiceService(['username'=> 'WS_KULLANICIADI', 'password'=>'WS_SIFRE'], true);
// Son parametre, servis TEST ortamında ise true yapabilirsiniz veya boş bırakabilirsiniz
```

## E-Fatura Kayıtlı Kullanıcılar Sorgulama
```php
$userListRequest = new \Bulut\InvoiceService\GetUserList();
$userListRequest->setIdentifier("SORGULAYAN_PK");
$userListRequest->setVKNTCKN("SORGULAYAN_VKN_TCKN");
$userListRequest->setRole("PK/GB");
$userListRequest->setFilterVKNTCKN("SORGULANAN_VKN_TCKN");
$list = $service->GetUserListRequest($userListRequest);
```

Liste halinde kayıtlı kullanıcılar listesini dönecektir. Fonksiyonun daha detaylı açıklamasını Foriba Web Servis Dökümanından edinebilirsiniz.

## E-Fatura Gelen/Giden Faturaları Sorgulama
```php
$getUblRequest = new \Bulut\InvoiceService\GetUblList();
$getUblRequest->setIdentifier("SORGULAYAN_PK"); // veya GB
$getUblRequest->setVKNTCKN("SORGULAYAN_VKN_TCKN"); 
$getUblRequest->setDocType("INVOICE"); // veya ENVOLOPE
$getUblRequest->setType("INBOUND"); // veya OUTBOUND
$getUblRequest->setFromDate("yyyy-MM-dd");
$getUblRequest->setToDate(getSession("yyyy-MM-dd"));
$getUblRequest->setFromDateSpecified(true);
$getUblRequest->setToDateSpecified(true);
$list = $service->GetUblListRequest($getUblRequest);
```
Posta kutunuza gelen faturaları listelemek için tetiklenen fonksiyon. Fonksiyon parametreleri ile ilgili detaylı bilgiyi Foriba E-Fatura Dökümanında bulabilirsiniz.

## E-Fatura, Gelen/Giden Fatura PDF veya HTML İndirme.
```php
$getInvoiceRequest = new \Bulut\InvoiceService\GetInvoiceView();
$getInvoiceRequest->setUUID("FATURA_UUID");
$getInvoiceRequest->setIdentifier("SORGULAYAN_PK"); // veya GB
$getInvoiceRequest->setVKNTCKN("SORGULAYAN_VKN_TCKN"); // veya GB
$getInvoiceRequest->setType("INVOICE"); // ENVOLOPE
$getInvoiceRequest->setDocType("PDF"); // veya PDF, PDF_DEFAULT, HTML
$data = $service->GetInvoiceViewRequest($getInvoiceRequest);
```
Seçmiş olduğunuz faturanın PDF veya HTML çıktısını almanızı sağlar. Parametreler ile ilgili daha detaylı bilgiyi Foriba E-Fatura dökümanından inceleyebilirsiniz.

## E-Fatura Gelen/Giden Fatura UBL İndirme.
```php
$getUblRequest = new \Bulut\InvoiceService\GetUbl();
$getUblRequest->setIdentifier("SORGULAYAN_PK"); // veya GB
$getUblRequest->setVKNTCKN("SORGULAYAN_VKN_TCKN");
$getUblRequest->setDocType("INVOICE"); // veya ENVOLOPE
$getUblRequest->setType("UBL"); // UBL
$getUblRequest->setUUID("FATURA_UUID");
$getUblRequest->setParameters("DOC_DATA");
$data = $service->GetUblRequest($getUblRequest);
```
Seçmiş olduğunuz faturanın UBL çıktısını almanıza yarar. Parametreler için daha detaylı bilgiyi Foriba E-Fatura Dökümanında bulabilirsiniz.

## E-Fatura Zarf Sorgulama
```php
$getEnvelopeRequest = new \Bulut\InvoiceService\GetEnvelopeStatus();
$getEnvelopeRequest->setIdentifier("SORGULAYAN_PK"); // veya GB
$getEnvelopeRequest->setVKNTCKN("SORGULAYAN_VKN_TCKN");
$getEnvelopeRequest->setUUID("ZARF_UUID");
$getEnvelopeRequest->setParameters("DOC_DATA"); // ek parametre
$data = $service->GetEnvelopeStatusRequest($getEnvelopeRequest);
```
Seçilen zarfın durumunu vb. durumları sorgulama ve detaylar için kullanılan fonksiyon. Daha detaylı bilgi için foriba dökümanına göz atınız.

## E-Fatura Uygulama Yanıtı UBL Oluşturma ( Örnek )
```php
$appResp = new \Bulut\eFaturaUBL\ApplicationResponse();
$appResp->UBLVersion = "2.1";
$appResp->CustomizationID = "TR1.2";
$appResp->ProfileID = "TICARIFATURA";
$appResp->ID = \Bulut\eFaturaUBL\XMLHelper::CreateGUID();
$appResp->UUID = $UUID;
$appResp->IssueDate = date('Y-m-d', strtotime($tarih));

// SenderParty
$senderParty = new \Bulut\eFaturaUBL\SenderParty();

$senderParty_Identification = new \Bulut\eFaturaUBL\PartyIdentification();
$senderParty_Identification->ID = ['val'=> "GONDERICI_TCKN_VKN", 'attrs' => ['schemaID="TCKN"']];
$senderParty->PartyIdentification = $senderParty_Identification;

$senderParty_Name = new \Bulut\eFaturaUBL\PartyName();
$senderParty_Name->Name = "Orhan Gazi Başlı";
$senderParty->PartyName = $senderParty_Name;

$senderParty_PostalAddress = new \Bulut\eFaturaUBL\PostalAddress();
$senderParty_PostalAddress->CitySubdivisionName = "Aşık Veysel";
$senderParty_PostalAddress->CityName = "Kayseri";

$senderParty_PostalAddress_Country = new \Bulut\eFaturaUBL\Country();
$senderParty_PostalAddress_Country->Name = "Türkiye";
$senderParty_PostalAddress->Country = $senderParty_PostalAddress_Country;
$senderParty->PostalAddress = $senderParty_PostalAddress;
$appResp->SenderParty = $senderParty;

// ReceiverParty
$receiverParty = new \Bulut\eFaturaUBL\SenderParty();

$receiverParty_Identification = new \Bulut\eFaturaUBL\PartyIdentification();
$receiverParty_Identification->ID = ['val'=> "ALICI_TCKN_VKN", 'attrs' => ['schemaID="TCKN"']];
$receiverParty->PartyIdentification = $receiverParty_Identification;

$receiverParty_Name = new \Bulut\eFaturaUBL\PartyName();
$receiverParty_Name->Name = "Orhan Gazi Başlı";
$receiverParty->PartyName = $receiverParty_Name;

$receiverParty_PostalAddress = new \Bulut\eFaturaUBL\PostalAddress();
$receiverParty_PostalAddress->CitySubdivisionName = "Aşık Veysel";
$receiverParty_PostalAddress->CityName = "Kayseri";

$receiverParty_PostalAddress_Country = new \Bulut\eFaturaUBL\Country();
$receiverParty_PostalAddress_Country->Name = "Türkiye";
$receiverParty_PostalAddress->Country = $receiverParty_PostalAddress_Country;
$receiverParty->PostalAddress = $receiverParty_PostalAddress;
$appResp->ReceiverParty= $receiverParty;



$documentResponse = new \Bulut\eFaturaUBL\DocumentResponse();

$documentResponse_Response = new \Bulut\eFaturaUBL\Response();
$documentResponse_Response->ReferenceID = "12345";
$documentResponse_Response->ResponseCode = "KABUL";
$documentResponse->Response = $documentResponse_Response;

$documentResponse_DocumentReference = new \Bulut\eFaturaUBL\DocumentReference();
$documentResponse_DocumentReference->ID = $UUID;
$documentResponse_DocumentReference->DocumentType = "FATURA";
$documentResponse_DocumentReference->DocumentTypeCode = "FATURA";
$documentResponse_DocumentReference->IssueDate = "BELGE_TARIHI"; // Y-m-d
$documentResponse->DocumentReference = $documentResponse_DocumentReference;

$appResp->DocumentResponse = $documentResponse;

$xmlHelper = new \Bulut\eFaturaUBL\XMLHelper($appResp);
$xml = $xmlHelper->getApplicationResponseXML();
```

Örnek bir fatura KABUL uygulama yanıtı örneğidir. Örnekte kullanılan alanlar ve isimler GIB ve Foriba standartlarına göre oluşturulmuştur. Alanların anlam ve kardanitesi için GIB ve Foriba dökümanlarını inceleyebilirsiniz.

Dikkat edilmesi gereken nokta SDK içerisinde xml dosyası için attiribute kullanılması gereken yerde ARRAY olarak kullanıyoruz ve key => value olarak gözükmektedir.
Örnek : 
```php
['val'=> "ALICI_VEYA_GONDERICI_TCKN", 'attrs' => ['schemaID="TCKN"']]
```

Örnekte  alıcının TCKN değerini set ettik. Kurumsal kişi için örnek;
```php
['val'=> "ALICI_VEYA_GONDERICI_VKN", 'attrs' => ['schemaID="VKN"']]
```

attrs parametresi ARRAY olarak set edilir, birden fazla attibute eklenebilir.

Alanlar hakkında daha detaylı bilgi için GIB veya Foriba Dökümanlarını inceleyebilirsiniz.

## E-Fatura UBL Oluşturma ( örnek )
```php
$docRefences = [];

$uuid = \Bulut\eFaturaUBL\XMLHelper::CreateGUID();

$invoice = new \Bulut\eFaturaUBL\Invoice();
$invoice->UBLVersionID = "2.1"; //uluslararası fatura standardı 2.1
$invoice->CustomizationID = "TR1.2"; //fakat GİB UBLTR olarak isimlendirdiği Türkiye'ye özgü 1.2 efatura formatını kullanıyor.
$invoice->ProfileID = "TICARIFATURA"; //ticari ve temel olarak iki çeşittir. ticari faturalarda sistem yanıtı(application response) döner.
#$invoice->ID = "FIT2017000000021"; //Eğer fatura ID FIT tarafından oluşacak ise, ID alanı boş, CUST_INV_ID alanı dolu gelmelidir. Eğer kullanıcı firma tarafından oluşacak ise, ID alanı dolu CUST_INV_ID alanı boş olarak gönderilmeli.
$invoice->CopyIndicator = "false"; //kopyası mı, asıl süret mi olduğu belirlenir
$invoice->UUID = $uuid; //fatura UUID
$invoice->IssueDate = "FATURA_TARIHI"; //Y-m-d fatura tarihi
$invoice->InvoiceTypeCode = "SATIS"; //gönderilecek fatura çeşidi, satış, iade vs.
$invoice->Note = ["Test not"]; //isteğe bağlı not alanı
$invoice->DocumentCurrencyCode = "TRY"; //efatura para birimi
$invoice->LineCountNumeric = 1;  //fatura kalemlerinin sayısı

//Fatura ID otomatik oluşacak ise bu alanı göndermelisiniz.
$invoice_Document_Refence = new \Bulut\eFaturaUBL\DocumentReference();
$invoice_Document_Refence->ID = \Bulut\eFaturaUBL\XMLHelper::CreateGUID();
$invoice_Document_Refence->IssueDate = date('Y-m-d', strtotime($tarih));
$invoice_Document_Refence->DocumentTypeCode = "CUST_INV_ID";
$docRefences[] = $invoice_Document_Refence;


$invoice->AdditionalDocumentReference = $docRefences;

$invoice_AccountSupplierParty = new \Bulut\eFaturaUBL\AccountingSupplierParty();
$invoice_AccountSupplierParty_Party = new \Bulut\eFaturaUBL\Party();
$invoice_AccountSupplierParty_Party->WebsiteURI = "http://unlembilisim.com";

$invoice_AccountSupplierParty_Party_Identifi = new \Bulut\eFaturaUBL\PartyIdentification();
$invoice_AccountSupplierParty_Party_Identifi->ID = ['val'=> '12345678901', 'attrs' => ['schemeID="VKN"']];
$invoice_AccountSupplierParty_Party->PartyIdentification = $invoice_AccountSupplierParty_Party_Identifi;

$invoice_AccountSupplierParty_Party_Name = new \Bulut\eFaturaUBL\PartyName();
$invoice_AccountSupplierParty_Party_Name->Name = "Orhan Gazi Başlı";
$invoice_AccountSupplierParty_Party->PartyName = $invoice_AccountSupplierParty_Party_Name;

$invoice_AccountSupplierParty_Party_Person = new \Bulut\eFaturaUBL\Person();
$invoice_AccountSupplierParty_Party_Person->FirstName = "Orhan Gazi";
$invoice_AccountSupplierParty_Party_Person->FamilyName = "Başlı";
$invoice_AccountSupplierParty_Party->Person = $invoice_AccountSupplierParty_Party_Person;


$invoice_AccountSupplierParty_Party_PostalAdd = new \Bulut\eFaturaUBL\PostalAddress();
$invoice_AccountSupplierParty_Party_PostalAdd->Room = "kapi no";
$invoice_AccountSupplierParty_Party_PostalAdd->StreetName = "cadde";
$invoice_AccountSupplierParty_Party_PostalAdd->BuildingName = "bina";
$invoice_AccountSupplierParty_Party_PostalAdd->BuildingNumber = "bina no";
$invoice_AccountSupplierParty_Party_PostalAdd->CitySubdivisionName = "mahalle";
$invoice_AccountSupplierParty_Party_PostalAdd->CityName = "şehir";
$invoice_AccountSupplierParty_Party_PostalAdd->PostalZone = "posta kodu";
$invoice_AccountSupplierParty_Party_PostalAdd->Region = "asd";

$invoice_AccountSupplierParty_Party_PostalAdd_Country = new \Bulut\eFaturaUBL\Country();
$invoice_AccountSupplierParty_Party_PostalAdd_Country->Name = "Türkiye";

$invoice_AccountSupplierParty_Party_PostalAdd->Country = $invoice_AccountSupplierParty_Party_PostalAdd_Country;
$invoice_AccountSupplierParty_Party->PostalAddress = $invoice_AccountSupplierParty_Party_PostalAdd;

$invoice_AccountSupplierParty_Party_TaxSchema = new \Bulut\eFaturaUBL\PartyTaxScheme();
$invoice_AccountSupplierParty_Party_TaxSchema_Schema = new \Bulut\eFaturaUBL\TaxScheme();
$invoice_AccountSupplierParty_Party_TaxSchema_Schema->Name = "erciyes";
$invoice_AccountSupplierParty_Party_TaxSchema->TaxScheme = $invoice_AccountSupplierParty_Party_TaxSchema_Schema;
$invoice_AccountSupplierParty_Party->PartyTaxScheme = $invoice_AccountSupplierParty_Party_TaxSchema;

$invoice_AccountSupplierParty_Party_Contact = new \Bulut\eFaturaUBL\Contact();
$invoice_AccountSupplierParty_Party_Contact->Telephone = "telef";
$invoice_AccountSupplierParty_Party_Contact->Telefax = "Telefax";
$invoice_AccountSupplierParty_Party_Contact->ElectronicMail = "ElectronicMail";
$invoice_AccountSupplierParty_Party->Contact = $invoice_AccountSupplierParty_Party_Contact;

$invoice_AccountSupplierParty->Party = $invoice_AccountSupplierParty_Party;

$invoice->AccountingSupplierParty = $invoice_AccountSupplierParty;


//Customer

$invoice_AccountCustomerParty = new \Bulut\eFaturaUBL\AccountingCustomerParty();
$invoice_AccountCustomerParty_Party = new \Bulut\eFaturaUBL\Party();
$invoice_AccountCustomerParty_Party->WebsiteURI = "http://unlembilisim.com";

$invoice_AccountCustomerParty_Party_Identifi = new \Bulut\eFaturaUBL\PartyIdentification();
$invoice_AccountCustomerParty_Party_Identifi->ID = ['val'=> "12345678901", 'attrs' => ['schemeID="VKN"']];
$invoice_AccountCustomerParty_Party->PartyIdentification = $invoice_AccountCustomerParty_Party_Identifi;

$invoice_AccountCustomerParty_Party_Name = new \Bulut\eFaturaUBL\PartyName();
$invoice_AccountCustomerParty_Party_Name->Name = "GIB";
$invoice_AccountCustomerParty_Party->PartyName = $invoice_AccountCustomerParty_Party_Name;

$invoice_AccountCustomerParty_Party_PostalAdd = new \Bulut\eFaturaUBL\PostalAddress();
$invoice_AccountCustomerParty_Party_PostalAdd->Room = "kapi no";
$invoice_AccountCustomerParty_Party_PostalAdd->StreetName = "cadde";
$invoice_AccountCustomerParty_Party_PostalAdd->BuildingName = "bina";
$invoice_AccountCustomerParty_Party_PostalAdd->BuildingNumber = "bina no";
$invoice_AccountCustomerParty_Party_PostalAdd->CitySubdivisionName = "mahalle";
$invoice_AccountCustomerParty_Party_PostalAdd->CityName = "şehir";
$invoice_AccountCustomerParty_Party_PostalAdd->PostalZone = "posta kodu";
$invoice_AccountCustomerParty_Party_PostalAdd->Region = "asd";

$invoice_AccountCustomerParty_Party_PostalAdd_Country = new \Bulut\eFaturaUBL\Country();
$invoice_AccountCustomerParty_Party_PostalAdd_Country->Name = "Türkiye";

$invoice_AccountCustomerParty_Party_PostalAdd->Country = $invoice_AccountCustomerParty_Party_PostalAdd_Country;
$invoice_AccountCustomerParty_Party->PostalAddress = $invoice_AccountCustomerParty_Party_PostalAdd;

$invoice_AccountCustomerParty_Party_TaxSchema = new \Bulut\eFaturaUBL\PartyTaxScheme();
$invoice_AccountCustomerParty_Party_TaxSchema_Schema = new \Bulut\eFaturaUBL\TaxScheme();
$invoice_AccountCustomerParty_Party_TaxSchema_Schema->Name = "erciyes";
$invoice_AccountCustomerParty_Party_TaxSchema->TaxScheme = $invoice_AccountCustomerParty_Party_TaxSchema_Schema;
$invoice_AccountCustomerParty_Party->PartyTaxScheme = $invoice_AccountCustomerParty_Party_TaxSchema;

$invoice_AccountCustomerParty_Party_Contact = new \Bulut\eFaturaUBL\Contact();
$invoice_AccountCustomerParty_Party_Contact->Telephone = "telef";
$invoice_AccountCustomerParty_Party_Contact->Telefax = "Telefax";
$invoice_AccountCustomerParty_Party_Contact->ElectronicMail = "ElectronicMail";
$invoice_AccountCustomerParty_Party->Contact = $invoice_AccountCustomerParty_Party_Contact;

$invoice_AccountCustomerParty->Party = $invoice_AccountCustomerParty_Party;

$invoice->AccountingCustomerParty= $invoice_AccountCustomerParty;

$invoice_Allowence = new \Bulut\eFaturaUBL\AllowanceCharge();
$invoice_Allowence->ChargeIndicator = "false";
$invoice_Allowence->Amount = ["val" => "0.01", 'attrs' => ['currencyID="TRY"']];
$invoice->AllowanceCharge = $invoice_Allowence;

$invoice_TaxTotal = new \Bulut\eFaturaUBL\TaxTotal();
$invoice_TaxTotal->TaxAmount = ["val" => "0.01", 'attrs' => ['currencyID="TRY"']];

$invoice_TaxTotal_SubTotal = new \Bulut\eFaturaUBL\TaxSubtotal();
$invoice_TaxTotal_SubTotal->TaxableAmount = ["val" => "0.99", 'attrs' => ['currencyID="TRY"']];
$invoice_TaxTotal_SubTotal->TaxAmount = ["val" => "0.01", 'attrs' => ['currencyID="TRY"']];

$invoice_TaxTotal_SubTotal_Category = new \Bulut\eFaturaUBL\TaxCategory();
$invoice_TaxTotal_SubTotal_Category_Schema = new \Bulut\eFaturaUBL\TaxScheme();
$invoice_TaxTotal_SubTotal_Category_Schema->Name = "KDV";
$invoice_TaxTotal_SubTotal_Category_Schema->TaxTypeCode = "0015";

$invoice_TaxTotal_SubTotal_Category->TaxScheme = $invoice_TaxTotal_SubTotal_Category_Schema;
$invoice_TaxTotal_SubTotal->TaxCategory = $invoice_TaxTotal_SubTotal_Category;
$invoice_TaxTotal->TaxSubtotal = $invoice_TaxTotal_SubTotal;

$invoice->TaxTotal = $invoice_TaxTotal;

$invoice_LegalMonetary = new \Bulut\eFaturaUBL\LegalMonetaryTotal();
$invoice_LegalMonetary->LineExtensionAmount = ["val" => "1", 'attrs' => ['currencyID="TRY"']];
$invoice_LegalMonetary->TaxExclusiveAmount = ["val" => "0.99", 'attrs' => ['currencyID="TRY"']];
$invoice_LegalMonetary->TaxInclusiveAmount = ["val" => "1", 'attrs' => ['currencyID="TRY"']];
$invoice_LegalMonetary->AllowanceTotalAmount = ["val" => "0.01", 'attrs' => ['currencyID="TRY"']];
$invoice_LegalMonetary->PayableAmount = ["val" => "1", 'attrs' => ['currencyID="TRY"']];

$invoice->LegalMonetaryTotal = $invoice_LegalMonetary;

$invoice_line = new \Bulut\eFaturaUBL\InvoiceLine();
$invoice_line->ID = "1";
$invoice_line->InvoicedQuantity = ["val" => "1", 'attrs' => ['unitCode="CMT"']];
$invoice_line->LineExtensionAmount = ["val" => "0.99", 'attrs' => ['currencyID="TRY"']];

$invoice_line_allowence = new \Bulut\eFaturaUBL\AllowanceCharge();
$invoice_line_allowence->ChargeIndicator = "false";
$invoice_line_allowence->MultiplierFactorNumeric = "0.01";
$invoice_line_allowence->Amount = ["val" => "0.01", 'attrs' => ['currencyID="TRY"']];
$invoice_line_allowence->BaseAmount = ["val" => "1", 'attrs' => ['currencyID="TRY"']];
$invoice_line->AllowanceCharge = $invoice_line_allowence;

$invoice_line_taxtotal = new \Bulut\eFaturaUBL\TaxTotal();
$invoice_line_taxtotal->TaxAmount = ["val" => "0.01", 'attrs' => ['currencyID="TRY"']];;

$invoice_line_taxtotal_sub = new \Bulut\eFaturaUBL\TaxSubtotal();
$invoice_line_taxtotal_sub->TaxableAmount = ["val" => "0.99", 'attrs' => ['currencyID="TRY"']];
$invoice_line_taxtotal_sub->TaxAmount = ["val" => "0.01", 'attrs' => ['currencyID="TRY"']];
$invoice_line_taxtotal_sub->Percent = "18";

$invoice_line_taxtotal_sub_category = new \Bulut\eFaturaUBL\TaxCategory();
$invoice_line_taxtotal_sub_category_schema = new \Bulut\eFaturaUBL\TaxScheme();
$invoice_line_taxtotal_sub_category_schema->Name = "KDV";
$invoice_line_taxtotal_sub_category_schema->TaxTypeCode = "0015";

$invoice_line_taxtotal_sub_category->TaxScheme = $invoice_line_taxtotal_sub_category_schema;
$invoice_line_taxtotal_sub->TaxCategory = $invoice_line_taxtotal_sub_category;

$invoice_line_taxtotal->TaxSubtotal = $invoice_line_taxtotal_sub;
$invoice_line->TaxTotal = $invoice_line_taxtotal;


$invoice_line_item = new \Bulut\eFaturaUBL\Item();
$invoice_line_item->Name = "Test Ürün";
$invoice_line->Item = $invoice_line_item;

$invoice_line_price = new \Bulut\eFaturaUBL\Price();
$invoice_line_price->PriceAmount = ["val" => "1", 'attrs' => ['currencyID="TRY"']];
$invoice_line->Price = $invoice_line_price;

$invoice->InvoiceLine = [$invoice_line];

$xml = new \Bulut\eFaturaUBL\XMLHelper($invoice);
```
Örnek bir E-Fatura oluşturmuş olduk bu oluşturduğumuz faturayı Foriba servislerine ileterek faturalaştırmış olacağız. Dikkat etmemiz gereken nokta Fatura UUID ve XML olarak çıktı verir UUID ile faturayı takip edebilirsiniz oluşan XML'i de Foriba sistemine iletebilirsiniz. Alan detayları için GIB ve Foriba dökümanlarına bakınız.

## E-Fatura Gönderme
```php
$destination = 'temp/'.$uuid.'.zip';
$zip = new ZipArchive();
if($zip->open($destination,ZIPARCHIVE::CREATE) !== true) {
    return false;
}

$zip->addFromString($uuid.'.xml', $xml);
$zip->close();


$sendUblRequest = new \Bulut\InvoiceService\SendUBL();
$sendUblRequest->setVKNTCKN("GONDERICI_VKN_TCKN");
$sendUblRequest->setDocType("INVOICE"); // veya APP_RESP
$sendUblRequest->setReceiverIdentifier("ALICI_PK");
$sendUblRequest->setSenderIdentifier("GONDERICI_GB");
$sendUblRequest->setDocData(base64_encode(file_get_contents($destination)));
unlink($destination);

$result = $service->SendUBLRequest($sendUblRequest);
```
Yukarıda oluşturmuş olduğumuz XML ( UBL )'i son senaryo olarak faturalaştırmak için Foriba servislerine göndermek için kullandığımız fonksiyon. Burada dikkat edilmesi gereken nokta. Zip dosyası oluşturup bu oluşturduğumuz ZIP dosyası ve fatura UUID aynı olmasıdır ve ZIP dosyasını BASE64 yapıp Foribaya gönderiyoruz ve cevabını alıyoruz.

Genel olarak dikkat etmemiz gerekenler Foriba ve GIB dökümanlarını inceleyerek oradaki isimler ve sınıflarımız aynı isimdedir. UBL oluşturup cevabını alabilirsiniz.  

## E-Arşiv Fatura
E-Arşiv fatura ile E-Fatura arasında ki fark, eFatura mükellefi olmayan kullanıcılara elektronik veya kağıt yoluyla çıktı verilmesi için geliştirilmiş bir çözümdür.

Kullamak için servis sınıfı başlatmamız gerekiyor;
```php
use \Bulut\FITApi\FITArchiveService;
$service = new \Bulut\FITApi\FITArchiveService(['username'=>'EARSIV_WS_Kullanici', 'password'=>'EARSIV_WS_Sifre'], true);
```

Nesneyi oluşturunca son parametresi true yapıldığında test ortamına geçer, silerseniz canlı ortamda çalışır.

## E-Arşiv Fatura Oluşturma
```php
$docRefences = [];

$uuid = \Bulut\eFaturaUBL\XMLHelper::CreateGUID();

$invoice = new \Bulut\eFaturaUBL\Invoice();
$invoice->UBLVersionID = "2.1"; //uluslararası fatura standardı 2.1
$invoice->CustomizationID = "TR1.2"; //fakat GİB UBLTR olarak isimlendirdiği Türkiye'ye özgü 1.2 efatura formatını kullanıyor.
$invoice->ProfileID = "EARSIVFATURA"; //ticari ve temel olarak iki çeşittir. ticari faturalarda sistem yanıtı(application response) döner.
$invoice->ID = "FA02017000000021"; //Eğer fatura ID FIT tarafından oluşacak ise, ID alanı boş, CUST_INV_ID alanı dolu gelmelidir. Eğer kullanıcı firma tarafından oluşacak ise, ID alanı dolu CUST_INV_ID alanı boş olarak gönderilmeli.
$invoice->CopyIndicator = "false"; //kopyası mı, asıl süret mi olduğu belirlenir
$invoice->UUID = $uuid; //fatura UUID
$invoice->IssueDate = "Y-m-d"; //fatura tarihi
$invoice->IssueTime = date('H:i:s');
$invoice->InvoiceTypeCode = "SATIS"; //gönderilecek fatura çeşidi, satış, iade vs.
$invoice->DocumentCurrencyCode = "TRY"; //efatura para birimi
$invoice->LineCountNumeric = 1;  //fatura kalemlerinin sayısı
#$invoice->Note = ["Test not"]; //isteğe bağlı not alanı

//Fatura ID otomatik oluşacak ise bu alanı göndermelisiniz.
$invoice_Document_Refence = new \Bulut\eFaturaUBL\DocumentReference();
$invoice_Document_Refence->ID = \Bulut\eFaturaUBL\XMLHelper::CreateGUID();
$invoice_Document_Refence->IssueDate = "Y-m-d";
$invoice_Document_Refence->DocumentTypeCode = "CUST_INV_ID";
$docRefences[] = $invoice_Document_Refence;


//OUTPUT_TYPE
$invoice_Document_Refence1 = new \Bulut\eFaturaUBL\DocumentReference();
$invoice_Document_Refence1->ID = "0100";
$invoice_Document_Refence1->IssueDate = date('Y-m-d');
$invoice_Document_Refence1->DocumentTypeCode = "OUTPUT_TYPE";
$docRefences[] = $invoice_Document_Refence1;


//EREPSENDT
$invoice_Document_Refence2 = new \Bulut\eFaturaUBL\DocumentReference();
$invoice_Document_Refence2->ID = "KAGIT";
$invoice_Document_Refence2->IssueDate = date('Y-m-d');
$invoice_Document_Refence2->DocumentTypeCode = "EREPSENDT";
$docRefences[] = $invoice_Document_Refence2;


$invoice->AdditionalDocumentReference = $docRefences;

$invoice_signature = new \Bulut\eFaturaUBL\Signature();
$invoice_signature->ID = ['val' => "ALICI_VKN_TCKN", 'attrs' => ['schemeID = "VKN_TCKN"']];

$invoice_signature_party = new \Bulut\eFaturaUBL\SignatoryParty();

$invoice__signature_party_ident = new \Bulut\eFaturaUBL\PartyIdentification();
$invoice__signature_party_ident->ID = ['val' => "ALICI_VKN_TCKN", 'attrs' => ['schemeID = "VKN"']];
$invoice_signature_party->PartyIdentification = $invoice__signature_party_ident;

$invoice__signature_party_postal = new \Bulut\eFaturaUBL\PostalAddress();
$invoice__signature_party_postal->StreetName = "deneme cad";
$invoice__signature_party_postal->BuildingName = "01";
$invoice__signature_party_postal->CitySubdivisionName = "ilce";
$invoice__signature_party_postal->CityName = "il";
$invoice__signature_party_postal->PostalZone = "34000";

$invoice__signature_party_postal_country = new \Bulut\eFaturaUBL\Country();
$invoice__signature_party_postal_country->Name = "TÜRKİYE";
$invoice__signature_party_postal->Country = $invoice__signature_party_postal_country;

$invoice_signature_party->PostalAddress = $invoice__signature_party_postal;
$invoice_signature->SignatoryParty = $invoice_signature_party;

$invoice_signature_digital = new \Bulut\eFaturaUBL\DigitalSignatureAttachment();
$invoice_signature_digital_ext = new \Bulut\eFaturaUBL\ExternalReference();
$invoice_signature_digital_ext->URI = "#Signature";
$invoice_signature_digital->ExternalReference = $invoice_signature_digital_ext;

$invoice_signature->DigitalSignatureAttachment = $invoice_signature_digital;

$invoice->Signature = $invoice_signature;



$invoice_AccountSupplierParty = new \Bulut\eFaturaUBL\AccountingSupplierParty();
$invoice_AccountSupplierParty_Party = new \Bulut\eFaturaUBL\Party();
$invoice_AccountSupplierParty_Party->WebsiteURI = "http://unlembilisim.com";

$invoice_AccountSupplierParty_Party_Identifi = new \Bulut\eFaturaUBL\PartyIdentification();
$invoice_AccountSupplierParty_Party_Identifi->ID = ['val'=> "GONDERICI_VKN_TCKN", 'attrs' => ['schemeID="TCKN"']];
$invoice_AccountSupplierParty_Party->PartyIdentification = $invoice_AccountSupplierParty_Party_Identifi;

$invoice_AccountSupplierParty_Party_Name = new \Bulut\eFaturaUBL\PartyName();
$invoice_AccountSupplierParty_Party_Name->Name = "Orhan Gazi Başlı";
$invoice_AccountSupplierParty_Party->PartyName = $invoice_AccountSupplierParty_Party_Name;

$invoice_AccountSupplierParty_Party_Person = new \Bulut\eFaturaUBL\Person();
$invoice_AccountSupplierParty_Party_Person->FirstName = "Orhan Gazi";
$invoice_AccountSupplierParty_Party_Person->FamilyName = "Başlı";
$invoice_AccountSupplierParty_Party->Person = $invoice_AccountSupplierParty_Party_Person;


$invoice_AccountSupplierParty_Party_PostalAdd = new \Bulut\eFaturaUBL\PostalAddress();
$invoice_AccountSupplierParty_Party_PostalAdd->Room = "kapi no";
$invoice_AccountSupplierParty_Party_PostalAdd->StreetName = "cadde";
$invoice_AccountSupplierParty_Party_PostalAdd->BuildingName = "bina";
$invoice_AccountSupplierParty_Party_PostalAdd->BuildingNumber = "bina no";
$invoice_AccountSupplierParty_Party_PostalAdd->CitySubdivisionName = "mahalle";
$invoice_AccountSupplierParty_Party_PostalAdd->CityName = "şehir";
$invoice_AccountSupplierParty_Party_PostalAdd->PostalZone = "posta kodu";
$invoice_AccountSupplierParty_Party_PostalAdd->Region = "asd";

$invoice_AccountSupplierParty_Party_PostalAdd_Country = new \Bulut\eFaturaUBL\Country();
$invoice_AccountSupplierParty_Party_PostalAdd_Country->Name = "Türkiye";

$invoice_AccountSupplierParty_Party_PostalAdd->Country = $invoice_AccountSupplierParty_Party_PostalAdd_Country;
$invoice_AccountSupplierParty_Party->PostalAddress = $invoice_AccountSupplierParty_Party_PostalAdd;

$invoice_AccountSupplierParty_Party_TaxSchema = new \Bulut\eFaturaUBL\PartyTaxScheme();
$invoice_AccountSupplierParty_Party_TaxSchema_Schema = new \Bulut\eFaturaUBL\TaxScheme();
$invoice_AccountSupplierParty_Party_TaxSchema_Schema->Name = "erciyes";
$invoice_AccountSupplierParty_Party_TaxSchema->TaxScheme = $invoice_AccountSupplierParty_Party_TaxSchema_Schema;
$invoice_AccountSupplierParty_Party->PartyTaxScheme = $invoice_AccountSupplierParty_Party_TaxSchema;

$invoice_AccountSupplierParty_Party_Contact = new \Bulut\eFaturaUBL\Contact();
$invoice_AccountSupplierParty_Party_Contact->Telephone = "telef";
$invoice_AccountSupplierParty_Party_Contact->Telefax = "Telefax";
$invoice_AccountSupplierParty_Party_Contact->ElectronicMail = "ElectronicMail";
$invoice_AccountSupplierParty_Party->Contact = $invoice_AccountSupplierParty_Party_Contact;

$invoice_AccountSupplierParty->Party = $invoice_AccountSupplierParty_Party;

$invoice->AccountingSupplierParty = $invoice_AccountSupplierParty;


//Customer

$invoice_AccountCustomerParty = new \Bulut\eFaturaUBL\AccountingCustomerParty();
$invoice_AccountCustomerParty_Party = new \Bulut\eFaturaUBL\Party();
$invoice_AccountCustomerParty_Party->WebsiteURI = "http://unlembilisim.com";

$invoice_AccountCustomerParty_Party_Identifi = new \Bulut\eFaturaUBL\PartyIdentification();
$invoice_AccountCustomerParty_Party_Identifi->ID = ['val'=> $aliciVkn, 'attrs' => ['schemeID="TCKN"']];
$invoice_AccountCustomerParty_Party->PartyIdentification = $invoice_AccountCustomerParty_Party_Identifi;

$invoice_AccountCustomerParty_Party_Name = new \Bulut\eFaturaUBL\PartyName();
$invoice_AccountCustomerParty_Party_Name->Name = "GIB";
$invoice_AccountCustomerParty_Party->PartyName = $invoice_AccountCustomerParty_Party_Name;

$invoice_AccountCustomerParty_Party_Person = new \Bulut\eFaturaUBL\Person();
$invoice_AccountCustomerParty_Party_Person->FirstName = "Test";
$invoice_AccountCustomerParty_Party_Person->FamilyName = "Test";
$invoice_AccountCustomerParty_Party->Person = $invoice_AccountCustomerParty_Party_Person;



$invoice_AccountCustomerParty_Party_PostalAdd = new \Bulut\eFaturaUBL\PostalAddress();
$invoice_AccountCustomerParty_Party_PostalAdd->Room = "kapi no";
$invoice_AccountCustomerParty_Party_PostalAdd->StreetName = "cadde";
$invoice_AccountCustomerParty_Party_PostalAdd->BuildingName = "bina";
$invoice_AccountCustomerParty_Party_PostalAdd->BuildingNumber = "bina no";
$invoice_AccountCustomerParty_Party_PostalAdd->CitySubdivisionName = "mahalle";
$invoice_AccountCustomerParty_Party_PostalAdd->CityName = "şehir";
$invoice_AccountCustomerParty_Party_PostalAdd->PostalZone = "posta kodu";
$invoice_AccountCustomerParty_Party_PostalAdd->Region = "asd";

$invoice_AccountCustomerParty_Party_PostalAdd_Country = new \Bulut\eFaturaUBL\Country();
$invoice_AccountCustomerParty_Party_PostalAdd_Country->Name = "Türkiye";

$invoice_AccountCustomerParty_Party_PostalAdd->Country = $invoice_AccountCustomerParty_Party_PostalAdd_Country;
$invoice_AccountCustomerParty_Party->PostalAddress = $invoice_AccountCustomerParty_Party_PostalAdd;

$invoice_AccountCustomerParty_Party_TaxSchema = new \Bulut\eFaturaUBL\PartyTaxScheme();
$invoice_AccountCustomerParty_Party_TaxSchema_Schema = new \Bulut\eFaturaUBL\TaxScheme();
$invoice_AccountCustomerParty_Party_TaxSchema_Schema->Name = "erciyes";
$invoice_AccountCustomerParty_Party_TaxSchema->TaxScheme = $invoice_AccountCustomerParty_Party_TaxSchema_Schema;
$invoice_AccountCustomerParty_Party->PartyTaxScheme = $invoice_AccountCustomerParty_Party_TaxSchema;

$invoice_AccountCustomerParty_Party_Contact = new \Bulut\eFaturaUBL\Contact();
$invoice_AccountCustomerParty_Party_Contact->Telephone = "telef";
$invoice_AccountCustomerParty_Party_Contact->Telefax = "Telefax";
$invoice_AccountCustomerParty_Party_Contact->ElectronicMail = "ElectronicMail";
$invoice_AccountCustomerParty_Party->Contact = $invoice_AccountCustomerParty_Party_Contact;

$invoice_AccountCustomerParty->Party = $invoice_AccountCustomerParty_Party;

$invoice->AccountingCustomerParty= $invoice_AccountCustomerParty;

$invoice_TaxTotal = new \Bulut\eFaturaUBL\TaxTotal();
$invoice_TaxTotal->TaxAmount = ["val" => "0.01", 'attrs' => ['currencyID="TRY"']];

$invoice_TaxTotal_SubTotal = new \Bulut\eFaturaUBL\TaxSubtotal();
$invoice_TaxTotal_SubTotal->TaxableAmount = ["val" => "0.99", 'attrs' => ['currencyID="TRY"']];
$invoice_TaxTotal_SubTotal->TaxAmount = ["val" => "0.01", 'attrs' => ['currencyID="TRY"']];

$invoice_TaxTotal_SubTotal_Category = new \Bulut\eFaturaUBL\TaxCategory();
$invoice_TaxTotal_SubTotal_Category_Schema = new \Bulut\eFaturaUBL\TaxScheme();
$invoice_TaxTotal_SubTotal_Category_Schema->Name = "KDV";
$invoice_TaxTotal_SubTotal_Category_Schema->TaxTypeCode = "0015";

$invoice_TaxTotal_SubTotal_Category->TaxScheme = $invoice_TaxTotal_SubTotal_Category_Schema;
$invoice_TaxTotal_SubTotal->TaxCategory = $invoice_TaxTotal_SubTotal_Category;
$invoice_TaxTotal->TaxSubtotal = $invoice_TaxTotal_SubTotal;

$invoice->TaxTotal = $invoice_TaxTotal;

$invoice_LegalMonetary = new \Bulut\eFaturaUBL\LegalMonetaryTotal();
$invoice_LegalMonetary->LineExtensionAmount = ["val" => "1", 'attrs' => ['currencyID="TRY"']];
$invoice_LegalMonetary->TaxExclusiveAmount = ["val" => "0.99", 'attrs' => ['currencyID="TRY"']];
$invoice_LegalMonetary->TaxInclusiveAmount = ["val" => "1", 'attrs' => ['currencyID="TRY"']];
$invoice_LegalMonetary->PayableAmount = ["val" => "1", 'attrs' => ['currencyID="TRY"']];

$invoice->LegalMonetaryTotal = $invoice_LegalMonetary;

$invoice_line = new \Bulut\eFaturaUBL\InvoiceLine();
$invoice_line->ID = "1";
$invoice_line->InvoicedQuantity = ["val" => "1", 'attrs' => ['unitCode="CMT"']];
$invoice_line->LineExtensionAmount = ["val" => "0.99", 'attrs' => ['currencyID="TRY"']];


$invoice_line_item = new \Bulut\eFaturaUBL\Item();
$invoice_line_item->Name = "Test Ürün";
$invoice_line->Item = $invoice_line_item;

$invoice_line_price = new \Bulut\eFaturaUBL\Price();
$invoice_line_price->PriceAmount = ["val" => "1", 'attrs' => ['currencyID="TRY"']];
$invoice_line->Price = $invoice_line_price;

$invoice->InvoiceLine = [$invoice_line];

$xml = new \Bulut\eFaturaUBL\XMLHelper($invoice);
```

Örnek E-Arşiv faturası oluşturmak için kullanılan parametre ve değişkenlerin açıklamaları için Foriba E-Arşiv dökümanına veya GIB dökümanına göz atabilirsiniz.

## E-Arşiv Fatura Gönderme
```php
$destination = 'temp/'.$rand.'.zip';
$rand = rand(1000,9999);
$zip = new ZipArchive();
if($zip->open($destination,ZIPARCHIVE::CREATE) !== true) {
    return false;
}

$zip->addFromString($uuid.'.xml', $xml);
$zip->close();

$sendUblRequest = new \Bulut\ArchiveService\SendInvoice();
$sendUblRequest->setSenderID("GONDERICI_VKN_TCKN");
$sendUblRequest->setHash(md5_file($destination));
$sendUblRequest->setFileName($rand.'.zip');
$sendUblRequest->setDocType("XML");
$sendUblRequest->setBinaryData(base64_encode(file_get_contents($destination)));

$custParam = new \Bulut\ArchiveService\CustomizationParam();
$custParam->paramName = "BRANCH";
$custParam->paramValue = "default";
$sendUblRequest->setCustomizationParams([$custParam]);

$respOut = new \Bulut\ArchiveService\responsiveOutput();
$respOut->outputType = "PDF";
$sendUblRequest->setResponsiveOutput($respOut);

$result = $service->SendInvoiceRequest($sendUblRequest);
```
Oluşturmuş olduğumuz E-Arşiv XML'ini Foriba sistemlerine göndermek için kullandığımız fonksiyon.

## E-Arşiv Zarf Gönderme
```php
$destination = 'temp/'.$rand.'.zip';
$rand = rand(1000,9999);
$zip = new ZipArchive();
if($zip->open($destination,ZIPARCHIVE::CREATE) !== true) {
    return false;
}

$zip->addFromString($uuid.'.xml', $xml);
$zip->close();


$sendUblRequest = new \Bulut\ArchiveService\SendEnvelope();
$sendUblRequest->setSenderID("GONDERICI_VKN_TCKN");
$sendUblRequest->setHash(md5_file($destination));
$sendUblRequest->setFileName($rand.'.zip');
$sendUblRequest->setDocType("XML");
$sendUblRequest->setBinaryData(base64_encode(file_get_contents($destination)));

$custParam = new \Bulut\ArchiveService\CustomizationParam();
$custParam->paramName = "BRANCH";
$custParam->paramValue = "default";
$sendUblRequest->setCustomizationParams([$custParam]);

$result = $service->SendEnvelopeRequest($sendUblRequest);
```
Detaylar için Foriba E-Arşiv dökümanını inceleyebilirsiniz.

## E-Arşiv Fatura İptal Etme
```php
$getDocument = new \Bulut\ArchiveService\InvoiceCancelInfoTypeList();

$getDocument->setInvoiceId("INVOICE_NUMBER");
$getDocument->setVkn("GONDERICI_VKN");
$getDocument->setBranch("GONDEREN_SUBE");
$getDocument->setTotalAmount("FATURA_TUTARI");
$getDocument->setCancelDate("Y-m-d");
$getDocument->setCustInvID("CUST_INV_ID");

$cancelService = new \Bulut\ArchiveService\CancelInvoice();
$cancelService->setInvoiceCancelInfoTypeList([$getDocument]);
$resutl = $service->CancelInvoiceRequest($cancelService);
```
Gerekli alanları doldurarak faturayı iptal edebiliriz. Değişkenleri Foriba dökümanından kontrol edebilirsiniz.

## E-Arşiv Fatura Tekrar Tetikleme
```php
$getDocument = new \Bulut\ArchiveService\RetriggerOperation();
$getDocument->setVKN("GONDERICI_VKN_TCKN");
$getDocument->setBranch("GONDERICI_SUBE");
$getDocument->setInvoiceID("FATURA_NUMARASI");
$getDocument->setInvoiceUUID("FATURA_UUID");

$cust = [];
$customParams = [];
foreach($customParams as $key => $val){
    $name = $val;
    if($name != ""){
        $custObj = new \Bulut\ArchiveService\CustomizationParam();
        $custObj->paramName = $name;
        $custObj->paramValue = $_POST['paramValue'][$key];
        $cust[] = $custObj;
    }
}
$getDocument->setCustomizationParams($cust);
$result = $service->GetRetriggerOperationRequest($getDocument);
```
Gönderilmiş bir faturayı tekrar iletmek için kullanılan fonksiyon CustomParameters için Foriba dökümanlarına göz atınız.

## E-Arşiv Kayıtlı Kullanıcılar Listesi
```php
$getDocument = new \Bulut\ArchiveService\GetUserList();
$getDocument->setVknTckn("GONDERICI_VKN_TCKN");
$result = $service->GetUserListRequest($getDocument);
```
Kayıtlı kullanıcılar listesini ZIP olarak dönüş yapar.

## E-Arşiv Fatura Görüntüsü İndirme
```php
$getDocument = new \Bulut\ArchiveService\GetInvoiceDocument();
$getDocument->setUUID("FATURA_UUID");
$getDocument->setVkn("GONDERICI_VKN");
$getDocument->setInvoiceNumber("FATURA_NUMARASI");
$getDocument->setCustInvId("CUST_INV_ID");
$getDocument->setOutputType("CIKTI_TURU"); //xml, UBL

$result = $service->GetInvoiceDocumentRequest($getDocument);
```
Fonksiyonu tetikleyerek göndermiş olduğunuz faturanın görselini indirebilirsiniz.

## E-Arşiv Fatura İmzalama
```php
$getDocument = new \Bulut\ArchiveService\GetSignedInvoice();
$getDocument->setUUID("FATURA_UUID");
$getDocument->setVkn("GONDERICI_VKN");
$getDocument->setInvoiceNumber("FATURA_NUMARASI");
$getDocument->setCustInvId("CUST_INV_ID");

$resutl = $service->GetSignedInvoiceRequest($getDocument);
```
Fonksiyonu tetikleyerek imzalama işlemi gerçekleştirebilirsiniz.

SDK'da kullanılan tüm fonksiyon ve değişken isimleri Foriba ve GIB sistemine uygundur. Foriba ve GIB dökümanlarını inceleyerek kolaylıkla entegrasyon sağlayabilirsiniz.

Eğer problemleriniz olursa, Foriba veya benimle irtibata geçebilirsiniz.
