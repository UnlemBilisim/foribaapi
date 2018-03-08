<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 17:59
 */

$zarflar = Gelenler("ENVELOPE", "OUTBOUND", getSession("gb"));

if(!is_array($zarflar)){
    echo $zarflar;
}else{
    ?>
    <h3>Giden Zarflar</h3>
    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>UUID</th>
                <th>Identifier</th>
                <th>VKN_TCKN</th>
                <th>EnvType</th>
                <th>InsertDateTime</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($zarflar as $zarf){
                ?>
                <tr>
                    <td><?=$zarf->getUUID()?></td>
                    <td><?=$zarf->getIdentifier()?></td>
                    <td><?=$zarf->getVKNTCKN()?></td>
                    <td><?=$zarf->getEnvType()?></td>
                    <td><?=$zarf->getInsertDateTime()?></td>
                </tr>
                <?php
            }

            ?>
            </tbody>
        </table>
    </div>
    <?php
}
