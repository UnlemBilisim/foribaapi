<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 11:39
 */


if(!isset($_GET['uuid']) && !empty($_GET['uuid']))
{
    echo '<p>Lütfen fatura seçiniz.</p>';
}

$xml = UygulamaYanitiOlustur($_GET['uuid'], date('Y-m-d'));


$veri = SendUBLFunc($_GET['uuid'], $xml, getSession("vknTckn"), "APP_RESP", getSession("pk"),getSession("gb"));
var_dump($veri);