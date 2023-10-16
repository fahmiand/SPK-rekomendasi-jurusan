<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Siswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= $action; ?>" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" id="id_bobot" name="id_bobot" value="<?= $id_bobot; ?>" class="form-control" placeholder="Ketikkan nis">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Tingkat Kepentingan</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="tingkat_kepentingan" name="tingkat_kepentingan" value="<?= $tingkat_kepentingan; ?>" class="form-control" placeholder="Ketikkan nama">
                                        <span class="text-danger"><?= form_error('tingkat_kepentingan') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">nilai_bobot</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" name="nilai_bobot" value="<?= $nilai_bobot; ?>" class="form-control" placeholder="Ketuk nilai">
                                        <span class="text-danger"><?= form_error('nilai_bobot') ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Simpan</button>
                                    <a type="button" href="<?= site_url('controllerBobot'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>