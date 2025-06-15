<?php


//const SAYFA = "C:\inetpub\wwwroot\ozsoyizolasyon/";
//const SAYFA = "/public_html/ozsoyizolasyon/";
const SAYFA = "";

const VERSIYON = 1;

require_once __DIR__ . '/../vendor/autoload.php';

$con = new MysqliDb('localhost', 'root', '!MySql8?.', 'ozsoy_izolasyon');

global $con;

