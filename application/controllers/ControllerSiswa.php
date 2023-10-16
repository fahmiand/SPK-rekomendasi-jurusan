<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerSiswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in(4);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Siswa->json();
    }

    public function index()
    {
        $data['judul'] = 'Siswa';
        $data['user'] = $this->user->getUser();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/siswa/listSiswa');
        $this->load->view('admin/templates/footer');
    }

    public function edit_siswa($id)
    {
        $data_siswa = $this->Siswa->get_by_id($id);
        $data = [
            'aksi'          => 'edit',
            'action'        => site_url("controllerSiswa/edit_siswa_action"),
            'nisn'           => set_value("nisn", $data_siswa->id),
            'nama_lengkap'  => set_value("nama_lengkap", $data_siswa->name),
            'email' => set_value("email", $data_siswa->email),
            'role_id' => set_value("role_id", $data_siswa->role_id),
            'is_active'        => set_value("is_active", $data_siswa->is_active)
        ];
        $data['judul'] = 'Siswa';
        $data['user'] = $this->user->getUser();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/siswa/formSiswa', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit_siswa_action()
    {
        $nisn  = $this->input->post("nisn");

        $data = [
            'nama_lengkap'    => $this->input->post("nama_lengkap"),
            'tanggal_lahir'   => date('Y-m-d', strtotime($this->input->post("tanggal_lahir"))),
            'jenis_kelamin'   => $this->input->post("jenis_kelamin"),
            'alamat'          => $this->input->post("alamat"),
            'asal_sekolah'    => $this->input->post("asal_sekolah"),
        ];

        $this->Siswa->update_siswa($nisn, $data);


        $this->session->set_flashdata("flash_message", "Berhasil update data siswa.");
        redirect(site_url("controllerSiswa"));
    }

    public function hapus_siswa($nisn)
    {
        $data_siswa = $this->Siswa->get_by_id($nisn);
        if ($data_siswa) {
            $this->Siswa->delete_siswa($nisn);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data siswa.");
            redirect(site_url("controllerSiswa"));
        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data siswa.");
            redirect(site_url("controllerSiswa"));
        }
    }
}
