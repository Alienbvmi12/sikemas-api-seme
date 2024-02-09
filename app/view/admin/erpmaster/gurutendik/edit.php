<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?=base_url_admin('erpmaster/gurutendik/'); ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>ERPMaster</li>
		<li>Gurutendik</li>
		<li>Edit</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="fedit" action="<?=base_url_admin('gurutendik/edit/'); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Data Utama</strong></h2>
			</div>
			
			<div class="form-group">
                <div class="col-md-4">
					<label for="ieb_user_id">Nama*</label>
					<select id="ieb_user_id" type="text" name="b_user_id" class="form-control" required>
						<option value="">--pilih--</option>
						    <?php foreach ($pengguna_list as $pl) { ?>
							<option value="<?=$pl->id?>"><?=$pl->fnama?></option>
						    <?php } ?>
					</select>
				</div>
				<div class="col-md-4">
					<label for="iea_institusi_id">Institusi*</label>
					<select id="iea_institusi_id" type="text" name="a_institusi_id" class="form-control" required>
						    <option value="">--pilih--</option>
						    <?php foreach ($institusi_list as $ai) { ?>
							<option value="<?=$ai->id?>"><?=$ai->nama?></option>
						    <?php } ?>
					</select>
				</div>
				<div class="col-md-4">
				    <label for="ieutype">Tipe *</label>
					<select id="ieutype" name="utype" class="form-control" required>
                        <option value="kategori" data-kode="K">Guru</option>
						<option value="kategori" data-kode="S">Dosen</option>
						<option value="kategori" data-kode="D">Staff</option>
                        <option value="kategori" data-kode="O">Lainnya</option>
                    </select>
				</div>
                <div class="col-md-4">
					<label for="iekode">Kode</label>
					<input id="iekode" type="text" name="kode" class="form-control"  placeholder="cth:GTYSD0003" required />
				</div>
				<div class="col-md-4">
					<label for="ienip">NIP</label>
					<input id="ienip" type="text" name="nip" class="form-control" placeholder="Masukkan nip jika tersedia" />
				</div>
                <div class="col-md-4">
					<label for="ienuptk">NUPTK</label>
					<input id="ienuptk" type="text" name="nuptk" class="form-control" placeholder="Masukkan nuptk jika tersedia" required />
				</div>
				<div class="col-md-4">
					<label for="ieis_active" class="control-label">Status</label>
					<select id="ieis_active" name="is_active" class="form-control" required>
						<option value="1">Iya</option>
						<option value="0">Tidak</option>
					</select>
				</div>
			</div>
		</div>

		<div class="block full row">
			<div class="block-title">
				<h2><strong>Biodata</strong></h2>
			</div>
			<div class="form-group">
				<div class="col-md-4">
					<label for="ieemail">Email</label>
					<input id="ieemail" type="email" name="email" class="form-control">
				</div>
				<div class="col-md-4">
					<label class="control-label" for="iekelamin">Jenis Kelamin *</label>
					<select id="iekelamin" name="kelamin" class="form-control">
						<option value="">-- pilih --</option>
						<option value="1">Laki-laki</option>
						<option value="0">Perempuan</option>
					</select>
				</div>
				<div class="col-md-4">
					<label for="ietelp">Telp</label>
					<input id="ietelp" type="number" name="telp" class="form-control" minlength="8">
				</div>
				<div class="col-md-4">
					<label for="iebirth_place">Tempat Lahir</label>
					<input id="iebirth_place" type="text" name="birth_place" class="form-control" minlength="1" value="">
				</div>
				<div class="col-md-4">
					<label for="iebirth_date">Tanggal Lahir</label>
					<input id="iebirth_date" type="text" name="birth_date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" minlength="10" maxlength="10" value="<?=date('Y-m-t')?>" />
				</div>
				<div class="col-md-4">
					<label for="ieumur">Umur</label>
					<input id="ieumur" type="number" name="umur" class="form-control">
				</div>
				<div class="col-md-4">
					<label for="iepekerjaan">Pekerjaan</label>
					<input id="iepekerjaan" type="text" name="pekerjaan" class="form-control">
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
					<div class="btn-group">
						<?php $this->getThemeElement('page/components/btn_simpan', $__forward); ?>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- END Content -->
</div>	
