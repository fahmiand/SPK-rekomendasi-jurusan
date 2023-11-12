<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilModel extends CI_Model
{

    function allSiswa()
    {
        return $this->db->get("user")->result();
    }

    function get_proses_hitung($id)
    {
        $this->db->select("s, proses_hitung.id_user, proses_hitung.kode_jurusan, user.name");
        $this->db->from("proses_hitung");
        $this->db->join("user", "proses_hitung.id_user=user.id");
        if (!empty($id)) {
            $this->db->where("proses_hitung.id_user", $id);
        }

        return $this->db->get()->result();
    }

    function getUserHasilById($id)
    {
        $this->db->join('user', 'user.id = hasil.id_user');
        $query = $this->db->get_where('hasil', array('id_user' => $id))->result_array();
        return $query;
    }

    function getUserHasil()
    {
        $this->db->select('*');
        $this->db->from('hasil');
        $this->db->join('user', 'hasil.id_user = user.id', 'left');
        return $this->db->get()->result_array();
    }

    function get_data_hasil()
    {
        $this->db->select('a.*, b.*');
        $this->db->from("hasil as a");
        $this->db->join("user as b", "a.id_user=b.id");
        return $this->db->get()->result();
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */