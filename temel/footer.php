<?php

include 'temel/ayarlar.php';

$sayfa_metinleri = $con->rawQuery("SELECT * FROM page_texts WHERE kod LIKE 'f%' order by kod");

require_once __DIR__ . '/../php/ArayuzDuzenleme.php';;

$telefon_class = new ArayuzDuzenleme();

$telefon = $telefon_class->temizleTelefon($sayfa_metinleri[2]['texttr']);

?>

<footer id="Footer" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <hr class="no_line" style="margin:0 auto 100px"> </div>
            <div class="col-md-4">
                <h4>Adres</h4>
                <hr class="no_line" style="margin: 0 auto 10px auto" />
                <?php echo $sayfa_metinleri[0]['texttr']; ?>
                <hr style="margin: 0 auto 10px auto" />
                <?php echo $sayfa_metinleri[1]['texttr']; ?>
            </div>
            <div class="col-md-4">
                <h4>Hızlı linkler</h4>
                <hr class="no_line" style="margin: 0 auto 10px auto" /> <a href="/">Anasayfa</a>
                <br> <a href="/hakkimizda">Hakkımızda</a>
                <br> <a href="/projelerimiz">Projelerimizi Görün</a>
                <br> <a href="/hizmetlerimiz">Hizmetlerimiz</a>
                <br> <a href="/iletisim">İletişim</a> </div>
            <div class="col-md-4">
                <h4>Bizimle İletişime Geçin</h4>
                <hr class="no_line" style="margin: 0 auto 10px auto" />
                <h3><strong><a href="tel:<?php echo $telefon; ?>"><?php echo $sayfa_metinleri[2]['texttr']; ?></a></strong></h3>
<!--                <hr class="no_line" style="margin: 0 auto 10px auto" />-->
<!--                <p> If you have a question,-->
<!--                    <br> please contact at <a href="#"><span>noreply@envato.com</span></a> </p>-->
            </div>
            <div class="col-12">
                <hr class="no_line" style="margin:0 auto 60px"> </div>
        </div>
    </div>
    <div class="footer_copy">
        <div class="container">
            <div class="column one"> <a id="back_to_top" class="footer_button" href="#"><i class="icon-up-open-big"></i></a>
                <div class="copyright"> &copy; <?php echo date('Y') ?> - İzo Özsoy İzolasyon - <a target="_blank" rel="nofollow" href="https://www.linkedin.com/in/ibrahim-%C3%B6zsoy-67b63b184/">brhmzsy</a> </div>
                <ul class="social">
                    <li class="facebook"> <a href="https://www.facebook.com/profile.php?id=100064777278105" title="Facebook" target="_blank"><i class="icon-facebook"></i></a> </li>
                    <li class="instagram"> <a href="https://www.instagram.com/izolasyon.ozsoy/" title="Instagram" target="_blank"><i class="icon-instagram"></i></a> </li>
                </ul>
            </div>
        </div>
    </div>
</footer>