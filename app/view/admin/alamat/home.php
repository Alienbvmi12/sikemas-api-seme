<div class="container-fluid px-4">
    <h1 class="mt-4">Alamat</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mengelola alamat</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
        </div>
        <div class="card-body">
            <table id="main_table" class="table">
            </table>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="editm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content container py-3">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="editor-form">
                            <label>RT</label>
                            <input type="number" class="form-control mb-3" id="rt" name="rt" placeholder="" required>
                            <label>No Rumah</label>
                            <input class="form-control mb-3" id="no_rumah" name="no_rumah" placeholder="Contoh: Blok F4 No 4" required>
                            <label>Kode Pos</label>
                            <input class="form-control mb-3" id="kode_pos" name="kode_pos" placeholder="" required>
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