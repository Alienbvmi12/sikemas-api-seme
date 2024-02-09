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
		<li>Tambah</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="ftambah" action="<?=base_url_admin('gurutendik/tambah/'); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Data Utama</strong></h2>
			</div>
			
			<div class="form-group">
                <div class="col-md-4">
					<label for="ifnama">Nama*</label>
					<input id="ifnama" type="text" name="fnama" class="form-control" required>
				</div>
				<div class="col-md-4">
					<label for="ia_institusi_id">Institusi*</label>
					<select id="ia_institusi_id" type="text" name="a_institusi_id" class="form-control" required>
						    <option value="">--pilih--</option>
						    <?php foreach ($institusi_list as $ai) { ?>
							<option value="<?=$ai->id?>"><?=$ai->nama?></option>
						    <?php } ?>
					</select>
				</div>
				<div class="col-md-4">
				    <label for="iutype">Tipe *</label>
					<select id="iutype" name="utype" class="form-control" required>
						<option value="">--pilih--</option>
                        <option value="guru">Guru</option>
						<option value="dosen">Dosen</option>
						<option value="staf">Staf</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
				</div>
                <div class="col-md-4">
					<label for="ikode">Kode</label>
					<input id="ikode" type="text" name="kode" class="form-control"  placeholder="cth:GTYSD0003" />
				</div>
				<div class="col-md-4">
					<label for="inip">NIP</label>
					<input id="inip" type="text" name="nip" class="form-control" placeholder="Masukkan nip jika tersedia" />
				</div>
                <div class="col-md-4">
					<label for="inuptk">NUPTK</label>
					<input id="inuptk" type="text" name="nuptk" class="form-control" placeholder="Masukkan nuptk jika tersedia" />
				</div>
				<div class="col-md-4">
					<label for="iis_active" class="control-label">Status</label>
					<select id="iis_active" name="is_active" class="form-control" required>
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
					<label for="iemail">Email</label>
					<input id="iemail" type="email" name="email" class="form-control">
				</div>
				<div class="col-md-4">
					<label class="control-label" for="ikelamin">Jenis Kelamin *</label>
					<select id="ikelamin" name="kelamin" class="form-control">
						<option value="">-- pilih --</option>
						<option value="1">Laki-laki</option>
						<option value="0">Perempuan</option>
					</select>
				</div>
				<div class="col-md-4">
					<label for="itelp">Telp</label>
					<input id="itelp" type="number" name="telp" class="form-control" minlength="8">
				</div>
				<div class="col-md-4">
					<label for="ibirth_place">Tempat Lahir</label>
					<input id="ibirth_place" type="text" name="birth_place" class="form-control" minlength="1" value="">
				</div>
				<div class="col-md-4">
					<label for="ibirth_date">Tanggal Lahir</label>
					<input id="ibirth_date" type="text" name="birth_date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" minlength="10" maxlength="10" value="<?=date('Y-m-t')?>" />
				</div>
				<div class="col-md-4">
					<label for="iumur">Umur</label>
					<input id="iumur" type="number" name="umur" class="form-control">
				</div>
				<div class="col-md-4">
					<label for="ipekerjaan">Pekerjaan</label>
					<input id="ipekerjaan" type="text" name="pekerjaan" class="form-control">
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
