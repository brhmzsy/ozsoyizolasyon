<?php
	global $con;
	
	// $con = mysqli_connect('localhost', 'root', '', 'aksu_plastik');
    $con = new MysqliDb('localhost', 'root', '!MySql8?.', 'ozsoy_izolasyon');
    // $con = mysqli_connect('localhost', 'brhmzsyc_admin', '!lW99&Z#aufU', 'brhmzsyc_aksu');
	
	if(!$con){
		echo 'Veritabanina ulasilmiyor';
	}
	
	// error_reporting(0);

?>