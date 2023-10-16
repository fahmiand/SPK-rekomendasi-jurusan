<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Jurusan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= $action; ?>" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Kode Alternatif</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="kode_jurusan" name="kode_jurusan" value="<?= $kode_jurusan; ?>" class="form-control" placeholder="Ketikkan kode jurusan">
                                        <span class="text-danger"><?= form_error('kode_jurusan') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Jurusan</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="hidden" id="id_alternatif" name="id_alternatif" value="<?= $id_alternatif; ?>" class="form-control">
                                        <input type="text" id="jurusan" name="jurusan" value="<?= $jurusan; ?>" class="form-control" placeholder="Ketikkan jurusan">
                                        <span class="text-danger"><?= form_error('jurusan') ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Simpan</button>
                                    <a type="button" href="<?= site_url('ControllerAlternatif'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>