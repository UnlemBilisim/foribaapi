<?php
    require 'baglanti.php';
    $hata = "";



    if(isset($_GET['save'])){
        $tarihFark = strtotime($_POST['endDate']) - strtotime($_POST['startDate']);
        $gunFark = $tarihFark / 86400;

        if($tarihFark < 0){
            $hata = errorJs("Bitiş tarihi, Başlangıç tarihinden büyük olamaz.");
        }
        else if($gunFark > 31){
            $hata = errorJs("Tarih aralığı 31 günden büyük olamaz");
        }else{
            $_SESSION['ws_kuladi'] = $_POST['wskuladi'];
            $_SESSION['ws_sifre'] = $_POST['wssifre'];
            $_SESSION['gb'] = $_POST['gb'];
            $_SESSION['pk'] = $_POST['pk'];
            $_SESSION['startDate'] = $_POST['startDate'];
            $_SESSION['endDate'] = $_POST['endDate'];
            $_SESSION['vknTckn'] = $_POST['vknTckn'];

            $hata = successJs("Bilgiler Başarıyla Kayıt Edildi.");
        }
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
                        <h1>FIT API</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="?save">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="wskuladi">WS Kullanıcı Adı</label>
                                    <input class="form-control" id="wskuladi" name="wskuladi" required="" value="<?=getSession("ws_kuladi")?>" placeholder="Kullanıcı Adı">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="wssifre">WS Şifre</label>
                                    <input class="form-control" id="wssifre" name="wssifre" required="" value="<?=getSession("ws_sifre")?>" placeholder="Şifre">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="gb">Gelen Kutusu Etiketi</label>
                                    <input class="form-control" id="gb" name="gb" required="" value="<?=getSession("gb")?>" placeholder="Gelen Kutusu Etiketi">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="pk">Posta Kutusu Etiketi</label>
                                    <input class="form-control" id="pk" name="pk" required="" value="<?=getSession("pk")?>" placeholder="Posta Kutusu Etiketi">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="vknTckn">VKN/TCKN</label>
                                    <input class="form-control" required="" name="vknTckn" id="vknTckn" value="<?=getSession("vknTckn")?>" placeholder="VKN/TCKN">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="startDate">Başlangıç Tarihi</label>
                                    <input class="form-control datepicker" required="" name="startDate" id="startDate" value="<?=getSession("startDate")?>" placeholder="Başlangıç Tarihi">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="endDate">Bitiş Tarihi</label>
                                    <input class="form-control datepicker" required="" name="endDate" id="endDate" value="<?=getSession("endDate")?>" placeholder="Bitiş Tarihi">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="submit" class="btn btn-outline-success float-right mt-4" value="Bilgileri Kaydet">
                                </div>

                            </div>

                        </form>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <?php
                                    if(isset($_GET['p'])){
                                        include 'pages/'.$_GET['p'].'.php';
                                    }else{
                                        ?>

                                        <h4>Yan menüden yapmak istediğiniz işlemi seçiniz.</h4>

                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="col-4">
                                <div class="list-group mb-2">
                                    <a href="?p=faturagonder" class="list-group-item"> Fatura Gönder</a>
                                    <a href="?p=mukellefsorgu" class="list-group-item"> Mükellef Sorgula</a>
                                    <a href="?p=uygyanit&uuid=" class="uygyanit disabled list-group-item"> Uygulama Yanıtı Gönder</a>
                                    <a href="?p=zarfdurum&uuid=" class="zarfdurum disabled list-group-item"> Zarf Durumu Sorgula</a>

                                </div>
                                <div class="list-group mb-2">
                                    <a href="?p=fatura&type=html&uuid=" class="faturadurum disabled list-group-item"> Fatura HTML İndir</a>
                                    <a href="?p=fatura&type=pdf&uuid=" class="faturadurum disabled list-group-item"> Fatura PDF İndir</a>
                                    <a href="?p=faturaraw&type=ubl&uuid=" class="faturadurum2 disabled list-group-item"> Fatura UBL İndir</a>
                                </div>
                                <div class="list-group mb-2">
                                    <a href="?p=gidenzarflar" class="list-group-item"> Gönderilen Zarflar</a>
                                    <a href="?p=gidenfaturalar" class="list-group-item"> Gönderilen Faturalar</a>
                                    <a href="?p=gidenuygulama" class="list-group-item"> Gönderilen Uygulama Yanıtları</a>
                                </div>
                                <div class="list-group">
                                    <a href="?p=gelenzarflar" class="list-group-item"> Gelen Zarflar</a>
                                    <a href="?p=gelenfaturalar" class="list-group-item"> Gelen Faturalar</a>
                                    <a href="?p=gelenuygulama" class="list-group-item"> Gelen Uygulama Yanıtları</a>
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
        });
        <?php

            echo $hata;

        ?>
    </script>
</body>
</html>