<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubKriteriaModel extends CI_Model
{

    // datatables
    function json()
    {
        $this->datatables->select('a.kode_jurusan, b.jurusan, a.c1, a.c2, a.c3, a.c4');
        $this->datatables->from('sub_kriteria as a');
        //add this line for join
        $this->datatables->join('jurusan as b', 'a.kode_jurusan=b.kode_jurusan', 'left');
        $this->datatables->add_column('action', anchor(site_url('ControllerSubKriteria/edit_sub_kriteria/$1'), '<i class="fas fa-edit"></i> Edit', 'class="btn btn-success" title="Edit Data"') . " " . anchor(site_url('ControllerSubKriteria/hapus_sub_kriteria/$1'), '<i class="fa fa-archive"></i> Hapus', 'data-nama="$2" class="btn btn-danger hapus" title="Hapus Data"'), 'kode_jurusan');
        return $this->datatables->generate();
    }

    public function getSubkriteria()
    {

        $query = "SELECT sub_kriteria.*, jurusan.*
                    FROM sub_kriteria JOIN jurusan
                    on sub_kriteria.kode_jurusan = jurusan.kode_jurusan";
        return $this->db->query($query)->result_array();
    }

    function allJurusan()
    {
        return $this->db->get("jurusan")->result();
    }

    function get_by_id($kode)
    {
        return $this->db->get_where("sub_kriteria", array("kode_jurusan" => $kode))->row();
    }

    function insert($data)
    {
        $this->db->insert("sub_kriteria", $data);
    }

    function allBobot()
    {
        return $this->db->get("bobot")->result();
    }

    function update($id, $data)
    {
        $this->db->where("id_sub_kriteria", $id);
        $this->db->update("sub_kriteria", $data);
    }

    function delete($id)
    {
        $this->db->where("kode_jurusan", $id);
        $this->db->delete("sub_kriteria");
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */