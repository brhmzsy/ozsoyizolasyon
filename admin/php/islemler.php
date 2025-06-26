<?php

	session_start();

    require_once __DIR__ . '/../../vendor/autoload.php';

    global $con;

//    $con = new MysqliDb('localhost', 'root', '!MySql8?.', 'ozsoy_izolasyon');
$con = new MysqliDb('localhost', 'brhmzsyc_admin', '!lW99&Z#aufU', 'brhmzsyc_ozsoy_izolasyon');

    if(isset($_POST["duzenle"])){

        $id = $_POST["id"];
        $text_tr = $_POST["text-tr"];
        $text_en = $_POST["text-en"];
        $text_fr = $_POST["text-fr"];
        $text_ap = $_POST["text-ap"];
        $text_es = $_POST["text-es"];

        $text_tr = str_replace("'", "\'", $text_tr);
        $text_en = str_replace("'", "\'", $text_en);
        $text_fr = str_replace("'", "\'", $text_fr);
        $text_ap = str_replace("'", "\'", $text_ap);
        $text_es = str_replace("'", "\'", $text_es);

        $update = $con->rawQuery("UPDATE page_texts SET textTr = ?, texten = ?, textfr = ?, textar = ?, textes = ? 
            WHERE id = ?", [$text_tr, $text_en, $text_fr, $text_ap, $text_es, $id]);

        // if($update){echo 'Başarılı ve dosya güncellendi';}else{echo "Eklenirken Bir Hata Oluştu";}

    }

    if(isset($_POST["giris"])){

        $kullaniciAdi = $_POST["kullaniciAdi"];
        $sifre = $_POST["sifre"];

        if($kullaniciAdi == "" && $sifre == ""){
            $_SESSION["login"] = false;
            $_SESSION["yetki"] = 0;
            $_SESSION["alertText"] = '
                        <div class="alert alert-danger alert-block fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <h4>
                                <i class="icon-ok-sign"></i>
                                Başarısız!
                            </h4>
                            <p>Boş Geçemezsiniz.</p>
                        </div>
                    ';
        }else{
            $login = $con->rawQuery("SELECT * FROM users WHERE kullaniciAdi = '$kullaniciAdi' ");

            if($login){

                $oku = $login[0];

                if($kullaniciAdi == $oku["kullaniciAdi"]){
                    if($sifre == $oku["password"]){

                        $_SESSION["login"] = true;
                        $_SESSION["yetki"] = $oku["yetki"];
                        $_SESSION["userId"] = $oku["id"];
                        $_SESSION["userName"] = $oku["kullaniciAdi"];
                        $_SESSION["alertText"] = '
                                <div class="alert alert-success alert-block fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <h4>
                                        <i class="icon-ok-sign"></i>
                                        Başarılı!
                                    </h4>
                                    <p>Kullanıcı Bilgileri Doğru.</p>
                                </div>
                            ';
                        header ('Location: index.php');

                    }else{
                        $_SESSION["login"] = false;
                        $_SESSION["yetki"] = 0;
                        $_SESSION["alertText"] = '
                                <div class="alert alert-danger alert-block fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <h4>
                                        <i class="icon-ok-sign"></i>
                                        Başarısız!
                                    </h4>
                                    <p>Şifre Hatalı.</p>
                                </div>
                            ';
                    }
                }else{
                    $_SESSION["login"] = false;
                    $_SESSION["yetki"] = 0;
                    $_SESSION["alertText"] = '
                            <div class="alert alert-danger alert-block fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <h4>
                                    <i class="icon-ok-sign"></i>
                                    Başarısız!
                                </h4>
                                <p>Kullanıcı Adı Hatalı.</p>
                            </div>
                        ';
                }
            }else{
                $_SESSION["login"] = false;
                $_SESSION["yetki"] = 0;
                $_SESSION["alertText"] = '
                        <div class="alert alert-danger alert-block fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <h4>
                                <i class="icon-ok-sign"></i>
                                Başarısız!
                            </h4>
                            <p>Veritabanı Bağlantı Hatası.</p>
                        </div>
                    ';
            }
        }

    }

    if(isset($_POST["action"])){

        if($_POST["action"] == "kategori_kaydet") {

            $gelen = $_POST;

            $kategori_id = $gelen["kategori_id"];
            $baslik = $gelen["baslik"];
            $icerik = $gelen["icerik"];
            $gosterim_yonu = $gelen["gosterim_yonu"];
            $type = $gelen["durumu"];

            if(is_numeric($kategori_id)) {

                try {

                    if(isset($_FILES["resim"]) && $_FILES["resim"]['error'] == 0) {

                        $hedefKlasor = '../img/category/';

                        // Geçici dosya yolunu al
                        $geciciDosya = $_FILES["resim"]['tmp_name'];

                        // Dosya adını al
                        $dosyaAdi = $_FILES["resim"]['name'];

                        // Hedef klasör yolunu ve dosya adını birleştirerek hedef yol oluştur
                        $hedefYol = $hedefKlasor . $dosyaAdi;

                        if (!is_dir($hedefKlasor)) {
                            mkdir($hedefKlasor, 0777, true);
                        }

                        // Dosyayı hedef yola taşı
                        if(move_uploaded_file($_FILES['resim']['tmp_name'], $hedefYol)) {
                            $mesaj = "Dosya başarıyla yüklendi.";
                        } else {
                            $mesaj = "Dosya yükleme sırasında bir hata oluştu.";
                        }
                    } else {
                        $mesaj = "Dosya yükleme hatası: " . $_FILES["resim"]['error'];
                    }


                    if ($kategori_id == 0) {
                        $con->rawQuery("insert into categories (baslik, icerik, gosterim_yonu, durumu) 
                            values(?, ?, ?, ?)", [$baslik, $icerik, $gosterim_yonu, $type]);

                        $kategori_id = $con->getInsertId();
                    } else {
                        $con->rawQuery("update categories set baslik=?, icerik=?, gosterim_yonu=?, durumu=? 
                            where id=?", [$baslik, $icerik, $gosterim_yonu, $type, $kategori_id]);
                    }

                    if(!empty($dosyaAdi))
                        $con->rawQuery("update categories set resim=? where id=? ", [$dosyaAdi, $kategori_id]);

                    echo json_encode(["durum" => true]);
                } catch (Exception $e) {
                    $hata = $e->getMessage();
                    echo json_encode(["durum" => false]);
                }
            }else
                echo json_encode(["durum" => false]);
        }

        if($_POST["action"] == "galeri_kaydet") {

            $gelen = $_POST;

            try {

                $hedefKlasor = '../img/gallery/';

                foreach ($_FILES["dosya"]["name"] as $key => $dosya){

                    if($_FILES["dosya"]["error"][$key] == 0){
                        $geciciDosya = $_FILES["dosya"]['tmp_name'][$key];

                        $dosyaAdi = $_FILES["dosya"]['name'][$key];
                        $hedefYol = $hedefKlasor . $dosyaAdi;

                        if (!is_dir($hedefKlasor)) {
                            mkdir($hedefKlasor, 0777, true);
                        }

                        if(move_uploaded_file($geciciDosya, $hedefYol)) {
                            $mesaj = "Dosya başarıyla yüklendi.";
                        } else {
                            $mesaj = "Dosya yükleme sırasında bir hata oluştu.";
                        }
                    }

                }

                echo json_encode(["durum" => true]);
            } catch (Exception $e) {
                $hata = $e->getMessage();
                echo json_encode(["durum" => false]);
            }
        }

        if($_POST["action"] == "resim_kaldir") {

            $gelen = $_POST;

            try {

                $resim_adi = basename($gelen["resim_adi"]);

                if(!empty($resim_adi)) {

                    $hedefKlasor = '../img/gallery/';
                    $hedefYol = '../img/eski_galeri/' . $resim_adi;

                    $geciciDosya = $hedefKlasor . $resim_adi;

                    if (copy($geciciDosya, $hedefYol)) {
                        $mesaj = "Dosya başarıyla yüklendi.";
                        unlink($geciciDosya);
                    } else {
                        $mesaj = "Dosya yükleme sırasında bir hata oluştu.";
                    }
                }else{
                    echo json_encode(["durum" => false]);
                }

                echo json_encode(["durum" => true]);
            } catch (Exception $e) {
                $hata = $e->getMessage();
                echo json_encode(["durum" => false]);
            }
        }

        if($_POST["action"] == "kategori_bilgi_getir") {

            $gelen = $_POST["data"];

            $id = $gelen["id"];

            try {
                $urun_bilgi = $con->rawQuery("select * from categories where id=? ", [$id])[0];

                echo json_encode($urun_bilgi);

            }catch (Exception $e){
                $hata = $e->getMessage();
                echo false;
            }
        }

    }


?>