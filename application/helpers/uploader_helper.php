<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function siapUnggah($userfile, $session){
    $CI =& get_instance(); //codeigniter tidak bisa memanggil library di helper, jadi gunakan ini
    
    if($_FILES[$userfile]['error']==0){ //ada file dipilih

        $data = $CI->session->userdata($session)[$userfile];//panggil isi di dalam session index userfile
        
        if(!empty($data['nama'])){// cek apakah nama file kosong
            unlink('document/' . $data['nama']); //hapus file yang ada di server
        }
        
        $upload_data = unggahin($userfile);//unggah file; 

        return $upload_data;

    }elseif($_FILES[$userfile]['error']==4){//tidak ada file dipilih, user tidak ingin mengubah file
        
        if(!empty($CI->session->userdata($session)[$userfile])) { //cek jika session $session sdh tersedia 
            $upload_data = $CI->session->userdata($session)[$userfile];// ambil data dalam session lalu masukkan kembali ke upload_data
        }else{
            $upload_data = ""; //kosongkan nilai
        }
        
    }else{ //error lainnya
        die('ERROR 404 NOT FOUND :(');
    }
    
    return $upload_data;
}

function unggahin($userfile){
    $CI =& get_instance(); //codeigniter tidak bisa memanggil library di helper, jadi gunakan ini
    
    //set config upload file
    $config = array(
        "upload_path"   => "./document",
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
    
    $data = array(
        'nama'        => $upload_data['upload_data']['file_name'],
        'jenis_file'  => $userfile,
        'tipe_file'   => $upload_data['upload_data']['file_type'],
        'ekstensi'    => $upload_data['upload_data']['file_ext'],
        'ukuran'      => $upload_data['upload_data']['file_size'],
        'tanggal'     => date('Y-m-d')
    );

    return $data ; //balikkan nilai
}



/* End of file uploader.php */

