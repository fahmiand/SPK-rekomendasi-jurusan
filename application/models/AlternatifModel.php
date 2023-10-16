<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AlternatifModel extends CI_Model
{

    // datatables
    function json()
    {
        $this->datatables->select('a.id_alternatif, a.jurusan, a.kode_jurusan');
        $this->datatables->from('jurusan as a');
        //add this line for join
        $this->datatables->add_column('action', anchor(site_url('ControllerAlternatif/edit_alternatif/$1'), '<i class="fas fa-edit"></i> Edit', 'class="btn btn-success" title="Edit Data"') . " " . anchor(site_url('ControllerAlternatif/hapus_alternatif/$1'), '<i class="fa fa-archive"></i> Hapus', 'data-nama_bobot="$2" class="btn btn-danger hapus" title="Hapus Data"'), 'id_alternatif,jurusan');
        return $this->datatables->generate();
    }

    public function getAlternatif()
    {
        return $this->db->get('jurusan')->result_array();
    }

    function insert_alternatif($data)
    {
        $this->db->insert('jurusan', $data);
    }

    function get_by_id($nis)
    {
        $this->db->where('id_alternatif', $nis);
        return $this->db->get("jurusan")->row();
    }

    function update_alternatif($nis, $data)
    {
        $this->db->where("id_alternatif", $nis);
        $this->db->update("jurusan", $data);
    }

    function delete_alternatif($nis)
    {
        $this->db->where("id_alternatif", $nis);
        $this->db->delete("jurusan");
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */