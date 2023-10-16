<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Bobot</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-6">
                            <?= $this->session->set_flashdata('flash_message') ?>
                            <?= $this->session->set_flashdata('error_message') ?>
                        </div>
                        <div class="form-group">
                            <a type="button" href="<?= site_url("controllerBobot/insert_bobot"); ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <div class="table-responsive">
                            <table id="mytable_bobot" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Tingkat Kepentingan</th>
                                        <th>Nilai Bobot</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 0;
                                foreach ($bobot as $b) :
                                    $i++;
                                ?>
                                    <tbody>
                                        <th><?= $i ?></th>
                                        <td><?= $b['tingkat_kepentingan'] ?></td>
                                        <td><?= $b['nilai_bobot'] ?></td>
                                        <td>
                                            <a href="<?= base_url('controllerbobot/hapus/') . $b['id_bobot'] ?>" class="btn btn-info tombol-hapus">Hapus</a>
                                            <a href="<?= base_url('controllerbobot/edit/') . $b['id_bobot'] ?>" class="btn btn-warning">Edit</a>
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

        var t = $("#mytable_bobot").dataTable({
            "processing": true,
            "serverSide": true,
            "oLanguage": {
                sProcessing: "Loading. . ."
            },
            "ajax": {
                "url": "<?= site_url('controllerBobot/json') ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "id_bobot",
                    "orderable": false,
                    "className": "text-center"
                },
                {
                    "data": "tingkat_kepentingan"
                },
                {
                    "data": "nilai_bobot"
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
    $('#mytable_bobot').on('click', '.hapus', function(e) {

        event.preventDefault();
        const href = $(this).attr('href');
        var nama = $(this).data('nama_bobot');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data " + nama + " akan dihapus!",
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