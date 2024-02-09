<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?=base_url_admin('pesertadidik/'); ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>Pesantren Teyvat</li>
		<li>Data Peserta Didik</li>
		<li>Tambah</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="ftambah" action="<?=base_url_admin('pesertadidik/tambah/'); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Data Utama</strong></h2>
			</div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label for="ia_institusi_id">Nama Peserta Didik*</label>
					<select id="ia_institusi_id" type="text" name="a_institusi_id" class="form-control" required>
						<option value="">--pilih--</option>
						<?php foreach ($institusi_list as $ai) { ?>
							<option value="<?=$ai->id?>"><?=$ai->nama?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-6">
					<label for="ifnama">Nama Peserta Didik*</label>
					<input id="ifnama" type="text" name="fnama" class="form-control" minlength="2" maxlength="20" placeholder="masukan nama Peserta Didik" required />
				</div>
                <div class="col-md-6">
					<label for="inomor_induk">Nomor Induk Siswa*</label>
					<input id="inomor_induk" type="text" name="nomor_induk" class="form-control" minlength="2" maxlength="20" placeholder="Masukan No indk siswa" required />
				</div>
				<div class="col-md-6">
					<label for="icreated_at">Tahun Masuk</label>
					<input id="icreated_at" type="text" name="created_at" class="form-control input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="TTTT-BB-HH" />
				</div>
                <div class="col-md-6">
					<label class="" for="istatus">Status Di Keluarga *</label>
					<input id="istatus" type="text" name="status" class="form-control" minlength="1" placeholder="Masukan Status anda di keluarga" required />
				</div>
			</div>
		</div>
		
		<div class="block full row">
			
			<div class="form-group">
            <div class="col-md-5">
					<label for="iis_visible">Jenis Kelamin</label>
					<select id="iis_visible" name="is_visible" class="form-control">
						<option value="1">Pilih</option>
						<option value="1">Laki-Laki</option>
						<option value="0">Perempuan</option>
					</select>
				</div>
                <div class="col-md-7">
					<label for="itelp">Nomor Telepon Rumha*</label>
					<input id="itelp" type="text" name="telp" class="form-control" minlength="2" maxlength="20" placeholder="Masukan No telp anda..." required />
				</div>
				<div class="col-md-7">
					<label class="" for="inama_ayah">Nama Ayah *</label>
					<input id="inama_ayah" type="text" name="nama_ayah" class="form-control" minlength="1" placeholder="Maskan nama ayah anda..." required />
				</div>
                <div class="col-md-5">
					<label class="" for="ipekerjaan_ayah">Pekerjaan Ayah *</label>
					<input id="ipekerjaan_ayah" type="text" name="pekerjaan_ayah" class="form-control" minlength="1" placeholder="Masukan pekerjaan ayah anda..." required />
				</div>
			</div>
			
		</div>
		<div class="block full row">
			<div class="form-group">
				<div class="col-md-4">
					<label class="" for="inama_wali">Nama Wali</label>
					<input id="inama_wali" type="text" name="nama_wali" class="form-control" minlength="1" maxlength="90" placeholder="Maskan nama Wali anda..." />
				</div>
				<div class="col-md-4">
					<label class="" for="islug">NISN*</label>
					<input id="inisn" type="text" name="nisn" class="form-control" minlength="1" placeholder="NISN" required />
				</div>
				<div class="col-md-4">
					<label class="" for="iagama">agama</label>
					<input id="iagama" type="text" name="agama" class="form-control" minlength="1" placeholder="Agama" />
				</div>
			</div>
			
		</div>
		<div class="block full row">
			
			<div class="form-group">
				<div class="col-md-4">
					<label for="ialamat_peserta">Alamat Perserta didik*</label>
					<input id="ialamat_peserta" type="text" name="alamat_peserta" class="form-control" placeholder="Alamat Peserta Didik" required />
				</div>
				<div class="col-md-4">
					<label for="iasal_sekolah">Asal Sekolah</label>
					<input id="iasal_sekolah" name="asal_sekolah" type="text" class="form-control" minlength="1" placeholder="Asal Sekolah" />
				</div>
				<div class="col-md-4">
					<label for="inama_ibu">Nama Ibu *</label>
					<input id="inama_ibu" type="text" name="nama_ibu" class="form-control" placeholder="Masukan nama ibu anda" />
				</div>
			</div>
		</div>
		<div class="block full row">
			
			<div class="form-group">
                <div class="col-md-4">
					<label for="inama_ibu">pekerjaan ibu *</label>
					<input id="inama_ibu" type="text" name="nama_ibu" class="form-control" placeholder="Masukan nama ibu anda" />
				</div>
				<div class="col-md-4">
					<label for="ialamat_wali">Alamat Wali Peserta didik *</label>
					<input id="ialamat_wali" type="text" name="alamat_wali" class="form-control" placeholder="Alamat Wali" />
				</div>
				<div class="col-md-4">
					<label for="ipekerjaan_wali">Pekerjaan Wali *</label>
					<input id="ipekerjaan_wali" type="text" name="pekerjaan_wali" class="form-control" placeholder="Pekerjaan wali" />
				</div>
			</div>
		</div>
		
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Action</strong></h2>
			</div>
			<div class="row">
				<div class="col-md-8">&nbsp;</div>
				<div class="col-md-4 text-right">
					<div class="btn-group"><input type="submit" value="Simpan" class="btn btn-primary" />
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- END Content -->
</div>	
