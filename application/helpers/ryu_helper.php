<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function tableList(){//buat ngambil value nama tabel
    return array(
        'tr11_penerimaan_tidak_terikat_pending',
        'tr12_penerimaan_terikat_pending',
        'tr21_pembelian_pending',
        'tr22_beban_pending',
        'tr23_renov_bangun_pending'
    );
}

function multiArraySort($key){//buat ngesort secara descending dri yg terbesar
    return function ($a, $b) use ($key){
        return strnatcmp($b[$key], $a[$key]);
    };
}