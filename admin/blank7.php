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

        <title>Blank</title>
    
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
                        urun_duzenle($lan);
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

            let stok_id = 0;

            $("#yeni_urun").click(function (){
                stok_id = 0;

                $("#urunu_sil").hide();

                $("#stok_adi").val("");
                $("#stok_turu").val(1);
                $("#serisi").val("");
                $("#stok_kodu").val("");
                $("#kasa_kalinligi").val("");
                $("#kasa_renk").val("");
                $("#kanat_olcu").val("");
                $("#kanat_renk").val("");
                $("#kol_modeli").val(1);
                $("#montaj").val(1);
                $("#cam").val(1);
                $("#birim_fiyat").val("");
                $("#iskonto_1_oran").val("");
                $("#kdv_oran").val("");
                $("#aciklama").val("");
            });

            $(".urun_guncelle").click(function (){
                stok_id = $(this).attr("data-id");

                $("#urunu_sil").show();

                let giden_veriler = {};
                giden_veriler["id"] = stok_id;

                $.ajax({
                    url:"php/islemler.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{action:"urun_bilgi_getir", data: giden_veriler},
                    success:function(data){
                        $("#stok_adi").val(data.name);
                        $("#stok_turu").val(data.type);
                        $("#serisi").val(data.kod);
                        $("#stok_kodu").val(data.size);
                        $("#kasa_kalinligi").val(data.kasa_kalinligi);
                        $("#kasa_renk").val(data.kasa_renk);
                        $("#kanat_olcu").val(data.kanat_olcu);
                        $("#kanat_renk").val(data.kanat_renk);
                        $("#kol_modeli").val(data.kol_modeli);
                        $("#montaj").val(data.montaj);
                        $("#cam").val(data.cam);
                        $("#birim_fiyat").val(data.price1);
                        $("#iskonto_1_oran").val(data.iskonto_1_oran);
                        $("#kdv_oran").val(data.kdv_oran);
                        $("#aciklama").val(data.aciklama);
                    }
                });
            });
            
            $("#urun_kaydet").click(function() {

                var formData = new FormData();

                formData.append("stok_id", stok_id);
                formData.append("stok_adi", $("#stok_adi").val());
                formData.append("stok_turu", $("#stok_turu").val());
                formData.append("serisi", $("#serisi").val());
                formData.append("stok_kodu", $("#stok_kodu").val());
                formData.append("kasa_kalinligi", $("#kasa_kalinligi").val());
                formData.append("kasa_renk", $("#kasa_renk").val());
                formData.append("kanat_olcu", $("#kanat_olcu").val());
                formData.append("kanat_renk", $("#kanat_renk").val());
                formData.append("kol_modeli", $("#kol_modeli").val());
                formData.append("montaj", $("#montaj").val());
                formData.append("cam", $("#cam").val());
                formData.append("birim_fiyat", $("#birim_fiyat").val());
                formData.append("iskonto_1_oran", $("#iskonto_1_oran").val());
                formData.append("kdv_oran", $("#kdv_oran").val());
                formData.append("aciklama", $("#aciklama").val());
                formData.append("resim", $('#resim')[0].files[0]);


                formData.append("resim", $("#resim")[0].files[0]);
                formData.append("action", "urun_kaydet");

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
                            window.location.href = "/admin/blank7.php";
                        }
                    }
                });
            });

            $("#urunu_sil").click(function (){
                $('.modal_close').click();
            });

            $("#urun_sil").click(function (){

                let giden_veriler = {};
                giden_veriler["id"] = stok_id;

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
                            window.location.href = "/admin/blank7.php";
                        }
                    }
                });
            });

        </script>
    </body>
</html>