<div class="container-fluid px-4">
    <h1 class="mt-4">Jadwal Ronda</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Memilih personil untuk dijadikan pelindung keamanan</li>
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
                            <label>Hari</label>
                            <select class="form-control mb-3" name="hari" id="hari">
                                <option value="" disabled selected>-- Pilih Hari --</option>
                                <option value="1">Senin</option>
                                <option value="2">Selasa</option>
                                <option value="3">Rabu</option>
                                <option value="4">Kamis</option>
                                <option value="5">Jumat</option>
                                <option value="6">Sabtu</option>
                                <option value="7">Minggu/Ahad</option>
                            </select>
                            <label>Warga</label>
                            <select class="form-control mb-3" name="warga_id" id="warga_id">
                                <option value="" disabled selected>-- Pilih Warga --</option>
                                <?php
                                foreach ($warga as $war) {
                                ?>
                                    <option value="<?= $war->id ?>"><?= $war->nama ?></option>
                                <?php
                                }
                                ?>
                            </select>
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