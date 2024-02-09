<div class="row">
  <div class="col-md-12">
    <h1>Rekomendasi Teknis</h1>
    <h1>D. Pembangunan Sumur Pantau</h1>
    <h2>Identitas Pemohon</h2>
  </div>
</div>
<form id="ftambah" action="page_forms_components.html" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered">
  <input type="hidden" name="utype" value="sumur_pantau">

<div class="row">
  <div class="col-md-12">
      <!-- Bootstrap Colorpicker (classes are initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://mjolnic.github.io/bootstrap-colorpicker/ -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="nama_perusahaan">Nama Perusahaan</label>
        <div class="col-md-6">
          <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="inpwp">NPWP</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="inpwp" name="npwp" class="form-control" placeholder="NPWP" minlength="15">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="ialamat">Alamat</label>
        <div class="col-md-6">
          <input type="text" id="ialamat" name="alamat" class="form-control" placeholder="Alamat">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="iemail">Email</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="email" id="iemail" name="email" class="form-control" placeholder="Email">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="ibukti_pembayaran_terakhir">Bukti pembayaran Terkhir</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="ibukti_pembayaran_terakhir" name="bukti_pembayaran_terakhir" class="form-control" placeholder="Bukti Pembayaran Terkhir" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_bukti_pembayaran_terakhir">

          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="inama_direktur">Nama Direktur</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="inama_direktur" name="nama_direktur" class="form-control" placeholder="Nama Diektur">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="inpwp2">NPWP2</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="inpwp2" name="npwp2" class="form-control" placeholder="NPWP2">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="inama_cp">Nama CP</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="inama_cp" name="nama_cp" class="form-control" placeholder="Nama CP">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="iemail2">Email2</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="iemail2" name="email2" class="form-control" placeholder="Email2">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ino_hp">No Hp</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="ino_hp" name="no_hp" class="form-control" placeholder="No Hp">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="isurat_penugasan">Surat Penugasan</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="isurat_penugasan" name="surat_penugasan" class="form-control" placeholder="Surat Penugasan" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_surat_penugasan">

          </div>
        </div>
      </div>

  </div>
</div>





<div class="row">
  <div class="col-md-12">
    <h1>Data Lokasi</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
      <!-- Bootstrap Colorpicker (classes are initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://mjolnic.github.io/bootstrap-colorpicker/ -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="isurat_pemohonan">Surat Pemohonan</label>
        <div class="col-md-6">
          <input type="file" id="isurat_pemohonan" name="surat_pemohonan" class="form-control" placeholder="Surat Pemohonan" accept=".pdf">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_surat_pemohonan">

          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="igambar_denah_bangunan_dan_titiknya">Gambar Denah Dangunan Dan Titiknya</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="igambar_denah_bangunan_dan_titiknya" name="gambar_denah_bangunan_dan_titiknya" class="form-control" placeholder="Gambar Denah Bangunan Dan Titiknya" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_gambar_denah_bangunan_dan_titiknya">

          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="ikoordinat_x">Koordinat X</label>
        <div class="col-md-6">
          <input type="text" id="ikoordinat_x" name="koordinat_x" class="form-control" placeholder="Koordinat X">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="i_koordinat_y">Koordinat Y</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="ikoordinat_y" name="koordinat_y" class="form-control" placeholder="Koordinat Y">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="ikelurahan_desa">Kelurahan/Desa</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="ikelurahan_desa" name="kelurahan_desa" class="form-control" placeholder="Kelurahan/Desa">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="ikecamatan">Kecamatan</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="ikecamatan" name="kecamatan" class="form-control" placeholder="Kecamatan">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="ikabupaten_kota">Kabupaten/Kota</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="ikabupaten_kota" name="Kabupaten_kota" class="form-control" placeholder="Kabupaten/Kota">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="iprovinsi">Provinsi</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="iprovinsi" name="provinsi" class="form-control" placeholder="Provinsi">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="inama_cekungan_air_tanah">Nama Cekungan Air Tanah (CAT)</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="inama_cekungan_air_tanah" name="nama_cekungan_air_tanah" class="form-control" placeholder="Nama Cekungan Air Tanah (CAT)">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="iformasi_geologi">Formasi Geologi</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="iformasi_geologi" name="formasi_geologi" class="form-control" placeholder="Formasi Geologi">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="iposisi_pada_peta_zona_konservasi">Posisi Pada Peta Zona Konservasi</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="iposisi_pada_peta_zona_konservasi" name="posisi_pada_peta_zona_konservasi" class="form-control" placeholder="Posisi Pada Peta Zona Konservasi">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <h1>Data Teknis</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
      <!-- Bootstrap Colorpicker (classes are initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://mjolnic.github.io/bootstrap-colorpicker/ -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="idata_mat">Data MAT</label>
        <div class="col-md-6">
          <input type="file" id="idata_mat" name="data_mat" class="form-control" placeholder="Data Mat" accept=".pdf">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_data_mat">

          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="idata_survey_geolistrik">Data Survey Geologi</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="idata_survey_geolistrik" name="data_survey_geolistrik" class="form-control" placeholder="Data Survey Geolistrik" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_data_survey_geolistrik">

          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="ineraca_penggunaan_air">Neraca Penggunaan Air</label>
        <div class="col-md-6">
          <input type="file" id="ineraca_penggunaan_air" name="neraca_penggunaan_air" class="form-control" placeholder="Neraca Penggunaan Air" accept=".pdf">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_neraca_penggunaan_air">

          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="idata_log_bor_dan_desain_sumur">Data Log Bor Dan Desain Sumur</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="idata_log_bor_dan_desain_sumur" name="data_log_bor_dan_desain_sumur" class="form-control" placeholder="Data Log Bor dan desain sumur">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="idata_logging">Data Logging</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="idata_logging" name="data_logging" class="form-control" placeholder="Data Logging" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_data_logging">

          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="idata_kualitas_air_hujan">Data Kualitas Air Hujan</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="idata_kualitas_air_hujan" name="gambar_rencana_prasarana_penggunaan" class="form-control" placeholder="Data Kualitas Air Hujan" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_data_kualitas_air_hujan">

          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ilaporan_pemakaian_pdam">Laporan Pemakaian PDAM</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="ilaporan_pemakaian_pdam" name="laporan_pemakaian_pdam" class="form-control" placeholder="Laporan Pemakaian PDAM" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_laporan_pemakaian_pdam">

          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ineraca_penggunaan_air">Neraca Penggunaan Air</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="ineraca_penggunaan_air" name="neraca_penggunaan_air" class="form-control" placeholder="neraca_penggunaan_air" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_neraca_penggunaan_air">

          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="iperusahaan_perencana_sumur">Perusahaan Perencana Sumur</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="iperusahaan_perencana_sumur" name="perusahaan_perencana_sumur" class="form-control" placeholder="Perusahaan Perencana Sumur">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="inpwp3">NPWP3</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="inpwp3" name="npwp3" class="form-control" placeholder="NPWP3">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="igambar_denah_bangunan_dan_titiknya">Gambar Denah Bangunan Dan Titiknya</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="igambar_denah_bangunan_dan_titiknya" name="gambar_denah_bangunan_dan_titiknya" class="form-control" placeholder="Gambar Denah Bangunan Dan Titiknya" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_gambar_denah_bangunan_dan_titiknya">

          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ijumlah_sumur_yang_sudah_ada">Jumlah Sumur Yang Sudah Ada</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="ijumlah_sumur_yang_sudah_ada" name="ijumlah_sumur_yang_sudah_ada" class="form-control" placeholder="Jumlah Sumur Yang Sudah Ada" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_jumlah_sumur_yang_sudah_ada">

          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ijumlah_volume_pengambilan_air_tanah_saat_ini">Jumlah Volume Pengambilan Air Tanah Saat Ini</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="ijumlah_volume_pengambilan_air_tanah_saat_ini" name="jumlah_volume_pengambilan_air_tanah_saat_ini" class="form-control" placeholder="Jumlah Volume Pengambilan Air Tanah Saat Ini" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_jumlah_volume_pembelian_air_tanah_saat_ini">

          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ispesifikasi_alat_yang_di_gunakan">Spesifikasi Alat Yang Di digunakan</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="ispesifikasi_alat_yang_di_gunakan" name="ispesifikasi_alat_yang_di_gunakan" class="form-control" placeholder="Spesifikasi alat yang di Gunakan" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_spesifikasi_alat_yang_digunakan">

          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ipetugas_sumur_pantau">Petugas sumur pantau</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="ipetugas_sumur_pantau" name="petugas_sumur_pantau" class="form-control" placeholder="petugas sumur pantau">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

  </div>
</div>
<div class="form-group form-actions">
  <div class="col-md-8 col-md-offset-4">
    <button type="reset" class="btn btn-default"><i class="fa fa-repeat"></i> Reset</button>
    <button type="submit" class="btn btn-primary btn-submit">Simpan &amp; Kirim Pengajuan <i class="fa fa-chevron-right"></i></button>
  </div>
</div>
</form>
