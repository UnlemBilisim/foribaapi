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

$fatura = FaturaUBL($_GET['uuid'], 'INVOICE', 'OUTBOUND', 'XML', getSession("gb"));


if(!is_object($fatura)){
    echo $fatura;

}else{


    $path = 'temp/'.$_GET['uuid'].'.'.$fatura->getDocType();
    touch($path);

    file_put_contents($path, base64_decode($fatura->getDocData()));

    echo '<a href="dosya_indir.php?p='.$_GET['uuid'].'.'.$fatura->getDocType().'" class="btn btn-outline-success">Fatura İndir</a>';

}

?>