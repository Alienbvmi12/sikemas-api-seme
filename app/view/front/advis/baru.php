<section>
  <form id="ftambah" action="<?=base_url('advis/proses/')?>" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
    <div class="row">
      <div class="col-md-12">
        <h1>Pelayanan Advis Teknis</h1>
        <p>Silakan lengkapi form pelayanan advis teknis.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <fieldset>
          <legend>1. Identitas Pemohon</legend>
          <div class="form-group">
            <label class="col-md-4 control-label" for="inama_bws">Nama BWS / BBWS *</label>
            <div class="col-md-6">
              <input type="text" id="inama_bws" name="nama_bws" class="form-control" placeholder="Nama BWS / BBWS" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="inama_pj">Nama subbid / Nama penanggung jawab</label>
            <div class="col-md-6">
              <input type="text" id="inama_pj" name="nama_pj" class="form-control" placeholder="Nama subbid / Nama penanggung jawab">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="inohp_pj">No Hp</label>
            <div class="col-md-6">
              <input type="text" id="inohp_pj" name="nohp_pj" class="form-control" placeholder="No Hp untuk Penanggung Jawab">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="inama_ppk">Nama PPK *</label>
            <div class="col-md-6">
              <input type="text" id="inama_ppk" name="nama_ppk" class="form-control" placeholder="Nama PPK"  required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="inohp_ppk">No HP *</label>
            <div class="col-md-6">
              <input type="text" id="inohp_ppk" name="nohp_ppk" class="form-control" placeholder="No Hp untuk PPK" required>
            </div>
          </div>
        </fieldset>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <fieldset>
          <legend>2. Data Lokasi</legend>
          <!-- Bootstrap Colorpicker (classes are initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://mjolnic.github.io/bootstrap-colorpicker/ -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="isurat_permohonan">Surat Permohonan</label>
            <div class="col-md-6">
              <input type="file" id="isurat_permohonan" name="surat_permohonan" class="form-control input-file-limit" data-lampiranid="" placeholder="Surat Permohonan" accept=".pdf">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              &nbsp;
            </div>
            <div class="col-md-6">
              <div class="row" id="panelfile_surat_permohonan">

              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="ideskripsi_permasalahan">Deskripsi Permasalahan</label>
            <div class="col-md-6">
              <div class="">
                <textarea type="text" id="ideskripsi_permasalahan" name="deskripsi_permasalahan" class="form-control" placeholder="Deskripsi permasalahan"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="foto1">Lampiran Foto-Foto</label>
            <div class="col-md-6">
              <ul id="ulfoto" style="list-style: none;">
                <li>
                  <div class="input-group">
                    <input type="file" id="ifoto" name="foto" data-lampiranid="" data-utype="multiplefile" class="form-control input-file-limit" placeholder="Lampiran Foto-Foto" accept=".jpg">
                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs btn-file-add" data-id="ifoto"><i class="fa fa-plus"></i></button></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              &nbsp;
            </div>
            <div class="col-md-6">
              <div class="row" id="panelfile_foto">

              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="ifile_sketsa1">Lampiran gambar desain / sketsa teknik</label>
            <div class="col-md-6">
              <ul id="ulfoto" style="list-style: none;">
                <li>
                  <div class="input-group">
                    <input type="file" id="ifile_sketsa" name="file_sketsa" data-lampiranid="" data-utype="multiplefile" class="form-control" placeholder="Lampiran gambar desain / sketsa teknik" accept=".jpg">
                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs btn-file-add" data-id="ifile_sketsa"><i class="fa fa-plus"></i></button></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              &nbsp;
            </div>
            <div class="col-md-6">
              <div class="row" id="panelfile_file_sketsa">

              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="ikoor_x">Koordinat X</label>
            <div class="col-md-6">
              <input type="text" id="ikoor_x" name="koor_x" class="form-control" placeholder="Koordinat X">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="ikoor_y">Koordinat Y</label>
            <div class="col-md-6">
              <input type="text" id="ikoor_y" name="koor_y" class="form-control" placeholder="Koordinat Y">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="idesa">Kelurahan / Desa</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" id="idesa" name="desa" class="form-control" placeholder="Kelurahan / Desa">
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
            <label class="col-md-4 control-label" for="ikabkota">Kabupaten / Kota</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" id="kabkota" name="kabkota" class="form-control" placeholder="Kabupaten / Kota">
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
            <label class="col-md-4 control-label" for="inama_cat">Nama Cekungan Air Tanah (CAT)</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" id="inama_cat" name="nama_cat" class="form-control" placeholder="Nama Cekungan Air Tanah (CAT)">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="iformasi_geologi">Formasi Geologi (Peta Geologi)</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" id="iformasi_geologi" name="formasi_geologi" class="form-control" placeholder="Formasi Geologi (Peta Geologi)">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="iposisi_peta_zona_konservasi">Posisi Pada Peta Zona Konservasi</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" id="iposisi_peta_zona_konservasi" name="posisi_peta_zona_konservasi" class="form-control" placeholder="Posisi Pada Peta Zona Konservasi">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="ioutcome_infra">Outcome Infrastruktur</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" id="ioutcome_infra" name="outcome_infra" class="form-control" placeholder="Outcome Infrastruktur">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="ioutput_infra">Output Infrastruktur</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" id="ioutput_infra" name="output_infra" class="form-control" placeholder="Output Infrastruktur">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="irencana_volume_pengambilan">Rencana Volume Pengambilan</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" id="irencana_volume_pengambilan" name="rencana_volume_pengambilan" class="form-control" placeholder="Rencana Volume Pengambilan">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="ijenis_kegiatan">Jenis Kegiatan</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" id="jenis_kegiatan" name="jenis_kegiatan" class="form-control" placeholder="Jenis Kegiatan">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <fieldset>
          <legend>3. Data teknis</legend>
          <!-- Bootstrap Colorpicker (classes are initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://mjolnic.github.io/bootstrap-colorpicker/ -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="idata_mat">Data MAT</label>
            <div class="col-md-6">
              <input type="file" id="idata_mat" name="data_mat" data-lampiranid="" class="form-control" placeholder="Data MAT" accept=".jpg,.mat,.pdf">
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
                <input type="file" id="idata_survey_geolistrik" data-lampiranid="" name="data_survey_geolistrik" class="form-control" placeholder="Data Survey Geolistrik" accept=".pdf">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>
          <div class="row" id="panelfile_data_survey_geolistrik" class="form-group">
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idata_log_bor_dan_desain_sumur">Data Log Bor dan Desain sumur </label>
            <div class="col-md-6">
              <input type="file" id="idata_log_bor_dan_desain_sumur" name="data_log_bor_dan_desain_sumur" data-lampiranid="" class="form-control" placeholder="Data Log Bor dan desain sumur" accept=".pdf">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              &nbsp;
            </div>
            <div class="col-md-6">
              <div class="row" id="panelfile_data_log_bor_dan_desain_sumur">

              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idata_logging">Data Logging</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="file" id="idata_logging" name="data_logging" class="form-control" data-lampiranid="" placeholder="Data Logging">
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
            <label class="col-md-4 control-label" for="idata_kualitas_air_tanah">Data Kualitas Air Tanah</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="file" id="idata_kualitas_air_tanah" name="data_kualitas_air_tanah" class="form-control" data-lampiranid="" placeholder="Data Kualitas Air Tanah" accept=".pdf">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              &nbsp;
            </div>
            <div class="col-md-6">
              <div class="row" id="panelfile_data_kualitas_air_tanah">

              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="ilaporan_neraca_air">Laporan Neraca air</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="file" id="ilaporan_neraca_air" name="laporan_neraca_air" class="form-control" data-lampiranid="" placeholder="Lapaoran Neraca Air" accept=".pdf">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              &nbsp;
            </div>
            <div class="col-md-6">
              <div class="row" id="panelfile_laporan_neraca_air">

              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="inama_perusahaan_penyedia_jasa">Nama Perusahaan penyedia jasa</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" id="inama_perusahaan_penyedia_jasa" name="nama_perusahaan_penyedia_jasa" class="form-control" placeholder="Nama Perusahaan Penyadia jasa" accept=".pdf">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="icatatan_penggunaan_air_tanah_sekitar_lokasi">Catatan Penggunaan Air tanah sekitar lokasi</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" id="icatatan_penggunaan_air_tanah_sekitar_lokasi" name="catatan_penggunaan_air_tanah_sekitar_lokasi" class="form-control" placeholder="Catatan Penggunaan Air Tanah sekitar lokasi">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="idesain_infra_penunjang">Gambar desain infrastruktur penunjang</label>
            <div class="col-md-6">
              <div class="input-group">
                <input type="file" id="idesain_infra_penunjang" name="desain_infra_penunjang" class="form-control" data-lampiranid="" placeholder="Gambar desain infrastruktur penunjang" accept=".pdf">
                <span class="input-group-addon"><i></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              &nbsp;
            </div>
            <div class="col-md-6">
              <div class="row" id="panelfile_desain_infra_penunjang">

              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
    <div class="form-group form-actions">
      <div class="col-md-8 col-md-offset-4">
        <button type="reset" class="btn btn-default"><i class="fa fa-repeat"></i> Reset</button>
        <button type="submit" class="btn btn-primary btn-submit">Simpan &amp; Kirim Pengajuan <i class="icon-submit fa fa-chevron-right"></i></button>
      </div>
    </div>
  </form>
</section>
