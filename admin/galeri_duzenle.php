<?php

    session_start();
    include('php/common.php');
    include('php/islemler.php');

    if(!$_SESSION["login"]){
        header ('Location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="brhmzsy">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Galeri Düzenle</title>
    
        <?php
            top_head();
        ?>
        <link rel="stylesheet" type="text/css" href="/admin/css/gallery.css">
    </head>

    <body>
        <section id="container" class="">
            <?php
                common_header();
                common_sidebar();
            ?>
      
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper site-min-height">
                    <!-- page start-->

                    <?php
                        $hedefKlasor = 'img/gallery/';
                        $resimler = glob($hedefKlasor . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
//                        $videolar = glob($hedefKlasor . '*.{mp4,mov,avi,mkv,webm}', GLOB_BRACE);
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading" style="display: flex; justify-content: space-between;">
                                    <span>Galeri</span>
                                    <a id="yeni_galeri" data-toggle="modal" href="#galeriModal" class="btn btn-primary">Yeni Galeri Ekle</a>
                                </header>
                                <div class="card-body">
                                    <ul class="grid cs-style-3">
                                        <?php foreach ($resimler as $resim){ ?>

                                            <li>
                                                <figure>
                                                    <img src="<?php echo $resim; ?>" alt="img04">
                                                    <figcaption style="opacity: 1; bottom: 70px;">
                                                        <a data-toggle="modal" href="#resimSilModal" class="resmi_kaldir" data-resim_adi="<?php echo $resim; ?>" style="cursor:pointer;">
                                                            X Resmi kaldır
                                                        </a>
                                                    </figcaption>
                                                </figure>
                                            </li>

                                        <?php } ?>
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->

            <!-- Modal -->
            <div class="modal fade" id="galeriModal" tabindex="-1" role="dialog" aria-labelledby="galeriModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" id="result">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Galeri Görsel Ekle</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="type">Galeri Belge Seç</label>
                                    <input type="file" name="dosya" id="dosya" multiple>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default modal_close" type="button">Kapat</button>
                                <button class="btn btn-success" type="button" id="galeri_kaydet">Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="resimSilModal" tabindex="-1" role="dialog" aria-labelledby="resimSilModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" id="result">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="modal-header" style="background-color: #ff6c60;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Dosya Sil</h4>
                            </div>
                            <div class="modal-body">
                                <p>Seçtiğiniz Dosya Silinsin mi?</p>
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default modal_close" type="button">Kapat</button>
                                <button class="btn btn-danger" type="button" id="resim_sil">Sil</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- modal -->

            <?php
                common_footer();
            ?>
        </section>

        <?php
            bottom_script();
        ?>
        
        <script>

            let resim_adi = "";

            $("#galeri_kaydet").click(function() {

                var formData = new FormData();

                $.each($("#dosya")[0].files, function(i, file) {
                    formData.append("dosya[]", file);
                });
                // formData.append("dosya", $("#dosya")[0].files);
                formData.append("action", "galeri_kaydet");

                $.ajax({
                    url:"php/islemler.php",
                    method:"POST",
                    dataType:"JSON",
                    data:formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        if(data.durum) {
                            $('#basarili').click();
                            $('.modal_close').click();
                            window.location.href = "/admin/galeri_duzenle.php";
                        }
                    }
                });
            });

            $(".resmi_kaldir").click(function() {
                resim_adi = $(this).data("resim_adi");
            });

            $("#resim_sil").click(function() {

                var formData = new FormData();

                formData.append("action", "resim_kaldir");
                formData.append("resim_adi", resim_adi);

                $.ajax({
                    url:"php/islemler.php",
                    method:"POST",
                    dataType:"JSON",
                    data:formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        if(data.durum) {
                            $('#basarili').click();
                            $('.modal_close').click();
                            window.location.href = "/admin/galeri_duzenle.php";
                        }
                    }
                });
            });

        </script>
    </body>
</html>