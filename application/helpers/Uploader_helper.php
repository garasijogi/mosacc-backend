<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function siapUnggah($userfile){
    $CI =& get_instance(); //codeigniter tidak bisa memanggil library di helper, jadi gunakan ini
    
    if($_FILES[$userfile]['error']==0){ //ada file dipilih
        
        $data = $CI->session->userdata('profil_form');
        
        if(!empty($data[$userfile])){
            unlink('document/temp/' . $data[$userfile]); //isi dengan nama yang sudah ada di session
        }
        
        $upload_data = unggahTemp($userfile);//unggah file temporary   
        
    }else if($_FILES[$userfile]['error']==4){//tidak ada file dipilih, user tidak ingin mengubah file
        
        if($CI->session->userdata('profil_form')) { //cek jika session profil_form sdh tersedia 
            $data = $CI->session->userdata('profil_form');
            $upload_data = $data[$userfile]; //isi dengan nama yang sudah ada di session
        }else{
            $upload_data = ""; //kosongkan nilai
        }
        
    }else{ //error lainnya
        print_r("ERROR FILE ");
        exit();
    }
    
    return $upload_data;
}

function unggahTemp($userfile){
    $CI =& get_instance(); //codeigniter tidak bisa memanggil library di helper, jadi gunakan ini
    
    //set config upload file
    $config = array(
        "upload_path"   => "./document/temp",
        "allowed_types" => "pdf|doc|docx|ppt|pptx|xps|odt|xls|xlsx|wps",
        "max_size"      => "32384"
    );
    $CI->load->library('upload', $config);//load library upload
    //upload file
    if ($CI->upload->do_upload($userfile)){
        //ambil data upload jika berhasi;
        $upload_data = array('upload_data' => $CI->upload->data());
    }else{
        //ambil data error jika gagal;
        $upload_data = array('error' => $CI->upload->display_errors());
    }
    
    return $upload_data['upload_data']['file_name']; //balikkan nilai
}



/* End of file uploader.php */

