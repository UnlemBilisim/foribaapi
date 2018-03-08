<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 00:08
 */

if(!isset($_GET['uuid']) && !empty($_GET['uuid']))
{
    echo '<p>Lütfen fatura seçiniz.</p>';
}


$sonuclar = ZarfSorgula($_GET['uuid'], getSession("gb"));


if(!is_array($sonuclar)){
    echo $sonuclar;
}else{
    ?>
    <h3>Zarf Sonucu</h3>
    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>UUID</th>
                <th>IssueDate</th>
                <th>DocumentTypeCode</th>
                <th>DocumentType</th>
                <th>ResponseCode</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($sonuclar as $sonuc){
                ?>
                <tr>
                    <td><?=$sonuc->getUUID()?></td>
                    <td><?=$sonuc->getIssueDate()?></td>
                    <td><?=$sonuc->getDocumentTypeCode()?></td>
                    <td><?=$sonuc->getDocumentType()?></td>
                    <td><?=$sonuc->getResponseCode()?></td>
                    <td><?=$sonuc->getDescription()?></td>
                </tr>
                <?php
            }

            ?>
            </tbody>
        </table>
    </div>
    <?php
}
