<?php

    session_start();
    include('php/common.php');
    include('php/islemler.php');

    $alert = "";
    $alert = $_SESSION["alertText"];

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

    <title>Giriş Yap | brhmzsy</title>
    
    <?php 
        top_head();
    ?>

</head>

  <body class="login-body">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-20">
                <section class="panel"><?php echo $alert; ?></section>
            </div>
        </div>
        <form class="form-signin" role="form" method="post" enctype="multipart/form-data">
            <h2 class="form-signin-heading">GİRİŞ YAP</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" name="kullaniciAdi" placeholder="Kullanıcı Adı" required>
                <input type="password" class="form-control" name="sifre" placeholder="Şifre" required>
                <button class="btn btn-lg btn-login btn-block" type="submit" name="giris" >GİRİŞ YAP</button>
            </div>
        </form>

    </div>

    <?php
        bottom_script();
    ?>

  </body>
</html>
