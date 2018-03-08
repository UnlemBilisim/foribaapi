<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 17:59
 */

$uygyanit = Gelenler("APP_RESP", "OUTBOUND");

if(!is_array($uygyanit)){
    echo $uygyanit;
}else{
    ?>
    <h3>Giden Uygulama Yanıtları</h3>
    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>UUID</th>
                <th>EnvUUID</th>
                <th>Identifier</th>
                <th>VKN_TCKN</th>
                <th>InsertDateTime</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($uygyanit as $uyg){
                ?>
                <tr>
                    <td><?=$uyg->getUUID()?></td>
                    <td><?=$uyg->getEnvUUID()?></td>
                    <td><?=$uyg->getIdentifier()?></td>
                    <td><?=$uyg->getVKNTCKN()?></td>
                    <td><?=$uyg->getInsertDateTime()?></td>
                </tr>
                <?php
            }

            ?>
            </tbody>
        </table>
    </div>
    <?php
}
