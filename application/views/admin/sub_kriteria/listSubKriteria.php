<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Sub Kriteria</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-6">
                            <?= $this->session->set_flashdata('flash_message') ?>
                            <?= $this->session->set_flashdata('error_message') ?>
                        </div>
                        <div class="form-group">
                            <a type="button" href="<?= site_url("ControllerSubKriteria/insert_sub_kriteria"); ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <div class="table-responsive">
                            <table id="mytable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Jurusan</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                        <th>C6</th>
                                        <th>C7</th>
                                        <th>C8</th>
                                        <th>C9</th>
                                        <th>C10</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 0;
                                foreach ($subkriteria as $sub) :
                                    $i++;
                                ?>
                                    <tbody>
                                        <th><?= $i ?></th>
                                        <td><?= $sub['jurusan'] ?></td>
                                        <td><?= $sub['c1'] ?></td>
                                        <td><?= $sub['c2'] ?></td>
                                        <td><?= $sub['c3'] ?></td>
                                        <td><?= $sub['c4'] ?></td>
                                        <td><?= $sub['c5'] ?></td>
                                        <td><?= $sub['c6'] ?></td>
                                        <td><?= $sub['c7'] ?></td>
                                        <td><?= $sub['c8'] ?></td>
                                        <td><?= $sub['c9'] ?></td>
                                        <td><?= $sub['c10'] ?></td>
                                        <td>
                                            <a href="<?= base_url('controllersubkriteria/hapus/') . $sub['kode_jurusan'] ?>" class="btn btn-danger tombol-hapus">Hapus</a>
                                            <a href="<?= base_url('controllersubkriteria/edit/') . $sub['kode_jurusan'] ?>" class="btn btn-success">Edit</a>
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
<script src="<?= base_url('assets') ?>/js/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#mytable").dataTable({
            "processing": true,
            "serverSide": true,
            "oLanguage": {
                sProcessing: "Loading. . ."
            },
            "ajax": {
                "url": "<?= site_url('ControllerSubKriteria/json') ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "kode_jurusan",
                    "orderable": false,
                    "className": "text-center"
                },
                {
                    "data": "jurusan"
                },
                {
                    "data": "c1"
                },
                {
                    "data": "c2"
                },
                {
                    "data": "c3"
                },
                {
                    "data": "c4"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            order: [
                [0, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>

<script>
    $('#mytable').on('click', '.hapus', function(e) {

        event.preventDefault();
        const href = $(this).attr('href');
        var nama = $(this).data('nama_bobot');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>