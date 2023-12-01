<div class="container">
    <div class="row">
        <div class="col">
        <a href="create" class="btn btn-primary">Tambah</a>
            <h2 class="mt-2">Daftar Komik</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                <tbody>
                    <?php $number = 1; ?>
                    <?php foreach($komik as $rowKomik): ?>
                    <tr>
                        <th scope="row"><?php echo $number++ ?></th>
                        <td><img src="/img/<?php echo $rowKomik['sampul']; ?>" width="100px" alt=""></td>
                        <td><?php echo $rowKomik['judul'] ?></td>
                        <td><a href="komik/<?php echo $rowKomik['slug']; ?>" class="btn btn-success">Detail</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>