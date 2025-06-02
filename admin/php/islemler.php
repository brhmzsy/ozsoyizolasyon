<?php

	session_start();
    include ("connection.php");

    require_once __DIR__ . '/../../vendor/autoload.php';

    global $con;

    $con = new MysqliDb('localhost', 'root', '!MySql8?.', 'ozsoy_izolasyon');

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

        if($_POST["action"] == "urun_kaydet") {

            $gelen = $_POST;

            $stok_id = $gelen["stok_id"];
            $stok_adi = $gelen["stok_adi"];
            $stok_turu = $gelen["stok_turu"];
            $serisi = $gelen["serisi"];
            $stok_kodu = $gelen["stok_kodu"];
            $kasa_kalinligi = $gelen["kasa_kalinligi"];
            $kasa_renk = $gelen["kasa_renk"];
            $kanat_olcu = $gelen["kanat_olcu"];
            $kanat_renk = $gelen["kanat_renk"];
            $kol_modeli = $gelen["kol_modeli"];
            $montaj = $gelen["montaj"];
            $cam = $gelen["cam"];
            $birim_fiyat = $gelen["birim_fiyat"];
            $iskonto_1_oran = $gelen["iskonto_1_oran"];
            $kdv_oran = $gelen["kdv_oran"];
            $aciklama = $gelen["aciklama"];

            if(!is_numeric($birim_fiyat))
                $birim_fiyat = 0;

            if(!is_numeric($iskonto_1_oran))
                $iskonto_1_oran = 0;

            if(!is_numeric($kdv_oran))
                $kdv_oran = 0;;

            if(is_numeric($stok_id)) {

                try {

                    if(isset($_FILES["resim"]) && $_FILES["resim"]['error'] == 0) {

                        switch ($stok_turu){
                            case 2:
                                $klasor_adi = "plastik-profil";
                                break;
                            case 3:
                                $klasor_adi = "kapi";
                                break;
                            default:
                                $klasor_adi = "hazir-profil";
                                break;
                        }

                        $hedefKlasor = '../../content/print3/images/'.$klasor_adi."/";

                        // Geçici dosya yolunu al


                        $geciciDosya = $_FILES["resim"]['tmp_name'];

                        // Dosya adını al
                        $dosyaAdi = $_FILES["resim"]['name'];

                        // Hedef klasör yolunu ve dosya adını birleştirerek hedef yol oluştur
                        $hedefYol = $hedefKlasor . $dosyaAdi;

                        // Dosyayı hedef yola taşı
                        if(copy($geciciDosya, $hedefYol)) {
                            $mesaj = "Dosya başarıyla yüklendi.";
                        } else {
                            $mesaj = "Dosya yükleme sırasında bir hata oluştu.";
                        }
                    } else {
                        $mesaj = "Dosya yükleme hatası: " . $_FILES["resim"]['error'];
                    }


                    if ($stok_id == 0) {
                        mysqli_query($con, "insert into products (type, name, kod, size, price1, price2, price3, 
                                    language, kasa_kalinligi, kasa_renk, kanat_olcu, kanat_renk, kol_modeli, montaj, cam, 
                                    iskonto_1_oran, kdv_oran, aciklama) values('$stok_turu', '$stok_adi', '$serisi', '$stok_kodu', 
                                    '$birim_fiyat', '$birim_fiyat', '$birim_fiyat', 'tr', '$kasa_kalinligi', '$kasa_renk', 
                                    '$kanat_olcu', '$kanat_renk', '$kol_modeli', '$montaj', '$cam', '$iskonto_1_oran', 
                                    '$kdv_oran', '$aciklama')");

                        $stok_id = mysqli_insert_id($con);
                    } else {
                        mysqli_query($con, "update products set type='$stok_turu', name='$stok_adi', kod='$serisi', 
                                    size='$stok_kodu', price1='$birim_fiyat', price2='$birim_fiyat', price3='$birim_fiyat', 
                                    kasa_kalinligi='$kasa_kalinligi', kasa_renk='$kasa_renk', kanat_olcu='$kanat_olcu', 
                                    kanat_renk='$kanat_renk', kol_modeli='$kol_modeli', montaj='$montaj', cam='$cam', 
                                    iskonto_1_oran='$iskonto_1_oran', kdv_oran='$kdv_oran', aciklama='$aciklama' where id='$stok_id'");
                    }

                    if(!empty($dosyaAdi))
                        mysqli_query($con, "update products set images='$dosyaAdi' where id='$stok_id' ");

                    echo json_encode(["durum" => true]);
                } catch (Exception $e) {
                    $hata = $e->getMessage();
                    echo json_encode(["durum" => false]);
                }
            }else
                echo json_encode(["durum" => false]);
        }
    }


?>