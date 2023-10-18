<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerSubKriteria extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in(4);
        $this->load->library('form_validation');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->SubKriteria->json();
    }

    public function index()
    {
        $data = [
            'judul' => 'SubKriteria',
            'user' => $this->user->getUser(),
            'subkriteria' => $this->Subkriteria->getSubkriteria(),
        ];
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/sub_kriteria/listSubKriteria', $data);
        $this->load->view('admin/templates/footer');
    }

    public function insert_sub_kriteria()
    {
        $data = [
            'aksi'                  => 'tambah',
            'action'                => site_url("ControllerSubKriteria/insert_sub_kriteria_action"),
            'id_sub_kriteria'       => set_value("id_sub_kriteria"),
            'kode_jurusan'          => set_value("kode_jurusan"),
            'c1'                    => set_value("c1"),
            'c2'                    => set_value("c2"),
            'c3'                    => set_value("c3"),
            'c4'                    => set_value("c4"),
            'c5'                    => set_value("c5"),
            'c6'                    => set_value("c6"),
            'c7'                    => set_value("c7"),
            'c8'                    => set_value("c8"),
            'c9'                    => set_value("c9"),
            'c10'                    => set_value("c10"),
            'allJurusan'            => $this->Subkriteria->allJurusan(),
            'allBobot'              => $this->Subkriteria->allBobot(),
        ];
        $data['judul'] = 'SubKriteria';
        $data['user'] = $this->user->getUser();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/sub_kriteria/formSubKriteria', $data);
        $this->load->view('admin/templates/footer');
    }

    public function insert_sub_kriteria_action()
    {
        $this->form_validation->set_rules('kode_jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('c1', 'C1', 'required');
        $this->form_validation->set_rules('c2', 'C2', 'required');
        $this->form_validation->set_rules('c3', 'C3', 'required');
        $this->form_validation->set_rules('c4', 'C4', 'required');
        $this->form_validation->set_rules('c5', 'C5', 'required|numeric|less_than_equal_to[100]', [
            'numeric' => 'Nilai harus berupa angka',
            'less_than_equal_to' => 'Nilai maksimal 100'
        ]);
        $this->form_validation->set_rules('c6', 'C6', 'required|numeric|less_than_equal_to[100]', [
            'numeric' => 'Nilai harus berupa angka',
            'less_than_equal_to' => 'Nilai maksimal 100'
        ]);
        $this->form_validation->set_rules('c7', 'C7', 'required|numeric|less_than_equal_to[100]', [
            'numeric' => 'Nilai harus berupa angka',
            'less_than_equal_to' => 'Nilai maksimal 100'
        ]);
        $this->form_validation->set_rules('c8', 'C8', 'required|numeric|less_than_equal_to[100]', [
            'numeric' => 'Nilai harus berupa angka',
            'less_than_equal_to' => 'Nilai maksimal 100'
        ]);
        $this->form_validation->set_rules('c9', 'C9', 'required|numeric|less_than_equal_to[100]', [
            'numeric' => 'Nilai harus berupa angka',
            'less_than_equal_to' => 'Nilai maksimal 100'
        ]);
        $this->form_validation->set_rules('c10', 'C10', 'required|numeric|less_than_equal_to[100]', [
            'numeric' => 'Nilai harus berupa angka',
            'less_than_equal_to' => 'Nilai maksimal 100'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->insert_sub_kriteria();
        } else {

            $cek_jurusan = $this->Subkriteria->get_by_id($this->input->post("kode_jurusan"));

            if ($cek_jurusan) {
                $this->session->set_flashdata("error_message", "Gagal tambah sub kriteria. Jurusan sudah ada");
                redirect(site_url("ControllerSubKriteria"));
            }

            $data = [
                'kode_jurusan'  => $this->input->post("kode_jurusan"),
                'c1'            => $this->input->post("c1"),
                'c2'            => $this->input->post("c2"),
                'c3'            => $this->input->post("c3"),
                'c4'            => $this->input->post("c4"),
                'c5'            => $this->input->post("c5"),
                'c6'            => $this->input->post("c6"),
                'c7'            => $this->input->post("c7"),
                'c8'            => $this->input->post("c8"),
                'c9'            => $this->input->post("c9"),
                'c10'            => $this->input->post("c10"),
            ];

            $this->Subkriteria->insert($data);

            $this->session->set_flashdata("flash_message", "Berhasil tambah data siswa.");
            redirect(site_url("ControllerSubKriteria"));
        }
    }

    public function edit($id)
    {
        $data_sub_kriteria = $this->Subkriteria->get_by_id($id);
        $data = [
            'aksi'              => 'edit',
            'action'            => site_url("ControllerSubKriteria/edit_sub_kriteria_action"),
            'id_sub_kriteria'   => set_value("id_sub_kriteria", $data_sub_kriteria->id_sub_kriteria),
            'kode_jurusan'      => set_value("kode_jurusan", $data_sub_kriteria->kode_jurusan),
            'c1'                => set_value("c1", $data_sub_kriteria->c1),
            'c2'                => set_value("c2", $data_sub_kriteria->c2),
            'c3'                => set_value("c3", $data_sub_kriteria->c3),
            'c4'                => set_value("c4", $data_sub_kriteria->c4),
            'c5'                => set_value("c5", $data_sub_kriteria->c5),
            'c6'                => set_value("c6", $data_sub_kriteria->c6),
            'c7'                => set_value("c7", $data_sub_kriteria->c7),
            'c8'                => set_value("c8", $data_sub_kriteria->c8),
            'c9'                => set_value("c9", $data_sub_kriteria->c9),
            'c10'                => set_value("c10", $data_sub_kriteria->c10),
            'allJurusan'        => $this->Subkriteria->allJurusan(),
            'allBobot'          => $this->Subkriteria->allBobot(),
            'judul' => 'SubKriteria',
            'user' => $this->user->getUser(),
            'subkriteria' => $this->Subkriteria->getSubkriteria(),
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sider', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/sub_kriteria/formSubKriteria', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit_sub_kriteria_action()
    {
        $this->form_validation->set_rules('kode_jurusan', 'Jurusan', 'trim|required');
        $this->form_validation->set_rules('c1', 'C1', 'trim|required');
        $this->form_validation->set_rules('c2', 'C2', 'trim|required');
        $this->form_validation->set_rules('c3', 'C3', 'trim|required');
        $this->form_validation->set_rules('c4', 'C4', 'trim|required');
        $this->form_validation->set_rules('c5', 'C5', 'trim|required|numeric|less_than_equal_to[100]');
        $this->form_validation->set_rules('c6', 'C6', 'trim|required|numeric|less_than_equal_to[100]');
        $this->form_validation->set_rules('c7', 'C7', 'trim|required|numeric|less_than_equal_to[100]');
        $this->form_validation->set_rules('c8', 'C8', 'trim|required|numeric|less_than_equal_to[100]');
        $this->form_validation->set_rules('c9', 'C9', 'trim|required|numeric|less_than_equal_to[100]');
        $this->form_validation->set_rules('c10', 'C10', 'trim|required|numeric|less_than_equal_to[100]');
        $this->form_validation->set_message('required', '* {field} Harus diisi');
        $this->form_validation->set_message('numeric', '* {field} Harus berupa angka');
        $this->form_validation->set_message('less_than_equal_to', 'Nilai Tidak boleh Lebih dari 100');
        $this->form_validation->set_message('trim', 'input yang dimasukkan tidak valid');

        $kd  = $this->input->post("kd");
        if ($this->form_validation->run() == FALSE) {
            $this->edit($kd);
        } else {
            $data = [
                'c1'            => $this->input->post("c1"),
                'c2'            => $this->input->post("c2"),
                'c3'            => $this->input->post("c3"),
                'c4'            => $this->input->post("c4"),
                'c5'            => $this->input->post("c5"),
                'c6'            => $this->input->post("c6"),
                'c7'            => $this->input->post("c7"),
                'c8'            => $this->input->post("c8"),
                'c9'            => $this->input->post("c9"),
                'c10'            => $this->input->post("c10"),
            ];
            $id = $this->input->post("id_sub_kriteria");
            $this->Subkriteria->update($id, $data);
            $this->session->set_flashdata("flash_message", "Berhasil update data sub kriteria.");
            redirect(site_url("ControllerSubKriteria"));
        }
    }

    public function hapus($id)
    {
        $data = $this->Subkriteria->get_by_id($id);
        if ($data) {
            $this->Subkriteria->delete($id);
            $this->session->set_flashdata("flash_message", "Berhasil hapus data sub kriteria..");
            redirect(site_url("ControllerSubKriteria"));
        } else {
            $this->session->set_flashdata("error_message", "Gagal hapus data sub kriteria..");
            redirect(site_url("ControllerSubKriteria"));
        }
    }
}
