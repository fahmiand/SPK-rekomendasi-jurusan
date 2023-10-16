<div class="container">
    <h1 class="mt-4">History Rekomendasi Jurusan</h1>
    <table class="table">
        <thead>
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