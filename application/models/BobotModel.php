<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BobotModel extends CI_Model
{

    // datatables
    function json()
    {
        $this->datatables->select('a.id_bobot, a.tingkat_kepentingan, a.nilai_bobot');
        $this->datatables->from('bobot as a');
        //add this line for join
        $this->datatables->add_column(
            'action',
            anchor(
                site_url('controllerBobot/edit_bobot/$1'),
                '<i class="fas fa-edit"></i> Edit',
                'class="btn btn-success" title="Edit Data"'
            ) . " " . anchor(
                site_url('controllerBobot/hapus_bobot/$1'),
                '<i class="fa fa-archive"></i> Hapus',
                'data-nama_bobot="$2" class="btn btn-danger hapus" title="Hapus Data"'
            ),
            'id_bobot,tingkat_kepentingan'
        );
        return $this->datatables->generate();
    }

    function insert_bobot($data)
    {
        $this->db->insert('bobot', $data);
    }

    function get_by_id($nis)
    {
        $this->db->where('id_bobot', $nis);
        return $this->db->get("bobot")->row();
    }

    function update_bobot($nis, $data)
    {
        $this->db->where("id_bobot", $nis);
        $this->db->update("bobot", $data);
    }

    function delete_bobot($nis)
    {
        $this->db->where("id_bobot", $nis);
        $this->db->delete("bobot");
    }

    public function getBobot()
    {
        return $this->db->get('bobot')->result_array();
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */