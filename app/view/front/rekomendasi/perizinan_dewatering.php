<div class="row">
  <div class="col-md-12">
    <h1>Dokumen Persyaratan Rekomendasi Teknis</h1>
    <h1>E. Perizinan Dewatering</h1>
    <h2>Identitas Pemohon</h2>
  </div>
</div>
<form id="ftambah" action="page_forms_components.html" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered">
  <input type="hidden" name="utype" value="izin_dewatering">

<div class="row">
  <div class="col-md-12">
      <!-- Bootstrap Colorpicker (classes are initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://mjolnic.github.io/bootstrap-colorpicker/ -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="nama_perusahaan">Nama Perusahaan*</label>
        <div class="col-md-6">
          <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="inpwp">NPWP*</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="inpwp" name="npwp" class="form-control" placeholder="NPWP" minlength="15" required>
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
          <input type="file" id="idata_mat" name="data_mat" class="form-control" placeholder="Data MAT" accept=".pdf">
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
        <label class="col-md-4 control-label" for="idata_survey_geolistrik">Data Survey Geolistrik</label>
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
        <label class="col-md-4 control-label" for="iperusahaan_perencana_sumur">Perusahaan Perencana Sumur</label>
        <div class="col-md-6">
          <input type="file" id="iperusahaan_perencana_sumur" name="perusahaan_perencana_sumur" class="form-control" placeholder="Perusahaan Perencana Sumur">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_perusahaan_perencana_sumur">

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
        <label class="col-md-4 control-label" for="itarget_kedalaman_mat_yang_diturunkan">Target Kedalaman MAT Yang Di Turunkan</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="itarget_kedalaman_mat_yang_diturunkan" name="target_kedalaman_mat_yang_diturunkan" class="form-control" placeholder="Target Kedalaman MAT Yang Diturunkan">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ijumlah_sumur">Jumlah Sumur</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="ijumlah_sumur" name="jumlah_sumur" class="form-control" placeholder="Jumlah Sumur" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_jumlah_sumur">

          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ikedalaman_rata-rara_sumur">Kedalaman Rata-Rata Sumur</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="ikedalaman_rata-rara_sumur" name="kedalaman_rata-rara_sumur" class="form-control" placeholder="Kedalaman Rata-Rata Sumur" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_kedalama_rata-rata_sumur">

          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ijumlah_total_volume_dewatering">Jumlah Total Volume Dewatering</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="ijumlah_total_volume_dewatering" name="jumlah_total_volume_dewatering" class="form-control" placeholder="Jumlah Total Volume Dewatering">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ijangka_waktu_pelaksanaan">Jamka Waktu Pelaksanaan</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="ijangka_waktu_pelaksanaan" name="jangka_waktu_pelaksanaan" class="form-control" placeholder="Jangka Waktu Pelaksanaan">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="irencana_gambar_desain_pondasi_yang_dewatering">Rencana Gambar Desain Pondasi Yan Dewatering</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="file" id="irencana_gambar_desain_pondasi_yang_dewatering" name="rencana_gambar_desain_pondasi_yang_dewatering" class="form-control" placeholder="Rencana Gambar Desain Pondasi Yang Dewatering" accept=".pdf">
            <span class="input-group-addon"><i></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          &nbsp;
        </div>
        <div class="col-md-6">
          <div class="row" id="panelfile_rencana_gambar_desain_pondasi_yang_dewatering">

          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="ilaporan_analisis_geoteknik_pondasi">Laporan Analisis Geoteknik Pondasi</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" id="ilaporan_analisis_geoteknik_pondasi" name="laporan_analisis_geoteknik_pondasi" class="form-control" placeholder="Laporan Analisis Geoteknik Pondasi">
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
