<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('status') == NULL) {
            redirect('homepage');
        }
        //ambil tahun dari sistem
        $dynamic_tahun = date("Y");
        //load settingan database dynamic ke fungsi di helper db dynamic switcher 
        $dynamic_db = switch_db_dynamic($dynamic_tahun);
        //load model yang akan digunakan
        $this->load->model('dashboard_m');
        //taruh settingan database dalam array
        $this->dashboard_m->app_db = $this->load->database($dynamic_db, TRUE);
        
        //Helper Loader
        $this->load->helper('Ryu_helper');
    }
    
    public function index(){
        //get nama tabel
        $tableList = tableList();
        // print_r($tableList);
        // exit();
        
        //list bulan
        $bulan = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
        
        //ambil data dan count setiap bulan pada masing-masing table
        $x = 0;
        foreach($bulan as $b){
            foreach ($tableList as $value) { // get sum per table
                if ($value == 'tr21_pembelian_pending') {
                    $hasil[$x] =  $this->dashboard_m->getSumPerMonth2($value, $b); //khusus buat tabel tr21 karena tabel nominal jadi total_harga
                } else {
                    $hasil[$x] =  $this->dashboard_m->getSumPerMonth($value, $b);
                }
                $x++;
            }
        }
        
        //ambil kode akun dari table rules
        $kd_akun = $this->dashboard_m->getKdakun();
        //ambil data sum dari berbagai akun di tabel tertentu
        
        // foreach ($tableList as $value) {
        //     foreach ($kd_akun as $v) { // setiap perulangan kd_akun
        //         foreach($bulan as $b){ 
        //             //setiap perulangan table
        //             if ($value == 'tr21_pembelian_pending') {
        //                 $hasil2[$x] = $this->dashboard_m->getSumPerAkun2($value, $v['kd_akun'], $b); //khusus buat tabel tr21 karena tabel nominal jadi total_harga
        //             } else {
        //                 $hasil2[$x] = $this->dashboard_m->getSumPerAkun($value, $v['kd_akun'], $b);
        //             }
        //             $x++;
        //         }
        //     }
        // }
        
        //ambil kode akun grupin jadi pertabel
        $tabel1 = ($this->dashboard_m->getOneKdAkun('11'));
        $tabel2 = ($this->dashboard_m->getOneKdAkun('12'));
        $tabel3 = ($this->dashboard_m->getOneKdAkun('21'));
        $tabel4 = ($this->dashboard_m->getOneKdAkun('22'));
        $tabel5 = ($this->dashboard_m->getOneKdAkun('23'));
        //ambil sum dari tabel tr11_penerimaan_tidak_terikat_pending
        $x = 0;
        foreach ($tabel1 as $v) { // setiap perulangan kd_akun
            foreach($bulan as $b){ 
                //setiap perulangan table
                $penerimaan1[$x] = $this->dashboard_m->getSumPerAkun('tr11_penerimaan_tidak_terikat_pending', $v['kd_akun'], $v['nama_sub'], $b);
                $x++;
            }
        }
        //ambil sum dari tabel tr12_penerimaan_terikat_pending
        $x = 0;
        foreach ($tabel2 as $v) { // setiap perulangan kd_akun
            foreach($bulan as $b){ 
                //setiap perulangan table
                $penerimaan2[$x] = $this->dashboard_m->getSumPerAkun('tr12_penerimaan_terikat_pending', $v['kd_akun'], $v['nama_sub'], $b);
                $x++;
            }
        }
        //ambil sum dari tabel tr21_pembelian_pending
        $x = 0;
        foreach ($tabel3 as $v) { // setiap perulangan kd_akun
            foreach($bulan as $b){ 
                //setiap perulangan table
                $pengeluaran1[$x] = $this->dashboard_m->getSumPerAkun2('tr21_pembelian_pending', $v['kd_akun'], $v['nama_sub'], $b);
                $x++;
            }
        }
        //ambil sum dari tabel tr22_beban_pending
        $x = 0;
        foreach ($tabel4 as $v) { // setiap perulangan kd_akun
            foreach($bulan as $b){ 
                //setiap perulangan table
                $pengeluaran2[$x] = $this->dashboard_m->getSumPerAkun('tr22_beban_pending', $v['kd_akun'], $v['nama_sub'], $b);
                $x++;
            }
        }
        //ambil sum dari tabel tr23_renov_bangun_pending
        $x = 0;
        foreach ($tabel5 as $v) { // setiap perulangan kd_akun
            foreach($bulan as $b){ 
                //setiap perulangan table
                $pengeluaran3[$x] = $this->dashboard_m->getSumPerAkun('tr23_renov_bangun_pending', $v['kd_akun'], $v['nama_sub'], $b);
                $x++;
            }
        }

        // foreach($hasil as $v){
        //     print_r($v);
        //     echo "<br>";
        // }

        // echo "<br>";
        // echo "<br>";

        // foreach($penerimaan as $v){
        //     print_r($v);
        //     echo '<br>';
        // }

        // echo '<br>';
        // echo '<br>';

        // foreach($pengeluaran as $v){
        //     print_r($v);
        //     echo '<br>';
        // }
        
        //DATA BUAT CHART PENERIMAAN=======================================================================
        //gabungin array penerimaan dan pengeluaran
        $sa_penerimaan_full = array_merge($penerimaan1, $penerimaan2);
        $sa_pengeluaran_full = array_merge($pengeluaran1, $pengeluaran2, $pengeluaran3);

        //pisahkan array per akun
        $sum_akun_penerimaan_parted = array_chunk($sa_penerimaan_full, 12, false);
        $sum_akun_pengeluaran_parted = array_chunk($sa_pengeluaran_full, 12, false);
        
        //ambil array jumlah di value dan masukkan ke variabel data
        foreach($sum_akun_penerimaan_parted as $key1 => $value1){
            foreach($value1 as $key2 => $value2){
                $data['sum_akun_penerimaan'][$key1][$key2] = $value2['jumlah'];
            }
        }
        foreach($sum_akun_pengeluaran_parted as $key1 => $value1){
            foreach($value1 as $key2 => $value2){
                $data['sum_akun_pengeluaran'][$key1][$key2] = $value2['jumlah'];
            }
        }

        // foreach($sum_akun_pengeluaran_parted as $k => $v){
        //     print_r($k);
        //     print_r($v);
        //     echo "<br>";
        //     echo "<br>";
        // }

        // masukkan dalam database [WARNING : LAMA DAH Prosesnya] ===========================================
        // $increment = 1;
        // $this->dashboard_m->insertSum('sum-tabel', $hasil, $increment);        

        // $increment = 1;
        // $increment = $this->dashboard_m->insertSum('sum-kd_akun', $penerimaan1, $increment);
        // $increment = $this->dashboard_m->insertSum('sum-kd_akun', $penerimaan2, $increment);
        // $increment = $this->dashboard_m->insertSum('sum-kd_akun', $pengeluaran1, $increment);
        // $increment = $this->dashboard_m->insertSum('sum-kd_akun', $pengeluaran2, $increment);
        // $increment = $this->dashboard_m->insertSum('sum-kd_akun', $pengeluaran3, $increment);
        // ==================================================================================================

        // exit;
        // foreach($hasil as $v){
        //     print_r($v);
        //     echo "<br>";
        // }
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";

        //Mensummin SUM PENERIMAAN, PENGELUARAN< DAN SALDO =========================================================================================
        //siapkan buat indexing
        $i=0;
        $j=0;
        //pisahkan data yang ingin disum
        foreach($hasil as $v){
            if ($v['tabel']=='tr11_penerimaan_tidak_terikat_pending'){
                $sum_penerimaan1[$i]=$v;
                $i++;
            } elseif ($v['tabel']=='tr12_penerimaan_terikat_pending'){
                $sum_penerimaan2[$j]=$v;
                $j++;
            }
        }
        //bungkus penerimaan dalam array
        $counter = count($sum_penerimaan1);
        for($x=0;$x<$counter;$x++){
            $data['sum_penerimaan'][$x] = $sum_penerimaan1[$x]['jumlah']+$sum_penerimaan2[$x]['jumlah'];
        }
        //siapkan buat indexing
        $i=0;
        $j=0;
        $k=0;
        //pisahkan data yang ingin disum
        foreach($hasil as $v){
            if ($v['tabel']=='tr21_pembelian_pending'){
                $sum_pengeluaran1[$i]=$v;
                $i++;
            } elseif ($v['tabel']=='tr22_beban_pending'){
                $sum_pengeluaran2[$j]=$v;
                $j++;
             }elseif ($v['tabel']=='tr23_renov_bangun_pending'){
                $sum_pengeluaran3[$k]=$v;
                $k++;
            }
        }
        //bungkus pengeluaran dalam array
        $counter = count($sum_pengeluaran1);
        for($x=0;$x<$counter;$x++){
            $data['sum_pengeluaran'][$x] = $sum_pengeluaran1[$x]['jumlah']+$sum_pengeluaran2[$x]['jumlah']+$sum_pengeluaran3[$x]['jumlah'];
        }
        //siapkan data untuk saldo dengan mengurangi sum_penerimaan dan sum_pengeluaran
        for($x=0;$x<$counter;$x++){
            $data['sum_saldo'][$x] = $data['sum_penerimaan'][$x] - $data['sum_pengeluaran'][$x];
        }

        //MEMBUAT DATA bulan UNTUK TABEL =============================================================================================================
        //bungkus data bulan angka
        for($x=0;$x<$counter;$x++){
            $data['bulan'][$x] = $sum_pengeluaran1[$x]['bulan'];
        }
        //ubah bentuk bulan dari nomor jadi nama bulan
        foreach($data['bulan'] as $k => $v){
            $bulan_name[$k] = month_generator($v);
        }
        
        //gabungkan bulan dan jumlah untuk data tabel saldo ============================================================================================
        for($x=0;$x<$counter;$x++){
            $data['tabel_data_saldo'][$x] = array(
                'jumlah' => $data['sum_saldo'][$x],
                'bulan'  => $bulan_name[$x]
            );
        }
        //siapkan data untuk penerimaan dan pengeluaran
        for($x=0;$x<$counter;$x++){
            $sum_penerimaan[$x] = array(
                'jumlah' => $data['sum_penerimaan'][$x],
                'bulan'  => $bulan[$x]
            );
            $sum_pengeluaran[$x] = array(
                'jumlah' => $data['sum_pengeluaran'][$x],
                'bulan'  => $bulan[$x]
            );
        }

        // print_r($sum_pengeluaran);
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // print_r(str_pad(date('m')-1, 2, "0", STR_PAD_LEFT));

        //SIAPKAN DATA BUAT DI TAB
        //ambil data penerimaan pada bulan ini dan bulan lalu lalu cari rasionya ============================================================================
        for($x=0;$x<$counter;$x++){
            //ambil jumlah di bulan ini
            if($sum_penerimaan[$x]['bulan'] == str_pad(date('m'), 2, "0", STR_PAD_LEFT)){
                $tab_data_penerimaan['bulan_ini'] = $sum_penerimaan[$x]['jumlah'];
            }
            //ambil jumlah di bulan lalu
            if($sum_penerimaan[$x]['bulan'] == str_pad(date('m')-1, 2, "0", STR_PAD_LEFT)){
                $tab_data_penerimaan['bulan_lalu'] = $sum_penerimaan[$x]['jumlah'];
            }
        }
        //bandingkan penerimaan bulan ini dan bulan lalu
        if($tab_data_penerimaan['bulan_ini']==0){
            $tab_data_penerimaan['rasio'] = ($tab_data_penerimaan['bulan_ini'] / $tab_data_penerimaan['bulan_lalu'])*100;
        }else{
            $tab_data_penerimaan['rasio'] = ($tab_data_penerimaan['bulan_lalu'] / $tab_data_penerimaan['bulan_ini'])*-100;
        }
        

        //ambil data penerimaan pada bulan ini dan bulan lalu lalu cari rasionya ============================================================================
        for($x=0;$x<$counter;$x++){
            //ambil jumlah di bulan ini
            if($sum_pengeluaran[$x]['bulan'] == str_pad(date('m'), 2, "0", STR_PAD_LEFT)){
                $tab_data_pengeluaran['bulan_ini'] = $sum_pengeluaran[$x]['jumlah'];
            }
            //ambil jumlah di bulan lalu
            if($sum_pengeluaran[$x]['bulan'] == str_pad(date('m')-1, 2, "0", STR_PAD_LEFT)){
                $tab_data_pengeluaran['bulan_lalu'] = $sum_pengeluaran[$x]['jumlah'];
            }
        }
        //bandingkan penerimaan bulan ini dan bulan lalu
        if($tab_data_pengeluaran['bulan_ini']==0){
            $tab_data_pengeluaran['rasio'] = ($tab_data_pengeluaran['bulan_ini'] / $tab_data_pengeluaran['bulan_lalu'])*100;
        }else{
            $tab_data_pengeluaran['rasio'] = ($tab_data_pengeluaran['bulan_lalu'] / $tab_data_pengeluaran['bulan_ini'])*-100;
        }
        

        //ambil data saldo pada bulan ini dan bulan lalu cari solusinya =====================================================================================
        $tab_data_saldo['bulan_ini'] = $tab_data_penerimaan['bulan_ini'] - $tab_data_pengeluaran['bulan_ini'];
        $tab_data_saldo['bulan_lalu']= $tab_data_penerimaan['bulan_lalu'] - $tab_data_pengeluaran['bulan_lalu'];
        if($tab_data_saldo['bulan_ini']==0){
            $tab_data_saldo['rasio'] = ($tab_data_saldo['bulan_ini'] / $tab_data_saldo['bulan_lalu']) * 100;
        }else{
            $tab_data_saldo['rasio'] = ($tab_data_saldo['bulan_lalu'] / $tab_data_saldo['bulan_ini']) * -100;
        }

        //bungkus data tab
        $data['tab_data_penerimaan']  = $tab_data_penerimaan;
        $data['tab_data_pengeluaran'] = $tab_data_pengeluaran;
        $data['tab_data_saldo']       = $tab_data_saldo;

        //UNTUK DATA TABEL PENERIMAAN DAN PENGELUARAN =============================================================================
        foreach($sum_akun_penerimaan_parted as $key1 => $value1){
            $tabel_data_penerimaan[$key1]['nama_sub'] = $value1[0]['nama_sub'];
            $tabel_data_penerimaan[$key1]['jumlah'] = 0;
            foreach($value1 as $key2 => $value2){
                $tabel_data_penerimaan[$key1]['jumlah'] += $value2['jumlah'];
            }
        }
        foreach($sum_akun_pengeluaran_parted as $key1 => $value1){
            $tabel_data_pengeluaran[$key1]['nama_sub'] = $value1[0]['nama_sub'];
            $tabel_data_pengeluaran[$key1]['jumlah'] = 0;
            foreach($value1 as $key2 => $value2){
                $tabel_data_pengeluaran[$key1]['jumlah'] += $value2['jumlah'];
            }
        }

        //UNTUK DATA DI TABLE CHART disort ===============================================================================================
        //sort array dari yg terbesar
        usort($data['tabel_data_saldo'], multiArraySort('jumlah'));
        usort($tabel_data_penerimaan, multiArraySort('jumlah'));
        usort($tabel_data_pengeluaran, multiArraySort('jumlah'));
        

        //bungkus 5 array ke dalam data
        for($x=0;$x<10;$x++){
            $data['tabel_data_penerimaan'][$x] = $tabel_data_penerimaan[$x];
            $data['tabel_data_pengeluaran'][$x]= $tabel_data_pengeluaran[$x];
        }

        // print_r($data['tabel_data_penerimaan']);

        //sort array buat data di tabel

        //data untuk di tab chart
        
        $this->load->view('acc/dashboard_v', $data);
    }
    
    function exit_mosacc() {
        $this->execInBackground('start cmd.exe @cmd /k "taskkill /IM chrome.exe"');
        $this->execInBackground('start cmd.exe @cmd /k ""C:\xampp1\xampp_stop.exe""');
        $this->execInBackground('cmd.exe @cmd /k "taskkill /F /IM cmd.exe"');
    }
    
    function execInBackground($cmd) {
        if (substr(php_uname(), 0, 7) == "Windows") {
            pclose(popen("start /B " . $cmd, "r"));
        } else {
            exec($cmd . " > /dev/null &");
        }
    }

    function about_us()
    {
        $this->load->view('acc/about_us_v.php');
    }
}
/* End of file  index.php */
