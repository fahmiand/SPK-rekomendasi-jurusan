<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAlternatif extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in(4);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Alternatif->json();
    }

    public function index()
    {
        $data['judul'] = 'Alternatif';
        $data['user'] = $this->user->getUser();
        $data['alternatif'] = $this->Alternatif->getAlternatif();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/alternatif/listAlternatif', $data);
        $this->load->view('admin/templates/footer');
    }

    public function insert_alternatif()
    {
        $data = [
            'aksi'                  => 'tambah',
            'action'                => site_url("ControllerAlternatif/insert_alternatif_action"),
            'id_alternatif'         => set_value("id_alternatif"),
            'jurusan'               => set_value("jurusan"),
            'kode_jurusan'          => set_value("kode_jurusan"),
            'user'                  => $this->user->getUser(),
            'judul'                 => 'Alternatif'
        ];
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/alternatif/formAlternatif', $data);
        $this->load->view('admin/templates/footer');
    }

    public function insert_alternatif_action()
    {
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required');
        $this->form_validation->set_message('required', '* {field} Harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $this->insert_alternatif();
        } else {

            $data = [
                'kode_jurusan'  => $this->input->post("kode_jurusan"),
                'jurusan'       => $this->input->post("jurusan"),
            ];

            $this->Alternatif->insert_alternatif($data);

            $this->session->set_flashdata("flash_message", "Berhasil tambah data alternatif.");
            redirect(site_url("ControllerAlternatif"));
        }
    }

    public function edit($id)
    {
        $data_alternatif = $this->Alternatif->get_by_id($id);
        $data = [
            'action'                => site_url("ControllerAlternatif/edit_alternatif_action"),
            'id_alternatif'         => set_value("id_alternatif", $data_alternatif->id_alternatif),
            'kode_jurusan'          => set_value("kode_jurusan", $data_alternatif->kode_jurusan),
            'jurusan'               => set_value("jurusan", $data_alternatif->jurusan),
            'user'                  => $this->user->getUser(),
            'judul'                 => 'Tambah Kriteria'
        ];
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/alternatif/formAlternatif', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function edit_alternatif_action()
    {
        $id_alternatif  = $this->input->post("id_alternatif");

        $data = [
            'kode_jurusan'     => $this->input->post("kode_jurusan"),
            'jurusan'          => $this->input->post("jurusan"),
        ];

        $this->Alternatif->update_alternatif($id_alternatif, $data);

        $this->session->set_flashdata("flash_message", "Berhasil update data alternatif.");
        redirect(site_url("ControllerAlternatif"));
    }

    public function hapus($id)
    {
        $data_alternatif = $this->Alternatif->get_by_id($id);

        if ($data_alternatif) {
            $this->Alternatif->delete_alternatif($id);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data alternatif.");
            redirect(site_url("ControllerAlternatif"));
        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data alternatif.");
            redirect(site_url("ControllerAlternatif"));
        }
    }
}
