<div class="container">
    <h1 class="mt-4">History Rekomendasi Jurusan</h1>
    <div class="row justify-content-start mt-3">
        <div class="col-md-9">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">Nomer</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jurusan</th>
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>