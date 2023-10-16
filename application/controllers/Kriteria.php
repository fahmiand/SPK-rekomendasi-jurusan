<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in(4);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->kriteria->json();
    }

    public function index()
    {
        $data = [
            'judul' => 'Kriteria',
            'user' => $this->user->getUser(),
            'kriteria' => $this->kriteria->get_kriteria(),
        ];
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/kriteria/listKriteria', $data);
        $this->load->view('admin/templates/footer');
    }
}
