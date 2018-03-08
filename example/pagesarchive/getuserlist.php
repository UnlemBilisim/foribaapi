<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 17:08
 */


    $getDocument = new \Bulut\ArchiveService\GetUserList();
    $getDocument->setVknTckn(getSession("vknTckn"));

    $archive = new \Bulut\FITApi\FITArchiveService(['username'=> getSession("ws_kuladi"),'password'=> getSession("ws_sifre")], true);
    $veri = $archive->GetUserListRequest($getDocument);

    if(!is_object($veri)){
        echo $veri;
    }else{


        file_put_contents('temp/users.zip',base64_decode($veri->getBinaryData()));

        ?>
        <h3>Kullanıcı Listesi Dosyaya Yazıldı.</h3>
        <?php

}
?>