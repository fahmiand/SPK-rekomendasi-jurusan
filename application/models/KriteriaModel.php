<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KriteriaModel extends CI_Model
{

    // datatables
    function json()
    {
        $this->datatables->select('a.id_kriteria , a.nama_kriteria, a.tipe');
        $this->datatables->from('kriteria as a');
        //add this line for join
        return $this->datatables->generate();
    }

    public function get_kriteria()
    {
        return $this->db->get('kriteria')->result_array();
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */