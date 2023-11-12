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
                                        <input type="number" class="form-control" name="bhs_indo" value="<?= set_value('bhs_indo') ?>" required>
                                        <span class="text-danger"><?= form_error('bhs_indo') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Bahasa Inggris
                                        <input type="number" class="form-control" name="bhs_ingris" value="<?= set_value('bhs_ingris') ?>" required>
                                        <span class="text-danger"><?= form_error('bhs_ingris') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Matematika
                                        <input type="number" class="form-control" name="mtk" value="<?= set_value('mtk') ?>" required>
                                        <span class="text-danger"><?= form_error('mtk') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Ilmu Pengetahuan Alam
                                        <input type="number" class="form-control" name="ipa" value="<?= set_value('ipa') ?>" required>
                                        <span class="text-danger"><?= form_error('ipa') ?></span>
                                    </div>
                                </div>
                                <label for="minat">Minat :</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        jurusan Rekayasa Perangkat Lunak
                                        <input type="number" class="form-control" name="rekayasa_perangkat_lunak" value="<?= set_value('rekayasa_perangkat_lunak') ?>" required>
                                        <span class="text-danger"><?= form_error('rekayasa_perangkat_lunak') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Jurusan Teknik Komputer dan Jaringan
                                        <input type="number" class="form-control" name="teknik_komputer_jaringan" value="<?= set_value('teknik_komputer_jaringan') ?>" required>
                                        <span class="text-danger"><?= form_error('teknik_komputer_jaringan') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Jurusan Multimedia
                                        <input type="number" class="form-control" name="multimedia" value="<?= set_value('multimedia') ?>" required>
                                        <span class="text-danger"><?= form_error('multimedia') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Jurusan Administrasi Perkantoran
                                        <input type="number" class="form-control" name="administrasi_perkantoran" value="<?= set_value('administrasi_perkantoran') ?>" required>
                                        <span class="text-danger"><?= form_error('administrasi_perkantoran') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Jurusan Akuntansi
                                        <input type="number" class="form-control" name="akuntansi" value="<?= set_value('akuntansi') ?>" required>
                                        <span class="text-danger"><?= form_error('akuntansi') ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        Jurusan Pemasaran
                                        <input type="number" class="form-control" name="pemasaran" value="<?= set_value('pemasaran') ?>" required>
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
            <!--  /.card-body  -->
        </div>
        <!--  /.card  -->
    </div>
</section>

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
                            $data_hasil = $this->db->query("SELECT proses_hitung.*, jurusan.jurusan FROM proses_hitung
                                                            LEFT JOIN jurusan on proses_hitung.kode_jurusan = jurusan.kode_jurusan
                                                            WHERE id_user='$idUser'")->result();
                            ?>

                            <div class="col-md-12">
                                <?php foreach ($data_hasil as $value) { ?>
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center; background-color:antiquewhite;">Hasil <?= $value->jurusan ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center;"><?= $value->v ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
                                <!-- <table class="table">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Alternatif</td>
                                            <td>Hasil</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($data_hasil as $value) {
                                            $i++ ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $value->jurusan ?></td>
                                                <td><?= $value->v ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> -->
                            </div>
                            <?php
                            $rekomendasi_jurusan = $this->db->query("SELECT MAX(v) nilai_tertinggi, kode_jurusan,
                            (SELECT jurusan FROM jurusan WHERE proses_hitung.kode_jurusan=jurusan.kode_jurusan)
                            as jurusan FROM proses_hitung WHERE id_user='$idUser' GROUP BY kode_jurusan
                            ORDER BY MAX(v) DESC")->row();
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