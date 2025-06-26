<?php

    require_once __DIR__ . '/../../vendor/autoload.php';

	global $con;

//    $con = new MysqliDb('localhost', 'root', '!MySql8?.', 'ozsoy_izolasyon');
$con = new MysqliDb('localhost', 'brhmzsyc_admin', '!lW99&Z#aufU', 'brhmzsyc_ozsoy_izolasyon');
	
	if(!$con){
		echo 'Veritabanina ulasilmiyor';
	}
	
	// error_reporting(0);

?>