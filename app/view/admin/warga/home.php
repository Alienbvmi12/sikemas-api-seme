<div class="container-fluid px-4">
    <h1 class="mt-4">Warga</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengelola Data Warga</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
        </div>
        <div class="card-body" style="overflow: auto;">
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
                <form id="editor-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Nik</label>
                            <input class="form-control mb-3" id="nik" name="nik" required>
                            <label>Nama</label>
                            <input type="text" class="form-control mb-3" id="nama" name="nama" required>
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control mb-3" id="phone" name="phone" required>
                            <label>Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control mb-3" id="tempat_lahir" name="tempat_lahir" required>
                            <input type="date" class="form-control mb-3" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                        <div class="col-sm-6">
                            <label>Kelamin</label>
                            <select class="form-control mb-3" name="kelamin" id="kelamin">
                                <option value="" disabled selected>-- Pilih --</option>
                                <option value="0">Perempuan</option>
                                <option value="1">Laki-Laki</option>
                            </select>
                            <label>Kewarganegaraan</label>
                            <select class="form-control mb-3" name="kewarganegaraan" id="kewarganegaraan">
                                <option value="" disabled selected>-- Pilih --</option>
                                <option value="0">WNA</option>
                                <option value="1">WNI</option>
                            </select>
                            <label>Pekerjaan</label>
                            <input type="text" class="form-control mb-3" id="pekerjaan" name="pekerjaan" required>
                            <label>Posisi Dalam Masyarakat</label>
                            <select class="form-control mb-3" name="posisi_id" id="posisi_id">
                                <option value="" disabled selected>-- Pilih --</option>
                                <?php
                                foreach ($posisi as $pos) {
                                ?>
                                    <option value="<?= $pos->id ?>"><?= $pos->posisi ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label>Alamat</label>
                            <select class="form-control mb-3" name="alamat_id" id="alamat_id">
                                <option value="" disabled selected>-- Pilih --</option>
                                <?php
                                foreach ($alamat as $al) {
                                ?>
                                    <option value="<?= $al->id ?>"><?= $al->alamat ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label>Foto</label>
                            <input type="file" class="form-control mb-3" id="foto" name="foto" accept="image" required>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="submit" data-bs-dismiss="modal" onclick="create()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>