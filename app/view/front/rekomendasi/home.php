<div class="container-fluid">
  <div class="row row-halaman">
    <div class="col-md-4" style="">
      <h1><i class="fa fa-bandcamp"></i> Pelayanan <small>Rekomendasi Teknis</small> </h1>
    </div>
    <div class="col-md-8" style="">
      <div class="row">
        <div class="col-md-12">
          <div class="btn-group pull-right">
            <a href="<?=base_url('rekomendasi/sumur_baru/')?>" class="btn btn-info"><i class="fa fa-plus"></i> Pembangunan Sumur Baru</a>
            <a href="<?=base_url('rekomendasi/perpanjang_izin_sumur/')?>" class="btn btn-info"><i class="fa fa-plus"></i> Perpanjang Izin Sumur</a>
            <a href="<?=base_url('rekomendasi/pembangunan_sumur_pantau/')?>" class="btn btn-info"><i class="fa fa-plus"></i> Sumur Pantau</a>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="btn-group pull-right">
            <a href="<?=base_url('rekomendasi/pembangunan_sumur_imbuhan/')?>" class="btn btn-info"><i class="fa fa-plus"></i> Sumur Imbuhan</a>
            <a href="<?=base_url('rekomendasi/perizinan_dewatering/')?>" class="btn btn-info"><i class="fa fa-plus"></i> Perizinan Dewatering</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3" style="">
      <label for="fl_scdate">Dari Tgl Pengajuan</label>
      <input id="fl_scdate" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="daftar dari tgl">
    </div>
    <div class="col-md-3" style="">
      <label for="fl_ecdate">s.d. Tgl Pengajuan</label>
      <input id="fl_ecdate" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="daftar s.d. tgl">
    </div>
    <div class="col-md-3" style="">
      <label for="fl_is_active">Status</label>
      <select id="fl_is_active" class="form-control">
        <option value="">-- Semua --</option>
        <option value="draft">Draft</option>
        <option value="pengajuan">Pengajuan</option>
        <option value="evaluasi">Evaluasi &amp; Workshop Data</option>
        <option value="diskusi">Home Doctor</option>
        <option value="investigasi">Investigasi</option>
        <option value="selesai">Selesai</option>
      </select>
    </div>
    <div class="col-md-3" style="">
      <br>
      <div class="btn-group pull-right">
        <button type="button" id="fl_download_xls" class="btn btn-default"><i class="fa fa-download"></i> XLS</button>
        <button type="button" id="fl_download_pdf" class="btn btn-default"><i class="fa fa-download"></i> PDF</button>
        <button type="button" id="fl_btn" class="btn btn-default"><i class="fa fa-filter"></i></button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12" style="">
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12" style="">
      <div class="table-responsive">
        <table id="drTable" class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Perusahaan</th>
              <th>Jenis</th>
              <th>Tanggal</th>
              <th>Kab./Kota</th>
              <th>Nama CP</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
