<?php


class ArayuzDuzenleme
{
    public static function temizleTelefon($tel) {
        // Sadece rakamları al
        $sadeceRakam = preg_replace('/\D/', '', $tel);

        // Türkiye numarası için +90 veya 90 varsa baştan sil
        if (substr($sadeceRakam, 0, 2) == "90") {
            $sadeceRakam = substr($sadeceRakam, 2);
        }

        // Başına 0 ekle (yoksa)
        if (substr($sadeceRakam, 0, 1) != "0") {
            $sadeceRakam = "0" . $sadeceRakam;
        }

        return $sadeceRakam;
    }

}