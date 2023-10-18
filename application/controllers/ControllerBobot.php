<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerBobot extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in(4);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Bobot->json();
    }

    public function index()
    {
        $data = [
            'judul' => 'Bobot',
            'user' => $this->user->getUser(),
            'bobot' => $this->Bobot->getBobot(),
        ];
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/bobot/listBobot', $data);
        $this->load->view('admin/templates/footer');
    }

    public function insert_bobot()
    {
        $data = [
            'aksi'                  => 'tambah',
            'action'                => site_url("controllerBobot/insert_bobot_action"),
            'id_bobot'              => set_value("id_bobot"),
            'tingkat_kepentingan'   => set_value("tingkat_kepentingan"),
            'nilai_bobot'           => set_value("nilai_bobot"),
            'user' => $this->user->getUser(),
            'judul' => 'Tambah Bobot'
        ];
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/bobot/formBobot', $data);
        $this->load->view('admin/templates/footer');
    }

    public function insert_bobot_action()
    {
        $this->form_validation->set_rules('tingkat_kepentingan', 'tingkat_kepentingan', 'required');
        $this->form_validation->set_rules('nilai_bobot', 'nilai_bobot', 'required|numeric|less_than_equal_to[5]');
        $this->form_validation->set_message('required', '* {field} Harus diisi');
        $this->form_validation->set_message('numeric', '* {field} Harus berupa angka');
        $this->form_validation->set_message('less_than_equal_to', 'nilai tidak boleh lebih dari 5');

        if ($this->form_validation->run() == FALSE) {
            $this->insert_bobot();
        } else {

            $data = [
                'tingkat_kepentingan'  => $this->input->post("tingkat_kepentingan"),
                'nilai_bobot'          => $this->input->post("nilai_bobot"),
            ];

            $this->Bobot->insert_bobot($data);

            $this->session->set_flashdata("flash_message", "Berhasil tambah data bobot.");
            redirect(site_url("controllerBobot"));
        }
    }

    public function edit($id)
    {
        $data_bobot = $this->Bobot->get_by_id($id);
        $data = [
            'action'                => site_url("controllerBobot/edit_bobot_action"),
            'id_bobot'              => set_value("id_bobot", $data_bobot->id_bobot),
            'tingkat_kepentingan'   => set_value("tingkat_kepentingan", $data_bobot->tingkat_kepentingan),
            'nilai_bobot'           => set_value("nilai_bobot", $data_bobot->nilai_bobot),
        ];
        $data['judul'] = 'Bobot';
        $data['user'] = $this->user->getUser();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/bobot/formBobot', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit_bobot_action()
    {
        $this->form_validation->set_rules('tingkat_kepentingan', 'tingkat_kepentingan', 'required');
        $this->form_validation->set_rules('nilai_bobot', 'nilai_bobot', 'required|numeric|less_than_equal_to[5]');
        $this->form_validation->set_message('required', '* {field} Harus diisi');
        $this->form_validation->set_message('numeric', '* {field} Harus berupa angka');
        $this->form_validation->set_message('less_than_equal_to', '* {field} Harus lebih dari 5');
        $id_bobot  = $this->input->post("id_bobot");
        if ($this->form_validation->run() == FALSE) {
            $this->edit($id_bobot);
        } else {
            $data = [
                'tingkat_kepentingan'  => $this->input->post("tingkat_kepentingan"),
                'nilai_bobot'          => $this->input->post("nilai_bobot"),
            ];

            $this->Bobot->update_bobot($id_bobot, $data);

            $this->session->set_flashdata("flash_message", "Berhasil update data bobot.");
            redirect(site_url("controllerBobot"));
        }
    }

    public function hapus($id)
    {
        $data_bobot = $this->Bobot->get_by_id($id);

        if ($data_bobot) {
            $this->Bobot->delete_bobot($id);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data bobot.");
            redirect(site_url("controllerBobot"));
        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data bobot.");
            redirect(site_url("controllerBobot"));
        }
    }
}
