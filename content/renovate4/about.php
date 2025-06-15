<?php

include '../../temel/ayarlar.php';

$sayfa_metinleri = $con->rawQuery("SELECT * FROM page_texts WHERE kod LIKE 'p2%' order by kod");

?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<?php include '../../temel/head.php'; ?>

<body class="page style-simple button-custom layout-full-width if-zoom if-border-hide no-content-padding header-transparent header-fw sticky-header sticky-tb-color ab-hide subheader-both-center menuo-right menuo-no-borders mobile-tb-center mobile-side-slide mobile-mini-mr-ll tablet-sticky mobile-header-mini mobile-sticky">
	<div id="Wrapper">

        <div id="Header_wrapper">
            <header id="Header">
                <?php include '../../temel/menu.php'; ?>
            </header>
        </div>

		<div id="Content">
			<div class="section" style="padding-top:200px;padding-bottom:40px;background-image:url(/content/renovate4/images/reno4-about-workers.png);background-repeat:no-repeat;background-position:center top">
				<div class="container">
					<div class="row">
						<div class="col-md-5">
                            <?php echo $sayfa_metinleri[0]['texttr']; ?>
							<hr class="no_line" style="margin: 0 auto 30px auto" />
                            <?php echo $sayfa_metinleri[5]['texttr']; ?>
						</div>
						<div class="col-12">
							<hr class="no_line" style="margin: 0 auto 175px auto" /> </div>
						<div class="col-md-6">
							<div class="column_attr clearfix" style="padding:40px 0% 0px;">
                                <?php echo $sayfa_metinleri[6]['texttr']; ?>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<div class="section full-width-ex-mobile" style="padding-top:50px;padding-bottom:35px">
				<div class="">
					<div class="row">
						<div class="col-md-6 text-right" style="padding:0px 2%"> <img src="/content/renovate4/images/izo_ozsoy_izolasyon_hakkimizda.jpeg" alt="izo_ozsoy_izolasyon_hakkimizda" title="" width="640" height="780" /> </div>
						<div class="col-md-6" style="padding:5% 30px">
							<div class="row">
								<div class="col-md-10">
									<div class="column_attr clearfix" style="padding:30px 2%;">
                                        <?php echo $sayfa_metinleri[7]['texttr']; ?>
                                    </div>
								</div>
<!--								<div class="col-12">-->
<!--									<div class="image_frame image_item no_link scale-with-grid no_border">-->
<!--										<div class="image_wrapper"><img class="scale-with-grid" src="/content/renovate4/images/reno4-about-singnature.png" alt="reno4-about-singnature" title="" width="200" height="117" /> </div>-->
<!--									</div>-->
<!--								</div>-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="section" style="padding-top:50px;padding-bottom:35px">
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<div class="column_attr clearfix" style="padding:0px 5% 0px 0%;">
                                <?php echo $sayfa_metinleri[8]['texttr']; ?>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<div class="section" style="padding-top:35px;padding-bottom:30px">
				<div class="container">
					<div class="row hakkimizda_sayac">
						<div class="col-md-3" style="padding:0 0 20px 0">
							<div class="image_frame image_item no_link scale-with-grid no_border">
								<div class="image_wrapper"><img class="scale-with-grid" src="/content/renovate4/images/reno4-about-icon1.png" alt="reno4-about-icon1" title="" width="125" height="300" /> </div>
							</div>
							<div class="column_attr clearfix" style="padding:55px 0% 0px;">
								<div class="google_font" style="font-family:'Comfortaa',Arial,Tahoma,sans-serif;font-size:53px;line-height:53px;font-weight:700;letter-spacing:0px;color:#222222;"> <span class="counter-inline animate-math">+<span class="number" data-to="<?php echo $sayfa_metinleri[9]['texttr']; ?>">
                                        <?php echo $sayfa_metinleri[9]['texttr']; ?>
                                        </span></span></div>
                                <?php echo $sayfa_metinleri[10]['texttr']; ?>
							</div>
						</div>
						<div class="col-md-3" style="padding:0 0 20px 0">
							<div class="image_frame image_item no_link scale-with-grid no_border">
								<div class="image_wrapper"><img class="scale-with-grid" src="/content/renovate4/images/reno4-about-icon2.png" alt="reno4-about-icon2" title="" width="125" height="300" /> </div>
							</div>
							<div class="column_attr clearfix" style="padding:55px 0% 0px;">
								<div class="google_font" style="font-family:'Comfortaa',Arial,Tahoma,sans-serif;font-size:53px;line-height:53px;font-weight:700;letter-spacing:0px;color:#222222;"> <span class="counter-inline animate-math"><span class="number" data-to="<?php echo $sayfa_metinleri[11]['texttr']; ?>"><?php echo $sayfa_metinleri[11]['texttr']; ?></span></span>+</div>
								<p><?php echo $sayfa_metinleri[12]['texttr']; ?></p>
							</div>
						</div>
						<div class="col-md-3" style="padding:0 0 20px 0">
							<div class="image_frame image_item no_link scale-with-grid no_border">
								<div class="image_wrapper"><img class="scale-with-grid" src="/content/renovate4/images/reno4-about-icon3.png" alt="reno4-about-icon3" title="" width="125" height="300" /> </div>
							</div>
							<div class="column_attr clearfix" style="padding:55px 0% 0px;">
								<div class="google_font" style="font-family:'Comfortaa',Arial,Tahoma,sans-serif;font-size:53px;line-height:53px;font-weight:700;letter-spacing:0px;color:#222222;"> <span class="counter-inline animate-math">+<span class="number" data-to="<?php echo $sayfa_metinleri[1]['texttr']; ?>"><?php echo $sayfa_metinleri[1]['texttr']; ?></span></span></div>
								<p><?php echo $sayfa_metinleri[2]['texttr']; ?></p>
							</div>
						</div>
						<div class="col-md-3" style="padding:0 0 20px 0">
							<div class="image_frame image_item no_link scale-with-grid no_border">
								<div class="image_wrapper"><img class="scale-with-grid" src="/content/renovate4/images/reno4-about-icon4.png" alt="reno4-about-icon4" title="" width="125" height="300" /> </div>
							</div>
							<div class="column_attr clearfix" style="padding:55px 0% 0px;">
								<div class="google_font" style="font-family:'Comfortaa',Arial,Tahoma,sans-serif;font-size:53px;line-height:53px;font-weight:700;letter-spacing:0px;color:#222222;"> <span class="counter-inline animate-math"><span class="number" data-to="<?php echo $sayfa_metinleri[3]['texttr']; ?>"><?php echo $sayfa_metinleri[3]['texttr']; ?></span></span>m² </div>
								<p><?php echo $sayfa_metinleri[4]['texttr']; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>

            <?php include '../../temel/footer_ust.php'; ?>

		</div>

        <?php include '../../temel/footer.php'; ?>

	</div>

    <?php include '../../temel/footer_alt.php'; ?>

	<div id="body_overlay"></div>
	<!-- JS -->
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="../../js/jquery-migrate-3.4.0.min.js"></script>
	<script src="../../js/mfn.menu.js"></script>
	<script src="../../js/jquery.plugins.js"></script>
	<script src="../../js/jquery.jplayer.min.js"></script>
	<script src="../../js/animations/animations.js"></script>
	<script src="../../js/translate3d.js"></script>
	<script src="../../js/scripts.js"></script>
</body>

</html>