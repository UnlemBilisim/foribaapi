<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 24.12.2017
 * Time: 19:13
 */


$ublxml = FaturaGonder("1234567890", date('d-m-Y'));


$faturalar = SendUBlInv($ublxml[1], $ublxml[0], "INVOICE", getSession("pk"), getSession("gb"));


if(is_array($faturalar)){
    ?>
    <h3>Fatura Gönderildi.</h3>
    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>UUID</th>
                <th>EnvUUID</th>
                <th>ID</th>
                <th>CustInvID</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($faturalar as $fatura){
                ?>
                <tr>
                    <td><?=$fatura->getUUID()?></td>
                    <td><?=$fatura->getEnvUUID()?></td>
                    <td><?=$fatura->getID()?></td>
                    <td><?=$fatura->getCustInvID()?></td>
                </tr>
                <?php
            }

            ?>
            </tbody>
        </table>
    </div>
    <?php
}else{
    echo $faturalar;
}
?>