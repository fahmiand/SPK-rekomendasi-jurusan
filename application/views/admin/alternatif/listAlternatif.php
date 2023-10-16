<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Jurusan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-6">
                            <?= $this->session->set_flashdata('flash_message') ?>
                            <?= $this->session->set_flashdata('error_message') ?>
                        </div>
                        <div class="form-group">
                            <a type="button" href="<?= site_url("ControllerAlternatif/insert_alternatif"); ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <div class="table-responsive">
                            <table id="mytable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Kode Jurusan</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 0;
                                foreach ($alternatif as $a) :
                                    $i++;
                                ?>
                                    <tbody>
                                        <th><?= $i ?></th>
                                        <td><?= $a['kode_jurusan'] ?></td>
                                        <td><?= $a['jurusan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('/controlleralternatif/hapus/') . $a['id_alternatif'] ?>" class="btn btn-info tombol-hapus" id="">hapus</a>
                                            <a href="<?= base_url('/controlleralternatif/edit/') . $a['id_alternatif'] ?>" class="btn btn-danger">Edit</a>
                                        </td>
                                    </tbody>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>