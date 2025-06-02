<?php

    session_start();
    include('php/common.php');
    include('php/islemler.php');

    if(!$_SESSION["login"]){
        header ('Location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="brhmzsy">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Menü Düzenle</title>
    
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
                        sayfa_duzenle();
                    ?>
                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->

            <?php
                common_footer();
            ?>
        </section>

        <?php
            bottom_script();
        ?>
        
        <script>

            function edite_kategori(id){
                $.ajax({
                    url:"php/fetch.php",
                    method:"POST",
                    data:{action:"duzenle", id:id},
                    success:function(data){
                        $('#result').html(data);
                    }
                });
            }

        </script>
    </body>
</html>