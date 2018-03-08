<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 21:12
 */

$veri = EArsivFaturaGonder("33333333333", date('d-m-Y'));


$veri = SendUBlInvArchive($veri[0],$veri[1]);

if(!is_object($veri)){
    echo $veri;
}else{


    ?>
    <h3>Sonuçlar</h3>
    <div class="row">
        <div class="col-3">
            Detail
        </div>
        <div class="col-9">
            <?=$veri->getDetail()?>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            Result
        </div>
        <div class="col-9">
            <?=$veri->getResult()->getResult()?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Başarılılar</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>UUID</th>
                        <th>vkn</th>
                        <th>InvoiceNumber</th>
                        <th>SuccessCode</th>
                        <th>SuccessDesc</th>
                        <th>Filename</th>
                        <th>sha256Hash</th>
                        <th>binaryData</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($veri->getPreCheckSuccessResults() as $successResult){


                            $file = $successResult["UUID"].'.pdf';
                            touch('temp/'.$file);

                            file_put_contents('temp/'.$file, base64_decode($successResult["binaryData"]));


                            ?>
                            <tr>
                                <td><?=$successResult["UUID"]?></td>
                                <td><?=$successResult["Vkn"]?></td>
                                <td><?=$successResult["InvoiceNumber"]?></td>
                                <td><?=$successResult["SuccessCode"]?></td>
                                <td><?=$successResult["SuccessDesc"]?></td>
                                <td><?=$successResult["Filename"]?></td>
                                <td><?=$successResult["sha256Hash"]?></td>
                                <td><a href="dosya_indir.php?p=<?=$file?>" class="btn btn-outline-danger">İndir</a></td>
                            </tr>

                            <?php
                        }

                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h4>Başarısızlar</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>UUID</th>
                        <th>vkn</th>
                        <th>InvoiceNumber</th>
                        <th>ErrorCode</th>
                        <th>ErrorDesc</th>
                        <th>Filename</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($veri->getPreCheckErrorResults() as $errorResult){

                        if(!empty($errorResult)){
                            ?>

                            <tr>
                                <td><?=$successResult["UUID"]?></td>
                                <td><?=$successResult["Vkn"]?></td>
                                <td><?=$successResult["InvoiceNumber"]?></td>
                                <td><?=$successResult["ErrorCode"]?></td>
                                <td><?=$successResult["ErrorDesc"]?></td>
                                <td><?=$successResult["Filename"]?></td>
                            </tr>

                            <?php
                        }

                    }

                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php



}