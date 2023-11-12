<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900"><?= $judul ?></h1>
    <h1 class="mt-4 text-gray-900">History Rekomendasi Jurusan</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <table class="table text-gray-900">
                    <thead>
                        <tr>
                            <th scope="col">Nomer</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jurusan</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($hasil as $h) :
                            $i++
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $h['tanggal'] ?></td>
                                <td><?= $h['rekomendasi_jurusan'] ?></td>
                                <td><?= $h['name'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->