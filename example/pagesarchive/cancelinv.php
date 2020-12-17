<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 17:08
 */

if(isset($_GET['v'])){

    $getDocument = new \Bulut\ArchiveService\InvoiceCancelInfoTypeList();

    $getDocument->setInvoiceId($_POST['invoiceNumber']);
    $getDocument->setVkn($_POST['vkn']);
    $getDocument->setBranch($_POST['branch']);
    $getDocument->setTotalAmount($_POST['totalAmount']);
    $getDocument->setCancelDate(date('Y-m-d'));
    $getDocument->setCustInvID($_POST['custInvID']);

    $cancelService = new \Bulut\ArchiveService\CancelDocument();
    $cancelService->setInvoiceCancelInfoTypeList([$getDocument]);

    $archive = new \Bulut\FITApi\FITArchiveService(['username'=> getSession("ws_kuladi"),'password'=> getSession("ws_sifre")], true);
    $veri = $archive->CancelInvoiceRequest($cancelService);


    if(!is_object($veri)){
        echo $veri;
    }else{



        ?>
        <h3>Sonuçlar</h3>
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Result</th>
                    <th>Message</th>
                    <th>Code</th>

                </tr>
                </thead>
                <tbody>

                <tr>
                    <td><?=$veri->getResult()->getResult()?></td>
                    <td><?=$veri->getInvoiceCancellation()->getMessage()?></td>
                    <td><?=$veri->getInvoiceCancellation()->getCode()?></td>
                </tr>

                </tbody>
            </table>
        </div>
        <?php
    }

}else{
    ?>
    <h3>Fatura İptal Et</h3>
    <form method="post" action="?p=cancelinv&v=single">
        <div class="form-group">
            <label>Fatura Numarası</label>
            <input class="form-control"  placeholder="Fatura Numarası" name="invoiceNumber">
        </div>

        <div class="form-group">
            <label>VKN</label>
            <input class="form-control"  placeholder="VKN" name="vkn">
        </div>

        <div class="form-group">
            <label>Şube</label>
            <input class="form-control"  placeholder="Şube" name="branch">
        </div>
        <div class="form-group">
            <label>Toplam Tutar ( Vergiler Hariç )</label>
            <input class="form-control" placeholder="Toplam Tutar ( Vergiler Hariç )" name="totalAmount">
        </div>
        <div class="form-group">
            <label>Fatura Özel Numarası (CustInvID)</label>
            <input class="form-control" placeholder="Fatura Özel Numarası (CustInvID)" name="custInvID">
        </div>


        <div class="form-group">
            <input type="submit" class="btn btn-outline-warning btn-block" value="Sorgula">
        </div>
    </form>
    <?php
}
?>

