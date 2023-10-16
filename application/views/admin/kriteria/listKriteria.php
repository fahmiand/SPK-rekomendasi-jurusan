<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <h3 class="card-title">Data Kriteria</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="mytable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Kriteria</th>
                                    <th>Tipe</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <?php
                            $i = 0;
                            foreach ($kriteria as $k) :
                                $i++;
                            ?>
                                <tbody>
                                    <th><?= $i ?></th>
                                    <td><?= $k['nama_kriteria'] ?></td>
                                    <td><?= $k['tipe'] ?></td>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
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
                "url": "<?= site_url('Kriteria/json') ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "id_kriteria",
                    "orderable": false,
                    "className": "text-center"
                },
                {
                    "data": "nama_kriteria"
                },
                {
                    "data": "tipe"
                },

            ],
            order: [
                [1, 'asc']
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
    $('#mytable_atribut').on('click', '.hapus', function(e) {

        event.preventDefault();
        const href = $(this).attr('href');
        var nama = $(this).data('nama');

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