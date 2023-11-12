<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerHasil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in(5);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $idUser = NULL;
        $data = [
            'idUser' => $this->session->userdata('id'),
            'name' => $this->session->userdata('name'),
            'allSiswa'  => $this->Hasil->allSiswa(),
            'nilaiS'    => $this->Hasil->get_proses_hitung($idUser),
            'judul' => 'SPK'
        ];
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/hasil/listHasil', $data);
        $this->load->view('users/templates/footer');
    }

    public function prosesHitung()
    {
        $this->form_validation->set_rules('bhs_indo', 'Bahasa Indonesia', 'trim|required|numeric|less_than_equal_to[100]|greater_than[0]');
        $this->form_validation->set_rules('bhs_ingris', 'Bahasa Inggris', 'trim|required|numeric|less_than_equal_to[100]|greater_than[0]');
        $this->form_validation->set_rules('mtk', 'Matematika', 'trim|required|numeric|less_than_equal_to[100]|greater_than[0]');
        $this->form_validation->set_rules('ipa', 'IPA', 'trim|required|numeric|less_than_equal_to[100]|greater_than[0]');
        $this->form_validation->set_rules('rekayasa_perangkat_lunak', 'Rekayasa Perangkat Lunak', 'trim|required|numeric|less_than_equal_to[100]|greater_than[0]');
        $this->form_validation->set_rules('teknik_komputer_jaringan', 'Teknik Komputer Jaringan', 'trim|required|numeric|less_than_equal_to[100]|greater_than[0]');
        $this->form_validation->set_rules('multimedia', 'Multimedia', 'trim|required|numeric|less_than_equal_to[100]|greater_than[0]');
        $this->form_validation->set_rules('akuntansi', 'Akuntansi', 'trim|required|numeric|less_than_equal_to[100]|greater_than[0]');
        $this->form_validation->set_rules('pemasaran', 'Pemasaran', 'trim|required|numeric|less_than_equal_to[100]|greater_than[0]');
        $this->form_validation->set_rules('administrasi_perkantoran', 'Administrasi Perkantoran', 'trim|required|numeric|less_than_equal_to[100]|greater_than[0]');
        $this->form_validation->set_message('required', '* {field} Harus diisi');
        $this->form_validation->set_message('numeric', 'Harus berupa angka');
        $this->form_validation->set_message('less_than', 'Nilai Harus kurang dari 100!');
        $this->form_validation->set_message('greater_than', 'Nilai tidak boleh 0!');
        $this->form_validation->set_message('trim', 'input yang dimasukkan tidak valid');


        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $idUser       = $this->input->post("id");
            $bhs_indo   = $this->input->post("bhs_indo");
            $bhs_ingris = $this->input->post("bhs_ingris");
            $mtk        = $this->input->post("mtk");
            $ipa        = $this->input->post("ipa");
            $rekayasaPerangkatLunak = $this->input->post('rekayasa_perangkat_lunak');
            $teknikKomputerJaringan = $this->input->post('teknik_komputer_jaringan');
            $multimedia = $this->input->post('multimedia');
            $akuntansi = $this->input->post('akuntansi');
            $pemasaran = $this->input->post('pemasaran');
            $administrasiPerkantoran = $this->input->post('administrasi_perkantoran');

            $allSubKriteria = $this->db->get("sub_kriteria")->result();
            foreach ($allSubKriteria as $value) {
                $w1 = round($value->c1 / ($value->c1 + $value->c2 + $value->c3 + $value->c4 + $value->c5 + $value->c6 + $value->c7 + $value->c8 + $value->c9 + $value->c10), 2);
                $w2 = round($value->c2 / ($value->c1 + $value->c2 + $value->c3 + $value->c4 + $value->c5 + $value->c6 + $value->c7 + $value->c8 + $value->c9 + $value->c10), 2);
                $w3 = round($value->c3 / ($value->c1 + $value->c2 + $value->c3 + $value->c4 + $value->c5 + $value->c6 + $value->c7 + $value->c8 + $value->c9 + $value->c10), 2);
                $w4 = round($value->c4 / ($value->c1 + $value->c2 + $value->c3 + $value->c4 + $value->c5 + $value->c6 + $value->c7 + $value->c8 + $value->c9 + $value->c10), 2);
                $w5 = round($value->c5 / ($value->c1 + $value->c2 + $value->c3 + $value->c4 + $value->c5 + $value->c6 + $value->c7 + $value->c8 + $value->c9 + $value->c10), 2);
                $w6 = round($value->c6 / ($value->c1 + $value->c2 + $value->c3 + $value->c4 + $value->c5 + $value->c6 + $value->c7 + $value->c8 + $value->c9 + $value->c10), 2);
                $w7 = round($value->c7 / ($value->c1 + $value->c2 + $value->c3 + $value->c4 + $value->c5 + $value->c6 + $value->c7 + $value->c8 + $value->c9 + $value->c10), 2);
                $w8 = round($value->c8 / ($value->c1 + $value->c2 + $value->c3 + $value->c4 + $value->c5 + $value->c6 + $value->c7 + $value->c8 + $value->c9 + $value->c10), 2);
                $w9 = round($value->c9 / ($value->c1 + $value->c2 + $value->c3 + $value->c4 + $value->c5 + $value->c6 + $value->c7 + $value->c8 + $value->c9 + $value->c10), 2);
                $w10 = round($value->c10 / ($value->c1 + $value->c2 + $value->c3 + $value->c4 + $value->c5 + $value->c6 + $value->c7 + $value->c8 + $value->c9 + $value->c10), 2);
                $nilai_s = round((pow($bhs_indo, $w1) * pow($bhs_ingris, $w2) * pow($mtk, $w3) * pow($ipa, $w4) * pow($rekayasaPerangkatLunak, $w5) * pow($teknikKomputerJaringan, $w6) * pow($multimedia, $w7) * pow($akuntansi, $w8) * pow($pemasaran, $w9) * pow($administrasiPerkantoran, $w10)), 3);
                $data = [
                    'id_user'          => $idUser,
                    'kode_jurusan'  => $value->kode_jurusan,
                    'w1'            => $w1,
                    'w2'            => $w2,
                    'w3'            => $w3,
                    'w4'            => $w4,
                    'w5'            => $w5,
                    'w6'            => $w6,
                    'w7'            => $w7,
                    'w8'            => $w8,
                    'w9'            => $w9,
                    'w10'           => $w10,
                    's'             => $nilai_s,
                ];
                $cekDataProses = $this->db->get_where("proses_hitung", ["id_user" => $idUser, "kode_jurusan" => $value->kode_jurusan])->row();
                if ($cekDataProses) {
                    $this->db->where("id_user", $idUser);
                    $this->db->where("kode_jurusan", $value->kode_jurusan);
                    $this->db->update("proses_hitung", $data);
                } else {
                    $this->db->insert("proses_hitung", $data);
                }
            }
            $this->hitung_nilai_v();

            redirect(site_url('ControllerHasil'));
        }
    }

    public function hitung_nilai_v()
    {
        $idUser       = $this->input->post("id");

        $data_hitung = $this->Hasil->get_proses_hitung($idUser);
        // print_r($data_hitung);die;
        foreach ($data_hitung as $value) {
            $get_total_s = $this->db->query("SELECT SUM(s) AS total_s, kode_jurusan FROM proses_hitung GROUP BY kode_jurusan")->result();
            foreach ($get_total_s as $nilai) {
                $data_v = [
                    'v' => round(($value->s / $nilai->total_s), 9)
                ];
                $this->db->where("id_user", $value->id_user);
                $this->db->where("kode_jurusan", $value->kode_jurusan);
                $this->db->update("proses_hitung", $data_v);
            }
        }

        $data_session = [
            'idUser'          => $idUser,
        ];
        $this->session->set_userdata("data_siswa", $data_session);
        redirect(site_url('ControllerHasil'));
    }

    public function simpanHitung()
    {
        $idUser = $this->input->post("id_user_hasil");
        $rekomendasi_jurusan = $this->input->post("jurusan");

        $data = [
            'id_user'                => $idUser,
            'rekomendasi_jurusan' => $rekomendasi_jurusan,
            'tanggal'             => date('Y-m-d H:i:s')
        ];

        $cek_nisn = $this->db->get_where("hasil", ["id_user" => $idUser])->row();
        if ($cek_nisn) {
            $this->db->where("id_user", $idUser);
            $this->db->update("hasil", $data);
        } else {
            $this->db->insert("hasil", $data);
        }
        redirect(site_url('ControllerHasil'));
    }

    public function hapusHitung()
    {
        $idUser = $this->input->post('id');
        $data = [
            'data_siswa', 'nilaiV', 'nilaiS'
        ];
        $this->session->unset_userdata($data);
        $this->db->where('id_user', $idUser);
        $this->db->delete('proses_hitung');
        redirect(base_url('/controllerHasil'));
    }
}
