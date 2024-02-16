<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Aspirasi</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
        </div>
        <div class="card-body">
            <h2 style="font-size : 20px">Perihal : <text  style="font-size : 20px"><?= $aspirasi->perihal?> </text></h2> 
            <p><?= $aspirasi->pesan?></p>

            <h3 class="my-4" style="text-align : center">Balasan</h3>

            <?php if($aspirasi->balasan_id == null or $aspirasi->balasan_id == ""){?>
                <p  style="font-size : 20px"> Belum ada balasan</p>
                <button class="btn btn-success" onclick="modal(this, 'create')" data-bs-toggle="modal" data-bs-target="#editm">Balas</button>
            <?php } else {?>

            <h2 style="font-size : 20px"> </h2> <text  style="font-size : 20px"><?= $aspirasi->judul?> </text>
            <br>
            <br>
            <p><?= $aspirasi->pesan_balasan?></p>
            <button class="btn btn-danger btn-sm" onclick="deleteM()">Hapus Balasan</button>
            <?php }?>


        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="editm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content container py-3">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Balas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="editor-form">
                            <label>Judul/Subjek</label>
                            <input class="form-control mb-3" id="title" name="title" placeholder="" required>
                            <label>Pesan Balasan</label>
                            <textarea class="form-control mb-3" id="pesan" name="pesan" required>
                            </textarea>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="submit" data-bs-dismiss="modal" onclick="create()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>