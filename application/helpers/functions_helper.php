<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('date_generator')) {
    function date_generator($date){
        $date_split = explode("-", $date);
        switch ($date_split[1]) {
            case "01":
                $bulan = "Januari";
                break;
            case "02":
                $bulan = "Februari";
                break;
            case "03":
                $bulan = "Maret";
                break;
            case "04":
                $bulan = "April";
                break;
            case "05":
                $bulan = "Mei";
                break;
            case "06":
                $bulan = "Juni";
                break;
            case "07":
                $bulan = "Juli";
                break;
            case "08":
                $bulan = "Agustus";
                break;
            case "09":
                $bulan = "September";
                break;
            case "10":
                $bulan = "Oktober";
                break;
            case "11":
                $bulan = "November";
                break;
            case "12":
                $bulan = "Desember";
                break;
            default:
                echo "Wrong paramaters";
        }
        $tanggal = ltrim($date_split[2], '0');
        return "" . $tanggal . " " . $bulan . " " . $date_split[0];
    }
}
