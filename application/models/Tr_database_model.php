<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tr_database_model extends CI_Model
{

    // gunakan $this->app_db instead $->db untuk mengakses database transaksi
    public $app_db;

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    public function create_tr_db($tahun)
    {
        $result = $this->db->get_where('tr_database', array('id_db' => $tahun))->result();
        if ($result == NULL) {
            $data = array(
                'id_db' => $tahun,
                'nama_db' => 'mosacc_tr_' . $tahun,
                'tahun' => $tahun
            );
            $this->db->insert('tr_database', $data);
        }
    }

    function get_year_list()
    {
        $result = $this->db->get('tr_database');
        return $result;
    }

    // ------------------------------------------------------------------------

}

/* End of file Rules_model.php */
/* Location: ./application/models/Rules_model.php */
