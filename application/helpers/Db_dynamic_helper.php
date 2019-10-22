<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function switch_db_dynamic($tahun){
    $dynamic_db = array(
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'mosacc_tr_'.$tahun,
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => TRUE
    );
    return $dynamic_db;
}

/* End of file db_dynamic.php */

