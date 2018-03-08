<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 17:08
 */

if(isset($_GET['v'])){


    $getDocument = new \Bulut\ArchiveService\RetriggerOperation();
    $getDocument->setVKN($_POST['vkn']);
    $getDocument->setBranch($_POST['branch']);
    $getDocument->setInvoiceID($_POST['invoiceID']);
    $getDocument->setInvoiceUUID($_POST['uuid']);

    $cust = [];
    foreach($_POST['paramName'] as $key => $val){
        $name = $val;
        if($name != ""){
            $custObj = new \Bulut\ArchiveService\CustomizationParam();
            $custObj->paramName = $name;
            $custObj->paramValue = $_POST['paramValue'][$key];
            $cust[] = $custObj;
        }
    }
    $getDocument->setCustomizationParams($cust);


    $archive = new \Bulut\FITApi\FITArchiveService(['username'=> getSession("ws_kuladi"),'password'=> getSession("ws_sifre")], true);
    $veri = $archive->GetRetriggerOperationRequest($getDocument);

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
                    <th>responseCode</th>
                    <th>responsedetail</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?=$veri->getResult()->getResult()?></td>
                        <td><?=$veri->getResponseCode()?></td>
                        <td><?=$veri->getResponsedetail()?></td>

                    </tr>

                </tbody>
            </table>
        </div>
        <?php
    }

}else{
    ?>
    <h3>Fatura Tekrar Tetikleme</h3>
    <form method="post" action="?p=retrigger&v=single">
        <div class="form-group">
            <label>UUID</label>
            <input class="form-control"  placeholder="UUID" name="uuid">
        </div>
        <div class="form-group">
            <label>Şube</label>
            <input class="form-control"  placeholder="Şube" name="branch">
        </div>
        <div class="form-group">
            <label>VKN</label>
            <input class="form-control"  placeholder="VKN" name="vkn">
        </div>
        <div class="form-group">
            <label>Fatura Numarası</label>
            <input class="form-control"  placeholder="Fatura Numarası" name="invoiceID">
        </div>

        <div class="form-row copy">
            <div class="form-group col-6">
                <label>Parametre</label>
                <input type="text" class="form-control" placeholder="Customization Param" name="paramName[]" />
            </div>
            <div class="form-group col-6">
                <label>Değer</label>
                <input type="text" class="form-control" placeholder="Customization Value" name="paramValue[]" />
            </div>
        </div>

        <div class="afterbox"></div>

        <div class="form-group">
            <a href="javascript:;" class="btn btn-link text-muted add-other float-right">+ Daha Fazla Ekle</a>
        </div>


        <div class="form-group">
            <input type="submit" class="btn btn-outline-warning btn-block" value="Sorgula">
        </div>
    </form>
    <?php
}
?>

