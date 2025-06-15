<?php

include 'temel/ayarlar.php';

$sayfa_metinleri = $con->rawQuery("SELECT * FROM page_texts WHERE kod LIKE 'f%' order by kod");

require_once __DIR__ . '/../php/ArayuzDuzenleme.php';;

$telefon_class = new ArayuzDuzenleme();

$telefon = $telefon_class->temizleTelefon($sayfa_metinleri[2]['texttr']);

?>

<div class="section mcb-section no-margin-h equal-height-wrap" style="padding-top:75px">
    <div class="container">
        <div class="row">
            <div class="col-md-6"> <img src="/content/renovate4/images/reno4-reno-guys.png" alt="reno4-reno-guys" title="" width="1024" height="1076" /> </div>
            <div class="col-md-6" style="padding:30px">
                <div class="row">
                    <div class="col-12">
                        <div class="column_attr clearfix mobile_align_center">
                            <h2>Bir sorunuz varsa <br> bizi arayın</h2> </div>
                    </div>
                    <div class="col-12">
                        <hr class="no_line" style="margin:0 auto 20px"> </div>
                    <div class="col-md-2">
                        <div class="column_attr clearfix align_center mobile_align_center">
                            <h2><i class="icon-phone" style="color:#626262"></i></h2> </div>
                    </div>
                    <div class="col-md-10">
                        <div class="column_attr clearfix mobile_align_center" style="padding:5px 0% 20px;">
                            <h4 style="margin: 0;"><a href="tel:<?php echo $telefon; ?>"><?php echo $sayfa_metinleri["2"]["texttr"]; ?></a></h4> </div>
                    </div>
                    <!--								<div class="col-md-2">-->
                    <!--									<div class="column_attr clearfix align_center">-->
                    <!--										<h2><i class="icon-paper-plane-line" style="color:#626262"></i></h2> </div>-->
                    <!--								</div>-->
                    <!--								<div class="col-md-4">-->
                    <!--									<div class="column_attr clearfix mobile_align_center">-->
                    <!--										<h4 style="margin: 0; display:inline;"><a href="#">noreply@envato.com</a></h4> </div>-->
                    <!--								</div>-->
                    <div class="col-12">
                        <div class="column_attr clearfix mobile_align_center" style="padding:38px 0px 0px 0px;">
                            <?php echo $sayfa_metinleri["1"]["texttr"]; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>