<?php

    session_start();
    include('php/common.php');
    include('php/islemler.php');

    if(!$_SESSION["login"]){
        header ('Location: login.php');
    }

    if(isset($_GET["lan"])){
        $lan = $_GET["lan"];
    }else{
        $lan = "tr";
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

        <title>Kategoriler</title>
    
        <?php
            top_head();
        ?>
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
                        kategoriler();
                    ?>
                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->

            <!-- Popup Pencere -->
            <a id="basarili" style="display: none;"></a>
            <a id="basarisiz" style="display: none;"></a>
            <!-- Popup Pencere -->

            <?php
                common_footer();
            ?>
        </section>

        <?php
            bottom_script();
        ?>
        
        <script>

            let kategori_id = 0;

            $("#yeni_kategori").click(function (){
                kategori_id = 0;

                $("#urunu_sil").hide();

                $("#baslik").val("");
                $("#icerik").val(1);
                $("#gosterim_yonu").val("");
                $("#durumu").val("");
            });

            $(".kategori_guncelle").click(function (){
                kategori_id = $(this).attr("data-id");
                $("#urunu_sil").show();

                let giden_veriler = {};
                giden_veriler["id"] = kategori_id;

                $.ajax({
                    url:"php/islemler.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{action:"kategori_bilgi_getir", data: giden_veriler},
                    success:function(data){
                        $("#baslik").val(data.baslik);
                        $("#icerik").val(data.icerik);
                        $("#gosterim_yonu").val(data.gosterim_yonu);
                        $("#durumu").val(data.durumu);
                    }
                });
            });
            
            $("#kategori_kaydet").click(function() {

                var formData = new FormData();

                formData.append("kategori_id", kategori_id);
                formData.append("baslik", $("#baslik").val());
                formData.append("icerik", $("#icerik").val());
                formData.append("gosterim_yonu", $("#gosterim_yonu").val());
                formData.append("durumu", $("#durumu").val());

                formData.append("resim", $("#resim")[0].files[0]);
                formData.append("action", "kategori_kaydet");

                $.ajax({
                    url:"php/islemler.php",
                    method:"POST",
                    dataType:"JSON",
                    data:formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        console.log(data);
                        if(data.durum) {
                            $('#basarili').click();
                            $('.modal_close').click();
                            window.location.href = "/admin/kategori_duzenle.php";
                        }
                    }
                });
            });

            $("#urunu_sil").click(function (){
                $('.modal_close').click();
            });

            $("#urun_sil").click(function (){

                let giden_veriler = {};
                giden_veriler["id"] = kategori_id;

                console.log(giden_veriler);

                $.ajax({
                    url:"php/islemler.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{action:"urun_sil", data: giden_veriler},
                    success:function(data){
                        if(data.durum) {
                            $('#basarili').click();
                            $('.modal_close').click();
                            window.location.href = "/admin/kategori_duzenle.php";
                        }
                    }
                });
            });

        </script>
    </body>
</html>