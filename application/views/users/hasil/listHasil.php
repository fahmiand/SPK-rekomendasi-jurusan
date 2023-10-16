<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Proses SPK Hitung</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form class="form-material form-horizontal" method="POST" action="<?= site_url('ControllerHasil/prosesHitung') ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $idUser ?>">
                            <div class="col-md-12" style="margin-top: 5px;">
                                <label for="">Nilai :</label>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        Bahasa Indonesia
                                        <input type="number" class="form-control" name="bhs_indo" value="" required>
                                        <span class="text-danger"><?= form_error('bhs_indo') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Bahasa Inggris
                                        <input type="number" class="form-control" name="bhs_ingris" value="" required>
                                        <span class="text-danger"><?= form_error('bhs_ingris') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        MTK
                                        <input type="number" class="form-control" name="mtk" value="" required>
                                        <span class="text-danger"><?= form_error('mtk') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        IPA
                                        <input type="number" class="form-control" name="ipa" value="" required>
                                        <span class="text-danger"><?= form_error('ipa') ?></span>
                                    </div>
                                </div>
                                <label for="minat">Minat :</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        jurusan Rekayasa Perangkat Lunak
                                        <input type="number" class="form-control" name="rekayasa_perangkat_lunak" value="" required>
                                        <span class="text-danger"><?= form_error('rekayasa_perangkat_lunak') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Jurusan Teknik Komputer dan Jaringan
                                        <input type="number" class="form-control" name="teknik_komputer_jaringan" value="" required>
                                        <span class="text-danger"><?= form_error('teknik_komputer_jaringan') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Jurusan Multimedia
                                        <input type="number" class="form-control" name="multimedia" value="" required>
                                        <span class="text-danger"><?= form_error('multimedia') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Jurusan Administrasi Perkantoran
                                        <input type="number" class="form-control" name="administrasi_perkantoran" value="" required>
                                        <span class="text-danger"><?= form_error('administrasi_perkantoran') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Jurusan Akuntansi
                                        <input type="number" class="form-control" name="akuntansi" value="" required>
                                        <span class="text-danger"><?= form_error('akuntansi') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Jurusan Pemasaran
                                        <input type="number" class="form-control" name="pemasaran" value="" required>
                                        <span class="text-danger"><?= form_error('pemasaran') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 15px;">
                                <button type="submit" class="btn btn-primary">Hitung</button>
                            </div>
                    </div>
                </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>

<?php if (!empty($this->session->nilaiS)) { ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hasil Hitung</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="nilaiS" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama</th>
                                            <th>Kode Jurusan</th>
                                            <th>S</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($nilaiS as $value) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value->name ?></td>
                                                <td><?= $value->kode_jurusan ?></td>
                                                <td><?= $value->s ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-top: 15px;">
                                <a href="<?= site_url('ControllerHasil/sesi_hitung_v') ?>" class="btn btn-primary">Lanjut Proses Hitung Nilai</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (!empty($this->session->nilaiV)) { ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hitung Hasil ( Nilai V )</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-material form-horizontal" method="POST" action="<?= site_url('ControllerHasil/hitung_nilai_v') ?>" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="row">
                                        <ul class="list-group">
                                            <li class="list-group-item"><?= $name ?></li>
                                            <input type="text" name="id" value="<?= $idUser ?>">
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 15px;">
                                    <button type="submit" class="btn btn-primary">Lanjutkan Hitung</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (!empty($this->session->data_siswa)) { ?>
    <?php
    $idUser = $this->session->data_siswa["idUser"];
    $get_nama = $this->db->query("SELECT * FROM user WHERE id ='$idUser'")->row();
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hasil SPK <?= $get_nama->id . " - " . $get_nama->name ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            $idUser = $this->session->data_siswa["idUser"];
                            $data_hasil = $this->db->query("SELECT * FROM proses_hitung WHERE id_user='$idUser'")->result();
                            // print_r($data_hasil);die;
                            ?>
                            <?php foreach ($data_hasil as $value) { ?>
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center; background-color:antiquewhite;">Vektor S <?= $value->kode_jurusan ?></td>
                                                <td style="text-align: center; background-color:antiquewhite;">Vektor V <?= $value->kode_jurusan ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><?= $value->s ?></td>
                                                <td style="text-align: center;"><?= $value->v ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                            <?php
                            $rekomendasi_jurusan = $this->db->query("SELECT MAX(v) nilai_tertinggi, kode_jurusan,
                            (SELECT jurusan FROM jurusan WHERE proses_hitung.kode_jurusan=jurusan.kode_jurusan)
                            as jurusan FROM proses_hitung WHERE id_user='$idUser' GROUP BY kode_jurusan
                            ORDER BY MAX(v) DESC")->row();
                            // print_r($rekomendasi_jurusan);die;
                            // , (SELECT jurusan FROM alternatif as b WHERE b.kode_jurusan=a.kode_jurusan) as hasil_jurusan 
                            ?>
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-check"></i> Rekomendasi Jurusan</h4>
                                    <?= $rekomendasi_jurusan->jurusan ?>
                                </div>
                            </div>
                            <form class="form-material form-horizontal" method="POST" action="<?= site_url('ControllerHasil/simpanHitung') ?>" enctype="multipart/form-data" id="form1">
                                <input type="hidden" name="id_user_hasil" value="<?= $idUser ?>">
                                <input type="hidden" name="jurusan" value="<?= $rekomendasi_jurusan->jurusan ?>">
                                <div class="col-md-12">
                                    <div class="border border-light p-3 mb-4">
                                        <div class="text-center">
                                            <a href="#" onclick="document.getElementById('form1').submit();" class="btn btn-app">
                                                <i class="fas fa-save"></i> Simpan
                                            </a>
                            </form>
                            <form action="<?= site_url('ControllerHasil/hapushitung') ?>" method="post">
                                <input type="hidden" name="id" value="<?= $idUser ?>">
                                <button type="submit" class="btn btn-danger">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        </div>
        </div>
    </section>
<?php } ?>
<script src="<?= base_url('assets') ?>/js/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#nilaiS').dataTable();
    });
</script>