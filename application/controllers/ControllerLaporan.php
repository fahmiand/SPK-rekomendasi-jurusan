<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerLaporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in(5);
    }

    public function json_hasil()
    {
        $id = $this->input->post('id_user');
        header('Content-Type: application/json');
        echo $this->Hasil->getUserHasil($id);
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $data = [
            'judul' => 'History',
            'user' => $this->user->getUser(),
            'hasil' => $this->Hasil->getUserHasilById($id)
        ];
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/laporan/listLaporan', $data);
        $this->load->view('users/templates/footer');
    }

    public function indexAdmin()
    {
        $data = [
            'judul' => 'Laporan Hasil',
            'user' => $this->user->getUser(),
            'hasil' => $this->Hasil->getUserHasil()
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/hasil', $data);
        $this->load->view('admin/templates/footer', $data);
    }
}
