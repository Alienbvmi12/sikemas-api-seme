<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mengelola akun pengguna aplikasi android</li>
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
                            <label>Username</label>
                            <input class="form-control mb-3" id="username" name="username" placeholder="" required>
                            <label>Email</label>
                            <input type="email" class="form-control mb-3" id="email" name="email" required>
                            <label>Password</label>
                            <input type="password" class="form-control mb-3" id="password" name="password" required>
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control mb-3" id="confirm_password" name="confirm_password" required>
                            <label>Warga</label>
                            <select class="form-control mb-3" name="warga_id" id="warga_id">
                                <option value="" disabled selected>-- Pilih Warga --</option>
                                <?php
                                foreach ($warga as $war) {
                                ?>
                                    <option value="<?= $war->id ?>"><?= $war->id . " - " . $war->nik . " - " .  $war->nama ?></option>
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