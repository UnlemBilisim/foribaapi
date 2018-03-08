<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 23.12.2017
 * Time: 17:08
 */

if(isset($_GET['v'])){

    $mukellef = MukellefSorgu($_POST['vkn_tckn'], $_POST['role']);

    if(!is_array($mukellef)){
        echo $mukellef;
    }else{
        ?>
        <h3>Sonuçlar</h3>
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Identifier</th>
                    <th>Alias</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>RegisterTime</th>
                    <th>FirstCreationTime</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($mukellef as $mukellef){
                    ?>
                    <tr>
                        <td><?=$mukellef->getIdentifier()?></td>
                        <td><?=$mukellef->getAlias()?></td>
                        <td><?=$mukellef->getTitle()?></td>
                        <td><?=$mukellef->getType()?></td>
                        <td><?=$mukellef->getRegisterTime()?></td>
                        <td><?=$mukellef->getFirstCreationTime()?></td>
                    </tr>
                    <?php
                }

                ?>
                </tbody>
            </table>
        </div>
        <?php
    }

}else{
    ?>
    <h3>Mükellef Sorgulama</h3>
    <form method="post" action="?p=mukellefsorgu&v=single">
        <div class="form-group">
            <label>VKN/TCKN</label>
            <input class="form-control" required="" placeholder="VKN/TCKN" name="vkn_tckn">
        </div>
        <div class="form-group">
            <label>Tür</label>
            <select name="role" class="form-control">
                <option>GB</option>
                <option>PK</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-outline-warning btn-block" value="Sorgula">
        </div>
    </form>
    <?php
}
?>

