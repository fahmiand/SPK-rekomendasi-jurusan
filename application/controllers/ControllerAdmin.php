<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in(4);
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'user' => $this->user->getUser()
        ];
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/templates/footer', $data);
    }
}
