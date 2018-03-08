<?php
/**
 * Created by PhpStorm.
 * User: orhangazibasli
 * Date: 26.12.2017
 * Time: 10:01
 */
    require 'baglanti.php';
    $hata = "";



    if(isset($_GET['save'])){

        $_SESSION['ws_kuladi'] = $_POST['wskuladi'];
        $_SESSION['ws_sifre'] = $_POST['wssifre'];
        $_SESSION['vknTckn'] = $_POST['vknTckn'];
        $_SESSION['branch'] = $_POST['branch'];

        $hata = successJs("Bilgiler Başarıyla Kayıt Edildi.");
    }
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FIT API - PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.1.2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1>FIT eArşiv</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="?save">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="vknTckn">VKN/TCKN</label>
                                <input class="form-control" id="vknTckn" name="vknTckn" required="" value="<?=getSession("vknTckn")?>" placeholder="VKN - TCKN">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="wskuladi">WS Kullanıcı Adı</label>
                                <input class="form-control" id="wskuladi" name="wskuladi" required="" value="<?=getSession("ws_kuladi")?>" placeholder="Kullanıcı Adı">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="wssifre">WS Şifre</label>
                                <input class="form-control" id="wssifre" name="wssifre" required="" value="<?=getSession("ws_sifre")?>" placeholder="Şifre">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="branch">Şube</label>
                                <input class="form-control" id="branch" name="branch" required="" value="<?=getSession("branch")?>" placeholder="Şube">
                            </div>

                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-success float-right mt-4" value="Bilgileri Kaydet">
                        </div>

                    </form>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <?php
                            if(isset($_GET['p'])){
                                include 'pagesarchive/'.$_GET['p'].'.php';
                            }else{
                                ?>

                                <h4>Yan menüden yapmak istediğiniz işlemi seçiniz.</h4>

                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-4">
                            <div class="list-group mb-2">
                                <a href="?p=getdocument" class="list-group-item"> Fatura İndir</a>
                                <a href="?p=getsigned" class="list-group-item"> UBL İndir</a>
                                <a href="?p=getuserlist" class="list-group-item"> Kullanıcı Listesi</a>
                                <a href="?p=retrigger" class="list-group-item"> Tekrar Tetikleme</a>
                                <a href="?p=cancelinv" class="list-group-item"> Fatura İptal</a>

                            </div>
                            <div class="list-group mb-2">
                                <a href="?p=faturagonder" class="list-group-item"> Fatura Gönder</a>
                                <a href="?p=zarfgonder" class="list-group-item"> Zarf Gönder</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .selected{
        background: #fdfdfd;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.1.2/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.tr.min.js"></script>
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            language: 'tr'
        });

        $('tr').click(function () {

            $('tr').removeClass('selected');
            $(this).addClass("selected");

            var veri = $('.zarfdurum').attr('href')+$('td:eq(0)', this).html();
            $('.zarfdurum').attr('href', veri);

            var fatura = $('.faturadurum').attr('href')+$('td:eq(0)', this).html();
            $('.faturadurum').attr('href', fatura);

            var fatura2 = $('.faturadurum2').attr('href')+$('td:eq(0)', this).html();
            $('.faturadurum2').attr('href', fatura2);

            var uygyanit = $('.uygyanit').attr('href')+$('td:eq(0)', this).html();
            $('.uygyanit').attr('href', uygyanit);

            $('.zarfdurum').removeClass('disabled');
            $('.faturadurum').removeClass('disabled');
            $('.faturadurum2').removeClass('disabled');
            $('.uygyanit').removeClass('disabled');

        });

        $('.add-other').click(function () {
            var clone = $('.copy:last').clone();
            $('.afterbox').after(clone);
        });
    });
    <?php

    echo $hata;

    ?>
</script>
</body>
</html>