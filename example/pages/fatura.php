<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 22:41
 */


if(!isset($_GET['uuid']) && !empty($_GET['uuid']))
{
    echo '<p>Lütfen fatura seçiniz.</p>';
}

if(!isset($_GET['type']) && !empty($_GET['type']))
{
    echo '<p>Lütfen tür seçiniz.</p>';
}


$data = FaturaIndir($_GET['uuid'], strtoupper($_GET['type']), 'INBOUND');

if(!is_object($data)){
    echo $data;

}else{

    $file = $_GET['uuid'].'.'.$_GET['type'];
    touch('temp/'.$file);

    file_put_contents('temp/'.$file, base64_decode($data->getDocData()));

    echo '<a href="dosya_indir.php?p='.$_GET['uuid'].'.'.$data->getDocType().'" class="btn btn-outline-success">Fatura İndir</a>';

}


?>