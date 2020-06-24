<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 00:50
 */

function MukellefSorgu($TCKN_VKN, $Role){
    $service = new \Bulut\FITApi\FITInvoiceService(['username'=> getSession('ws_kuladi'), 'password'=>getSession('ws_sifre')], true);

    try{
        $userListRequest = new \Bulut\InvoiceService\GetUserList();
        $userListRequest->setIdentifier(getSession('gb'));
        $userListRequest->setVKNTCKN(getSession("vknTckn"));
        $userListRequest->setRole($Role);
        $userListRequest->setFilterVKNTCKN($TCKN_VKN);
        return $service->GetUserListRequest($userListRequest);
    }
    catch (Exception $exp){
        return $exp->getMessage();
    }

}

function Gelenler($Doctype, $type, $Identifier = ""){

    if($Identifier == "")
        $Identifier = getSession('pk');

    $service = new \Bulut\FITApi\FITInvoiceService(['username'=> getSession('ws_kuladi'), 'password'=>getSession('ws_sifre')], true);

    try{
        $getUblRequest = new \Bulut\InvoiceService\GetUblList();
        $getUblRequest->setIdentifier($Identifier);
        $getUblRequest->setVKNTCKN(getSession("vknTckn"));
        $getUblRequest->setDocType($Doctype);
        $getUblRequest->setType($type);
        $getUblRequest->setFromDate(getSession("startDate"));
        $getUblRequest->setToDate(getSession("endDate"));
        $getUblRequest->setFromDateSpecified(true);
        $getUblRequest->setToDateSpecified(true);
        return $service->GetUblListRequest($getUblRequest);
    }
    catch (Exception $exp){
        return $exp->getMessage();
    }
}

function FaturaIndir($UUID, $DocType, $Type, $Identifier = ""){

    if($Identifier == "")
        $Identifier = getSession('pk');

    $service = new \Bulut\FITApi\FITInvoiceService(['username'=> getSession('ws_kuladi'), 'password'=>getSession('ws_sifre')], true);

    try{
        $getInvoiceRequest = new \Bulut\InvoiceService\GetInvoiceView();
        $getInvoiceRequest->setUUID($UUID);
        $getInvoiceRequest->setIdentifier($Identifier);
        $getInvoiceRequest->setVKNTCKN(getSession("vknTckn"));
        $getInvoiceRequest->setType($Type);
        $getInvoiceRequest->setDocType($DocType);


        return $service->GetInvoiceViewRequest($getInvoiceRequest);
    }
    catch (Exception $exp){
        return $exp->getMessage();
    }
}

function FaturaUBL($UUID, $DocType, $Type, $Param, $Identifier = ""){

    if($Identifier == "")
        $Identifier = getSession('pk');

    $service = new \Bulut\FITApi\FITInvoiceService(['username'=> getSession('ws_kuladi'), 'password'=>getSession('ws_sifre')], true);

    try{
        $getUblRequest = new \Bulut\InvoiceService\GetUbl();
        $getUblRequest->setIdentifier($Identifier);
        $getUblRequest->setVKNTCKN(getSession("vknTckn"));
        $getUblRequest->setDocType($DocType);
        $getUblRequest->setType($Type);
        $getUblRequest->setUUID($UUID);
        $getUblRequest->setParameters($Param);


        return $service->GetUblRequest($getUblRequest);
    }
    catch (Exception $exp){
        return $exp->getMessage();
    }
}

function ZarfSorgula($UUID, $Identifier = ""){

    if($Identifier == "")
        $Identifier = getSession('pk');

    $service = new \Bulut\FITApi\FITInvoiceService(['username'=> getSession('ws_kuladi'), 'password'=>getSession('ws_sifre')], true);

    try{
        $getEnvelopeRequest = new \Bulut\InvoiceService\GetEnvelopeStatus();
        $getEnvelopeRequest->setIdentifier($Identifier);
        $getEnvelopeRequest->setVKNTCKN(getSession("vknTckn"));
        $getEnvelopeRequest->setUUID($UUID);
        $getEnvelopeRequest->setParameters("DOC_DATA");


        return $service->GetEnvelopeStatusRequest($getEnvelopeRequest);
    }
    catch (Exception $exp){
        return $exp->getMessage();
    }
}

function UygulamaYanitiOlustur($UUID, $tarih){

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
    $senderParty_Identification->ID = ['val'=> getSession("vknTckn"), 'attrs' => ['schemaID="TCKN"']];
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
    $receiverParty_Identification->ID = ['val'=> getSession("vknTckn"), 'attrs' => ['schemaID="TCKN"']];
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
    $documentResponse_DocumentReference->IssueDate = date('Y-m-d', strtotime($tarih));
    $documentResponse->DocumentReference = $documentResponse_DocumentReference;

    $appResp->DocumentResponse = $documentResponse;

    $xmlHelper = new \Bulut\eFaturaUBL\XMLHelper($appResp);
    $xml = $xmlHelper->getApplicationResponseXML();
    return $xml;

}

function FaturaGonder($aliciVkn, $tarih){

    $docRefences = [];

    $uuid = \Bulut\eFaturaUBL\XMLHelper::CreateGUID();

    $invoice = new \Bulut\eFaturaUBL\Invoice();
    $invoice->UBLVersionID = "2.1"; //uluslararası fatura standardı 2.1
    $invoice->CustomizationID = "TR1.2"; //fakat GİB UBLTR olarak isimlendirdiği Türkiye'ye özgü 1.2 efatura formatını kullanıyor.
    $invoice->ProfileID = "TICARIFATURA"; //ticari ve temel olarak iki çeşittir. ticari faturalarda sistem yanıtı(application response) döner.
    #$invoice->ID = "FIT2017000000021"; //Eğer fatura ID FIT tarafından oluşacak ise, ID alanı boş, CUST_INV_ID alanı dolu gelmelidir. Eğer kullanıcı firma tarafından oluşacak ise, ID alanı dolu CUST_INV_ID alanı boş olarak gönderilmeli.
    $invoice->CopyIndicator = "false"; //kopyası mı, asıl süret mi olduğu belirlenir
    $invoice->UUID = $uuid; //fatura UUID
    $invoice->IssueDate = date('Y-m-d', strtotime($tarih)); //fatura tarihi
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
    $invoice_AccountSupplierParty_Party_Identifi->ID = ['val'=> '48292808416', 'attrs' => ['schemeID="VKN"']];
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
    $invoice_AccountCustomerParty_Party_Identifi->ID = ['val'=> $aliciVkn, 'attrs' => ['schemeID="VKN"']];
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
   return [$xml->getInvoiceResponseXML(), $uuid];


}

function SendUBLFunc($uuid, $xml, $vkn, $DocType, $Sender, $Receiver){


    $service = new \Bulut\FITApi\FITInvoiceService(['username'=> getSession('ws_kuladi'), 'password'=>getSession('ws_sifre')], true);
    $destination = 'temp/'.$uuid.'.zip';
    try{
        $zip = new ZipArchive();
        if($zip->open($destination,ZIPARCHIVE::CREATE) !== true) {
            return false;
        }

        $zip->addFromString($uuid.'.xml', $xml);
        $zip->close();


        $sendUblRequest = new \Bulut\InvoiceService\SendUBL();
        $sendUblRequest->setVKNTCKN($vkn);
        $sendUblRequest->setReceiverIdentifier($Receiver);
        $sendUblRequest->setSenderIdentifier($Sender);
        $sendUblRequest->setDocType($DocType);
        $sendUblRequest->setDocData(base64_encode(file_get_contents($destination)));
        unlink($destination);


        return $service->SendUBLRequest($sendUblRequest);
    }
    catch (Exception $exp){
        return $exp->getMessage();
    }
}

function SendUBlInv($uuid, $xml, $DocType, $Receiver, $Sender){

    $service = new \Bulut\FITApi\FITInvoiceService(['username'=> getSession('ws_kuladi'), 'password'=>getSession('ws_sifre')], true);
    $destination = 'temp/'.$uuid.'.zip';
    try{
        $zip = new ZipArchive();
        if($zip->open($destination,ZIPARCHIVE::CREATE) !== true) {
            return false;
        }

        $zip->addFromString($uuid.'.xml', $xml);
        $zip->close();


        $sendUblRequest = new \Bulut\InvoiceService\SendUBL();
        $sendUblRequest->setVKNTCKN(getSession("vknTckn"));
        $sendUblRequest->setDocType($DocType);
        $sendUblRequest->setReceiverIdentifier($Receiver);
        $sendUblRequest->setSenderIdentifier($Sender);
        $sendUblRequest->setDocData(base64_encode(file_get_contents($destination)));
        unlink($destination);

        return $service->SendUBLRequest($sendUblRequest);
    }
    catch (Exception $exp){
        return $exp->getMessage();
    }
}



function EArsivFaturaGonder($aliciVkn, $tarih){

    $docRefences = [];

    $uuid = \Bulut\eFaturaUBL\XMLHelper::CreateGUID();


    $invoice = new \Bulut\eFaturaUBL\Invoice();
    $invoice->UBLVersionID = "2.1"; //uluslararası fatura standardı 2.1
    $invoice->CustomizationID = "TR1.2"; //fakat GİB UBLTR olarak isimlendirdiği Türkiye'ye özgü 1.2 efatura formatını kullanıyor.
    $invoice->ProfileID = "EARSIVFATURA"; //ticari ve temel olarak iki çeşittir. ticari faturalarda sistem yanıtı(application response) döner.
    $invoice->ID = "FA02017000000021"; //Eğer fatura ID FIT tarafından oluşacak ise, ID alanı boş, CUST_INV_ID alanı dolu gelmelidir. Eğer kullanıcı firma tarafından oluşacak ise, ID alanı dolu CUST_INV_ID alanı boş olarak gönderilmeli.
    $invoice->CopyIndicator = "false"; //kopyası mı, asıl süret mi olduğu belirlenir
    $invoice->UUID = $uuid; //fatura UUID
    $invoice->IssueDate = date('Y-m-d', strtotime($tarih)); //fatura tarihi
    $invoice->IssueTime = date('H:i:s');
    $invoice->InvoiceTypeCode = "SATIS"; //gönderilecek fatura çeşidi, satış, iade vs.
    $invoice->DocumentCurrencyCode = "TRY"; //efatura para birimi
    $invoice->LineCountNumeric = 1;  //fatura kalemlerinin sayısı
    #$invoice->Note = ["Test not"]; //isteğe bağlı not alanı

    //Fatura ID otomatik oluşacak ise bu alanı göndermelisiniz.
    $invoice_Document_Refence = new \Bulut\eFaturaUBL\DocumentReference();
    $invoice_Document_Refence->ID = \Bulut\eFaturaUBL\XMLHelper::CreateGUID();
    $invoice_Document_Refence->IssueDate = date('Y-m-d', strtotime($tarih));
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
    $invoice_signature->ID = ['val' => $aliciVkn, 'attrs' => ['schemeID = "VKN_TCKN"']];

    $invoice_signature_party = new \Bulut\eFaturaUBL\SignatoryParty();

    $invoice__signature_party_ident = new \Bulut\eFaturaUBL\PartyIdentification();
    $invoice__signature_party_ident->ID = ['val' => $aliciVkn, 'attrs' => ['schemeID = "VKN"']];
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
    $invoice_AccountSupplierParty_Party_Identifi->ID = ['val'=> getSession("vknTckn"), 'attrs' => ['schemeID="TCKN"']];
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
    return [$xml->getInvoiceResponseXML(), $uuid];


}

function SendUBlInvArchive($xml, $uuid){

    $rand = rand(1000,9999);
    $service = new \Bulut\FITApi\FITArchiveService(['username'=> getSession('ws_kuladi'), 'password'=>getSession('ws_sifre')], true);
    $destination = 'temp/'.$rand.'.zip';
    try{
        $zip = new ZipArchive();
        if($zip->open($destination,ZIPARCHIVE::CREATE) !== true) {
            return false;
        }

        $zip->addFromString($uuid.'.xml', $xml);
        $zip->close();


        $sendUblRequest = new \Bulut\ArchiveService\SendDocument();
        $sendUblRequest->setSenderID(getSession("vknTckn"));
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



        return $service->SendInvoiceRequest($sendUblRequest);
    }
    catch (Exception $exp){
        return $exp->getMessage();
    }
}


function SendUBlEnvArchive($xml, $uuid){

    $rand = rand(1000,9999);
    $service = new \Bulut\FITApi\FITArchiveService(['username'=> getSession('ws_kuladi'), 'password'=>getSession('ws_sifre')], true);
    $destination = 'temp/'.$rand.'.zip';
    try{
        $zip = new ZipArchive();
        if($zip->open($destination,ZIPARCHIVE::CREATE) !== true) {
            return false;
        }

        $zip->addFromString($uuid.'.xml', $xml);
        $zip->close();


        $sendUblRequest = new \Bulut\ArchiveService\SendEnvelope();
        $sendUblRequest->setSenderID(getSession("vknTckn"));
        $sendUblRequest->setHash(md5_file($destination));
        $sendUblRequest->setFileName($rand.'.zip');
        $sendUblRequest->setDocType("XML");
        $sendUblRequest->setBinaryData(base64_encode(file_get_contents($destination)));

        $custParam = new \Bulut\ArchiveService\CustomizationParam();
        $custParam->paramName = "BRANCH";
        $custParam->paramValue = "default";
        $sendUblRequest->setCustomizationParams([$custParam]);



        return $service->SendEnvelopeRequest($sendUblRequest);
    }
    catch (Exception $exp){
        return $exp->getMessage();
    }
}