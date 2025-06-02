<?php
    include ("../php/connection.php");

	require_once __DIR__ . '/../../vendor/autoload.php';

	global $con;

	$con = new MysqliDb('localhost', 'root', '!MySql8?.', 'ozsoy_izolasyon');
	function top_head(){
		echo '
			<!-- Bootstrap core CSS -->
			<link href="/admin/css/bootstrap.min.css" rel="stylesheet">
			<link href="/admin/css/bootstrap-reset.css" rel="stylesheet">
			<!--external css-->
			<link href="/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
			<!-- Custom styles for this template -->
			<link href="/admin/css/style.css" rel="stylesheet">
			<link href="/admin/css/style-responsive.css" rel="stylesheet" />
		
			<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
			<!--[if lt IE 9]>
			<script src="/admin/js/html5shiv.js"></script>
			<script src="/admin/js/respond.min.js"></script>
			<![endif]-->
			
            <!-- Uyarı penceresi -->
            <link rel="stylesheet" type="text/css" href="/admin/assets/gritter/css/jquery.gritter.css" />

			<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

			<link rel="stylesheet" type="text/css" href="/admin/assets/bootstrap-datepicker/css/datepicker.css" />
			<link rel="stylesheet" type="text/css" href="/admin/assets/bootstrap-colorpicker/css/colorpicker.css" />
			<link rel="stylesheet" type="text/css" href="/admin/assets/bootstrap-daterangepicker/daterangepicker.css" />
			<script type="text/javascript" src="/admin/assets/ckeditor/ckeditor.js"></script>
			<link href="/admin/css/special.css" rel="stylesheet" />

		';
	}

	function bottom_script(){
		echo '
			<!-- js placed at the end of the document so the pages load faster -->
			<script src="/admin/js/jquery.js"></script>
			<script src="/admin/js/bootstrap.min.js"></script>
			<script class="include" type="text/javascript" src="/admin/js/jquery.dcjqaccordion.2.7.js"></script>
			<script src="/admin/js/jquery.scrollTo.min.js"></script>
			<script src="/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
			<script src="/admin/js/respond.min.js" ></script>
		
			<!--common script for all pages-->
			<script src="/admin/js/common-scripts.js"></script>
			
            <!--script for uyarı penceresi-->
            <script src="/admin/assets/gritter/js/jquery.gritter.js" type="text/javascript"></script>
            <script src="/admin/js/gritter-my.js" type="text/javascript"></script>

			<script type="text/javascript" src="/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
			<script type="text/javascript" src="/admin/assets/bootstrap-daterangepicker/date.js"></script>
			<script type="text/javascript" src="/admin/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
			<script type="text/javascript" src="/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		';
	}

	function common_header(){
		echo '
			<!--header start-->
			<header class="header white-bg">
				<div class="sidebar-toggle-box">
					<div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
				</div>
				<!--logo start-->
				<a href="index.php" class="logo" >BRHM<span>ZSY</span></a>
				<!--logo end-->
				
				</div>
				<div class="top-nav ">
					<ul class="nav pull-right top-menu">
						<li>
							<input type="text" class="form-control search" placeholder="Search">
						</li>
						<!-- user login dropdown start-->
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<img alt="" src="img/avatar1_small.jpg">
								<span class="username">Özsoy İzolasyon</span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu extended logout">
								<div class="log-arrow-up"></div>
								<!--
								<li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
								<li><a href="#"><i class="icon-cog"></i> Settings</a></li>
								<li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
								-->
								<li><a href="cikis.php"><i class="icon-key"></i> Log Out</a></li>
							</ul>
						</li>
						<!-- user login dropdown end -->
					</ul>
				</div>
			</header>
			<!--header end-->
		';
		
	}

	function common_sidebar(){
		echo '
			<!--sidebar start-->
			<aside>
				<div id="sidebar"  class="nav-collapse ">
					<!-- sidebar menu start-->
					<ul class="sidebar-menu" id="nav-accordion">
					<li>
						<a href="index.php">
							<i class="icon-dashboard"></i>
							<span>Anasayfa</span>
						</a>
					</li>
		';

		session_start();
		if($_SESSION["userId"] == 1){
			echo '
				<li>
					<a href="menu_duzenle.php">
						<i class="icon-dashboard"></i>
						<span>Menu Düzenle</span>
					</a>
				</li>
				<li>
					<a href="anasayfa_duzenle.php">
						<i class="icon-dashboard"></i>
						<span>Anasayfa Düzenle</span>
					</a>
				</li>
				<li>
					<a href="hakkimizda_duzenle.php">
						<i class="icon-dashboard"></i>
						<span>Hakkımızda Düzenle</span>
					</a>
				</li>
				<li>
					<a href="projelerimizi_gorun_duzenle.php">
						<i class="icon-dashboard"></i>
						<span>Projeleri Görün Düzenle</span>
					</a>
				</li>
				<li>
					<a href="hizmetlerimiz_duzenle.php">
						<i class="icon-dashboard"></i>
						<span>Hizmetlerimiz Düzenle</span>
					</a>
				</li>
				<li>
					<a href="iletisim_duzenle.php">
						<i class="icon-dashboard"></i>
						<span>İletişim Düzenle</span>
					</a>
				</li>
				<li>
					<a href="footer_duzenle.php">
						<i class="icon-dashboard"></i>
						<span>Footer Düzenle</span>
					</a>
				</li>
				<li>
					<a href="blank8.php">
						<i class="icon-dashboard"></i>
						<span>Ürün Sayf. Düzenle</span>
					</a>
				</li>
			';
		}
		echo '
						<!--multi level menu end-->
	
					</ul>
					<!-- sidebar menu end-->
				</div>
			</aside>
			<!--sidebar end-->
		';
	}

	function common_footer(){
		echo '
			<!--footer start-->
			<footer class="site-footer">
				<div class="text-center">
					' . date("Y") . ' &copy; BRHMZSY by CofferLab.
					<a href="#" class="go-top">
						<i class="icon-angle-up"></i>
					</a>
				</div>
			</footer>
			<!--footer end-->
		';
	}

	function sayfa_duzenle($kod = "h"){

		global $con;

		if(empty($kod))
			return false;
		
		$sql = $con->rawQuery("SELECT * FROM page_texts WHERE kod LIKE '$kod%'");
		$i = 1;

		echo '
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							Sayfa Yazıları
						</header>
						<table class="table table-striped table-advance table-hover">
							<thead>
							<tr>
								<th style="width: 75px">Sıra</th>
								<th style="width: 200px"><i class="icon-bullhorn"></i> İçerik</th>
							</tr>
							</thead>
							<tbody>
		';

		foreach($sql as $result){
			echo '
				<tr>
					<td>
						<a data-toggle="modal" href="#myModal" onclick="edite_kategori('.$result["id"].')"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
						'.$i.' 
					</td>
					<td>'.$result["texttr"].'</td>
				</tr>
			';
			$i++;
		}

		echo '
							</tbody>
						</table>
						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog" style="width: 1000px;">
								<div class="modal-content" id="result">
									
								</div>
							</div>
						</div>
						<!-- modal -->
					</section>
				</div>
			</div>
		';
	}
function urun_duzenle($lan){

	global $con;

	$sql = $con->rawQuery("SELECT * FROM products WHERE language = '$lan' ");
	$i = 1;

	if($lan == "ar"){
		$baslik = "Arapça Ürünler listesi";
		$para = "$";
	}else if($lan == "fr"){
		$baslik = "Fransızca Ürünler listesi";
		$para = "€";
	}else if($lan == "es"){
		$baslik = "İspanyolca Ürünler listesi";
		$para = "€";
	}else if($lan == "en"){
		$baslik = "İngilizce Ürünler listesi";
		$para = "$";
	}else{
		$baslik = "Türkçe Ürünler listesi";
		$para = "₺";
	}

	echo '
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading" style="display: flex; justify-content: space-between;">
							<span>Ürünler - '.$baslik.'</span>
							<a id="yeni_urun" data-toggle="modal" href="#urunModal" class="btn btn-primary">Yeni Ürün Ekle</a>
						</header>
						<table class="table table-striped table-advance table-hover">
							<thead>
							<tr>
								<th style="width: 75px">Sıra</th>
								<th style="width: 200px"><i class="icon-bullhorn"></i> Ürün Adı</th>
								<th style="width: 200px"><i class="icon-bullhorn"></i> Ürün Türü</th>
								<th style="width: 200px"><i class="icon-bullhorn"></i> Ürün Kodu</th>
								<th style="width: 200px"><i class="icon-bullhorn"></i> Ürün Size</th>
								<th style="width: 200px"><i class="icon-bullhorn"></i> Ürün Resim Adı</th>
								<th style="width: 200px"><i class="icon-bullhorn"></i> Beyaz</th>
								<th style="width: 200px"><i class="icon-bullhorn"></i> Renkli</th>
								<th style="width: 200px"><i class="icon-bullhorn"></i> Cam</th>
							</tr>
							</thead>
							<tbody>
		';

	foreach($sql as $result){
		echo '
				<tr>
					<td>
						<a data-toggle="modal" href="#urunModal" class="urun_guncelle" data-id="'.$result["id"].'"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
						'.$i.' 
					</td>
					<td>'.$result["name"].'</td>
					<td>'.$result["type"].'</td>
					<td>'.$result["kod"].'</td> 
					<td>'.$result["size"].'</td>
					<td>'.$result["images"].'</td>
					<td>'.$result["price1"].' '.$para.'</td>
					<td>'.$result["price2"].' '.$para.'</td>
					<td>'.$result["price3"].' '.$para.'</td>
				</tr>
			';
		$i++;
	}

	echo '
							</tbody>
						</table>
						<!-- Modal -->
						<div class="modal fade" id="urunModal" tabindex="-1" role="dialog" aria-labelledby="urunModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" id="result">
                                        <form role="form" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Ürün Bilgisi</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="type">Ürün Adı</label>
                                <input type="text" class="form-control" id="stok_adi" value="" placeholder="Ürün Adı">
                            </div>

                            <div class="form-group">
                                <label for="type">Ürün Türü</label>
                                <select id="stok_turu" class="form-control">
                                    <option value="1">Hazır Doğrama</option>
                                    <option value="2">Plastik Pencere</option>
                                    <option value="3">Kapı</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Serisi</label>
                                <input type="text" class="form-control" id="serisi" value="" placeholder="Serisi">
                            </div>

                            <div class="form-group">
                                <label for="type">Ürün Kodu</label>
                                <input type="text" class="form-control" id="stok_kodu" value="" placeholder="Ürün Kodu">
                            </div>

                            <div class="form-group">
                                <label for="type">Kasa Kalınlığı</label>
                                <input type="text" class="form-control" id="kasa_kalinligi" value="" placeholder="Kasa Kalınlığı">
                            </div>

                            <div class="form-group">
                                <label for="type">Kasa Renk</label>
                                <input type="text" class="form-control" id="kasa_renk" value="" placeholder="Kasa Renk">
                            </div>

                            <div class="form-group">
                                <label for="type">Kanat Ölçü</label>
                                <input type="text" class="form-control" id="kanat_olcu" value="" placeholder="Kanat Ölçü">
                            </div>

                            <div class="form-group">
                                <label for="type">Kanat Renk</label>
                                <input type="text" class="form-control" id="kanat_renk" value="" placeholder="Kanat Renk">
                            </div>

                            <div class="form-group">
                                <label for="kol_modeli">Kol Modeli</label>
                                <select id="kol_modeli" class="form-control">
                                    <option value="1">Yok</option>
                                    <option value="2">Normal</option>
                                    <option value="3">Lüks</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="montaj">Montaj</label>
                                <select id="montaj" class="form-control">
                                    <option value="1">Yok</option>
                                    <option value="2">Var</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cam">Cam</label>
                                <select id="cam" class="form-control">
                                    <option value="1">Yok</option>
                                    <option value="2">Var</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Birim Fiyatı</label>
                                <input type="number" class="form-control" id="birim_fiyat" value="" placeholder="Birim Fiyatı">
                            </div>

                            <div class="form-group">
                                <label for="type">İskonto Oran</label>
                                <input type="number" class="form-control" id="iskonto_1_oran" value="" placeholder="İskonto Oran 1">
                            </div>

                            <div class="form-group">
                                <label for="type">Kdv Oranı</label>
                                <input type="number" class="form-control" id="kdv_oran" value="" placeholder="Kdv Oranı">
                            </div>

                            <div class="form-group">
                                <label for="type">Açıklama</label>
                                <input type="text" class="form-control" id="aciklama" value="" placeholder="Açıklama">
                            </div>

                            <div class="form-group">
                                <label for="type">Ürün Resim</label>
                                <input type="file" name="resim" id="resim">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default modal_close" type="button">Kapat</button>
                            <a data-toggle="modal" href="#urunSilModal"  class="btn btn-danger" type="button" id="urunu_sil" style="display: none;">Sil</a>
                            <button class="btn btn-success" type="button" id="urun_kaydet">Kaydet</button>
                        </div>
                            </form>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="modal fade" id="urunSilModal" tabindex="-1" role="dialog" aria-labelledby="urunSilModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" id="result">
                                        <form role="form" method="post" enctype="multipart/form-data">
                        <div class="modal-header" style="background-color: #ff6c60;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Ürün Sil</h4>
                        </div>
                        <div class="modal-body">
                            <p>Ürününüz Silinsin mi?</p>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default modal_close" type="button">Kapat</button>
                            <button class="btn btn-danger" type="button" id="urun_sil">Sil</button>
                        </div>
                            </form>
                                    </div>
                                </div>
                            </div>
                            
						<!-- modal -->
					</section>
				</div>
			</div>
		';
}


?>
