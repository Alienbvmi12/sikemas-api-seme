<style>
    .border-judul {
        width: 100%;
        height: 78px;
        background: #0561A5;
        box-shadow: 0px 3px 4px 0px rgba(10, 21, 36, 0.25);
        padding: 1px;
    }

    .border-judul,
    h1 {
        color: white;
        text-align: center;
    }

    .border-judul-footer {
        background: #E04532;
        height: 10px;
    }

    .theinput {
        width: 400px;
    }

    .theinput1 {
        width: 500px;
    }

    .radio {
        margin-top: 0px;
    }

    .theselect {
        width: 400px;
    }

    .text-area {
        width: 400px;
        margin-top: 1px;
    }

    .thelabel {
        font-size: 24px;
    }

    .data-pribadi {
        width: 50%;
        height: 40px;
        background: #0561A5;
        box-shadow: 0px 3px 4px 0px rgba(10, 21, 36, 0.25);
        margin-top: 35px;
        padding: 8px 20px;
        color: #ffffff;
        font-size: 18px;
    }

    .data-orangtua {
        width: 50%;
        height: 40px;
        background: #E04532;
        box-shadow: 0px 3px 4px 0px rgba(10, 21, 36, 0.25);
        margin-top: 35px;
        padding: 8px 20px;
        color: #ffffff;
        font-size: 18px;
    }

    .data-wali {
        width: 50%;
        height: 40px;
        background: #06345b;
        box-shadow: 0px 3px 4px 0px rgba(10, 21, 36, 0.25);
        margin-top: 35px;
        padding: 8px 20px;
        color: #ffffff;
        font-size: 18px;
    }

    .kontak {
        width: 50%;
        height: 40px;
        background: #06345b;
        box-shadow: 0px 3px 4px 0px rgba(10, 21, 36, 0.25);
        margin-top: 35px;
        padding: 8px 20px;
        color: #ffffff;
        font-size: 18px;
    }

    .komentar {
        color: #A8A196;
        font-weight: bold;
    }

    .komentar1 {
        color: #A8A196;
        font-weight: bold;
    }
    sup{
        color: red;
    }

    @media only screen and (max-width: 450px) {
        .border-judul {
            height: 140px;
            padding: 0px;
        }

        .theinput {
            width: 300px;
            margin-bottom: 10px;
        }

        .theinput1,
        .theselect {
            width: 300px;
        }

        .text-area {
            margin-left: 1px;
            width: 300px;
        }

        .radio {
            margin-left: 20px;
        }

        .komentar {
            margin-left: 0px;
        }
    }

    @media only screen and (min-width: 450px) and (max-width: 600px) {
        .border-judul {
            height: 80px;
            padding: 0px;
        }

        .theinput {
            width: 400px;
            margin-bottom: 10px;
        }

        .theinput1,
        .theselect {
            width: 400px;
        }

        .text-area {
            margin-left: 1px;
            width: 400px;
            height: 100px;
        }

        .input-alamat {
            width: 400px;
        }

        .radio {
            margin-left: 20px;
        }

        .komentar {
            margin-left: 0px;
        }
    }

    @media only screen and (min-width: 600px) and (max-width: 767px) {
        .border-judul {
            height: 75px;
            padding: 0px;
        }

        .theinput {
            width: 500px;
            margin-bottom: 10px;
        }

        .theinput1,
        .theselect {
            width: 500px;
        }

        .text-area {
            margin-left: 1px;
            width: 500px;
            height: 100px;
        }

        .radio {
            margin-left: 20px;
        }

        .komentar {
            margin-left: 0px;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 900px) {

        .theinput {
            width: 400px;
            margin-bottom: 10px;
        }

        .theinput1,
        .theselect {
            width: 400px;
        }

        .text-area {
            margin-left: 1px;
            width: 400px;
            height: 100px;
        }

        .radio {
            margin-left: 20px;
        }

        .komentar {
            margin-right: 0px;
        }
    }

    @media only screen and (min-width: 900px) and (max-width: 991px) {
        .theinput {
            width: 600px;
            margin-bottom: 10px;
        }

        .theinput1,
        .theselect {
            width: 600px;
        }

        .text-area {
            margin-left: 1px;
            width: 600px;
            height: 100px;
        }

        .radio {
            margin-left: 20px;
        }

        .komentar {
            margin-right: 0px;
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1100px) {
        .theinput {
            width: 300px;
            margin-bottom: 10px;
        }

        .theinput1,
        .theselect {
            width: 300px;
        }

        .text-area {
            margin-left: 1px;
            width: 300px;
            height: 100px;
        }

        .radio {
            margin-left: 20px;
        }

        .komentar {
            margin-left: 260px;
        }
    }

    @media only screen and (min-width: 1100px) and (max-width: 1275px) {
        .theinput {
            width: 300px;
            margin-bottom: 10px;
        }

        .theinput1,
        .theselect {
            width: 300px;
        }

        .text-area {
            margin-left: 1px;
            width: 300px;
            height: 100px;
        }

        .radio {
            margin-left: 20px;
        }

        .komentar {
            margin-left: 300px;
        }
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="border-judul">
                            <h1>Formulir Pendaftaran Calon Siswa Baru</h1>
                        </div>
                        <div class="border-judul-footer"></div>
                    </div>
                    <form id="pendaftaranpd" action="<?= base_url('front/pendaftaran/daftar') ?>" method="post">
                        <div class="col-md-12">
                            <div class="data-pribadi">
                                Data Pribadi
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="thelabel" for="nama">Nama Lengkap<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input required type="text" id="nama" class="form-control theinput" name="nmdepan" placeholder="Contoh:Adam">
                                        </div>
                                        <div class="col-md-5">
                                            <input required type="text" id="nama" class="form-control theinput" name="nmbelakang" placeholder="Contoh:Marwadi">
                                        </div>
                                        <div class="col-sm-offset-3"></div>
                                        <div class="col-md-9 komentar">Mohon Untuk Mengisi Data Siswa Sesuai Dengan Yang Ada Di Akte kelahiran / kartu Keluarga</div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="thelabel" for="ttl">Tempat Tanggal Lahir<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input required type="text" id="ttl" class="form-control theinput" name="tempatlahir" placeholder="Contoh:Tasik Malaya" disabled>
                                        </div>
                                        <div class="col-md-5">
                                            <input required type="date" id="ttl" class="form-control theinput" name="tanggallahir" disabled>
                                        </div>
                                        <div class="col-sm-offset-3"></div>
                                        <div class="col-md-9 komentar">Mohon Untuk Mengisi Data Siswa Sesuai Dengan Yang Ada Di Akte kelahiran / kartu Keluarga</div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label class="thelabel">Jenis Kelamin<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="laki-laki" class="radio"><input required type="radio" id="laki-laki" name="jeniskelamin" value="1"> Laki Laki</label>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="perempuan" class="radio"><input required type="radio" id="perempuan" name="jeniskelamin" value="0"> Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="thelabel" for="NISN">NISN</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required disabled type="text" id="NISN" class="form-control theinput" name="nisn" placeholder="Contoh: 0009321234">
                                        </div>
                                        <div class="col-sm-offset-3"></div>
                                        <div class="col-md-9 komentar">Nomor Induk Siswa Nasional peserta didik (jika memiliki). Jika belum memiliki, maka wajib dikosongkan. Untuk memeriksa NISN, dapat mengunjungi <a href="https://nisn.data.kemdikbud.go.id/index.php/Cindex/formcaribynama" style="text-decoration: none;" target="_blank">Halaman Ini.</a></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="thelabel" for="NIK">NIK(WNI)/No.Kitas(WNA)<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required disabled type="text" id="NIK" class="form-control theinput1" name="nik" placeholder="Contoh: 3200000000000000">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="thelabel" for="agama">Agama<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="agama" id="agama" class="form-control theselect" disabled>
                                                <option value="">--pilih--</option>
                                                <option value="islam">Islam</option>
                                                <option value="khatolik">Khatolik</option>
                                                <option value="protestan">Protestan</option>
                                                <option value="buddha">Buddha</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="Konghucu">Kong Hu Cu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="thelabel" for="Kewarganegaraan">Kewarganegaraan<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select disabled class="form-control theselect" name="kewarganegaraan" id="">
                                                <option value="">--pilih--</option>
                                                <option value="wni">Warga Negara Indonesia</option>
                                                <option value="wna">Warga Negara Asing</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="thelabel" for="alamat">Alamat Rumah<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="alamat" maxlength="30" id="alamat" class="text-area" rows="3" class="form-control" placeholder="Contoh: Kp.Legok Nangka Rt03/Rw09"></textarea>
                                        </div>

                                        <div class="col-md-3"></div>
                                        <div class="col-md-9">
                                            <br>
                                            <!-- <select class="form-control theselect" name="alamat" id="selectNegara">
                                                <option value="">--Pilih--</option>
                                            </select> -->
                                            <select name="alamat1" id="alamat1">
                                                <option data-provinsi="provinsi1" data-kecamatan="kecamatan1" data-kabkota="kabkota1" data-kelurahan="kelurahan1">alamat 1</option>
                                                <option data-provinsi="provinsi2" data-kecamatan="kecamatan2" data-kabkota="kabkota2" data-kelurahan="kelurahan2">alamat 2</option>
                                                <option data-provinsi="provinsi3" data-kecamatan="kecamatan3" data-kabkota="kabkota3" data-kelurahan="kelurahan3">alamat 3</option>
                                            </select>
                                            <div>
                                                <label for="price">Provinsi</label>
                                                <input type="text" name="provinsi" readonly />
                                                <br>
                                                <label for="price">Kecamatan</label>
                                                <input type="text" name="kecamatan" readonly />
                                                <br>
                                                <label for="price">KabKota</label>
                                                <input type="text" name="kabkota" readonly />
                                                <br>
                                                <label for="price">Kelurahan</label>
                                                <input type="text" name="kelurahan" readonly />
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="thelabel" for="tempattinggal">Tinggal Bersama<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-9">
                                            <select disabled name="tempattinggal" class="form-control theselect" id="">
                                                <option value="">--pilih--</option>
                                                <option value="orangtua">Orang Tua</option>
                                                <option value="wali">Wali</option>
                                                <option value="sendiri">Sendiri</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="anakke" class="thelabel">Anak Ke<sup>*</sup></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input required disabled type="text" name="anakke" class="form-control" style="width: 100px;" maxlength="2" placeholder="Contoh: 01">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="data-orangtua">
                                Data Orang Tua
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="ayah">Nama Ayah</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input required type="text" class="form-control theinput" name="nmayah" placeholder="Contoh: Asep Kurniawan" id="ayah" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="nikayah">NIK Ayah</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input required type="text" class="form-control theinput" name="nikayah" placeholder="Contoh:320000000000000" id="nikayah" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="pkjayah">Pekerjaan Ayah</label>
                                            </div>
                                            <div class="col-md-5">
                                                <select name="pkjayah" id="pkjayah" class="form-control theselect" disabled>
                                                    <option value="">--pilih--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="ibu">Nama Ibu</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input required type="text" class="form-control theinput" name="nmibu" placeholder="Contoh:Tri Rosalinda" id="ibu" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="nikibu">NIK Ibu</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input required type="text" class="form-control theinput" name="nikibu" placeholder="Contoh:320000000000000" id="nikibu" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="pkjibu">Pekerjaan Ibu</label>
                                            </div>
                                            <div class="col-md-9">
                                                <select name="pkjayah" id="pkjayah" class="form-control theselect" disabled>
                                                    <option value="">--pilih--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="data-wali">
                                Data Wali
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="wl">Nama Wali</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input required type="text" class="form-control theinput" name="nmwl" placeholder="Contoh:Anugrah" id="wl" disabled>
                                            </div>
                                            <div class="col-sm-offset-3"></div>
                                            <div class="col-md-9 komentar">Jika Tidak Ada Kosongkan Saja</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="nikwali">NIK Wali</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input required type="text" class="form-control theinput" name="nikwali" placeholder="Contoh:320000000000000" id="nikwali" disabled>
                                            </div>
                                            <div class="col-sm-offset-3"></div>
                                            <div class="col-md-9 komentar">Jika Tidak Ada Kosongkan Saja</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="pkjwl">Pekerjaan Wali </label>
                                            </div>
                                            <div class="col-md-5">
                                                <select name="pkjayah" id="pkjayah" class="form-control theselect" disabled>
                                                    <option value="">--pilih--</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-offset-3"></div>
                                            <div class="col-md-9 komentar">Jika Tidak Ada Kosongkan Saja</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="kontak">
                                Kontak
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="notlprm">Nomor Telepon Rumah</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input required type="text" class="form-control theinput" name="notlprm" placeholder="Contoh:0115 958 1260" id="notlprm" disabled>
                                            </div>
                                            <div class="col-sm-offset-3"></div>
                                            <div class="col-md-9 komentar">Jika Tidak Ada Kosongkan Saja</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="notlp">Nomor Telepon </label>
                                            </div>
                                            <div class="col-md-9">
                                                <input required type="text" class="form-control theinput" name="notlp" placeholder="Contoh: 081210080107 " id="notlp">
                                            </div>
                                            <div class="col-sm-offset-3"></div>
                                            <div class="col-md-9 komentar">Bisa Memakai No Telepon Orang Tua / Anak / Wali</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="thelabel" for="email">Alamat Email </label>
                                            </div>
                                            <div class="col-md-9">
                                                <input required type="email" class="form-control theinput" name="email" placeholder="AdamMarwadi@gmail.com" id="email">
                                            </div>
                                            <div class="col-sm-offset-3"></div>
                                            <div class="col-md-9 komentar">
                                                Bisa Memakai Email Anak / Orang tua / Wali
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input required type="submit" style="float: right; margin-right:30px;" onclick="return confirm('Apakah Data Yang Di Input Sudah Benar ?')" name="action" class="btn btn-success" value="Daftar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
