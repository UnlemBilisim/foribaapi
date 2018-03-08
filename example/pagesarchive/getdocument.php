<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 17:08
 */

if(isset($_GET['v'])){

    ?>

    <?php
    $getDocument = new \Bulut\ArchiveService\GetInvoiceDocument();
    $getDocument->setUUID($_POST['uuid']);
    $getDocument->setVkn($_POST['vkn']);
    $getDocument->setInvoiceNumber($_POST['invoiceNumber']);
    $getDocument->setCustInvId($_POST['custInvID']);
    $getDocument->setOutputType($_POST['outputType']);

    $archive = new \Bulut\FITApi\FITArchiveService(['username'=> getSession("ws_kuladi"),'password'=> getSession("ws_sifre")], true);
    $veri = $archive->GetInvoiceDocumentRequest($getDocument);


    if(!is_object($veri)){
        echo $veri;
    }else{

        $file = $veri->getUUID().'.'.$_POST['outputType'];
        touch('temp/'.$file);

        file_put_contents('temp/'.$file, base64_decode($veri->getBinaryData()));

        ?>
        <h3>Sonuçlar</h3>
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>UUID</th>
                    <th>vkn</th>
                    <th>invoiceNumber</th>
                    <th>statusCode</th>
                    <th>Detail</th>
                    <th>Hash</th>
                    <th>binaryData</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?=$veri->getUUID()?></td>
                        <td><?=$veri->getVkn()?></td>
                        <td><?=$veri->getInvoiceNumber()?></td>
                        <td><?=$veri->getStatusCode()?></td>
                        <td><?=$veri->getDetail()?></td>
                        <td><?=$veri->getHash()?></td>
                        <td><a href="dosya_indir.php?p=<?=$file?>" class="btn btn-outline-danger">İndir</a></td>
                    </tr>

                </tbody>
            </table>
        </div>
        <?php
    }

}else{
    ?>
    <h3>Fatura Görüntüsü İndir</h3>
    <form method="post" action="?p=getdocument&v=single">
        <div class="form-group">
            <label>UUID</label>
            <input class="form-control"  placeholder="UUID" name="uuid">
        </div>
        <div class="form-group">
            <label>VKN</label>
            <input class="form-control"  placeholder="VKN" name="vkn">
        </div>
        <div class="form-group">
            <label>Fatura Numarası</label>
            <input class="form-control"  placeholder="Fatura Numarası" name="invoiceNumber">
        </div>
        <div class="form-group">
            <label>Fatura Özel Numarası (CustInvID)</label>
            <input class="form-control" placeholder="Fatura Özel Numarası (CustInvID)" name="custInvID">
        </div>
        <div class="form-group">
            <label>Tür</label>
            <select name="outputType" class="form-control">
                <option>PDF</option>
                <option>HTML</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-outline-warning btn-block" value="Sorgula">
        </div>
    </form>
    <?php
}
?>

