<div class="container-fluid">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/img/<?php echo $komik['sampul'] ?>" width="150px" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $komik['judul'] ?></h5>
                    <p class="card-text"><?php echo $komik['penerbit'] ?><p>
                    <p class="card-text"><small class="text-body-secondary"><?php echo $komik['penulis'] ?></small></p>
                    <button type="button" class="btn btn-warning">Edit</button>
                    
                    <form action="delete-komik/<?php echo $komik['id'] ?>" method="post" class="d-inline">
                        <?php echo csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <a href="/komik">Kembali</a>  
            </div>
        </div>
    </div>
</div>