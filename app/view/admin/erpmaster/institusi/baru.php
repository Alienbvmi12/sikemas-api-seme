<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?=base_url_admin('erpmaster/institusi/'); ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>ERP Master</li>
		<li>Institusi</li>
		<li>Baru</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="fbaru" action="<?=base_url_admin('erpmaster/institusi/baru/'); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Data Utama</strong></h2>
			</div>
			
			<div class="form-group">
				<div class="col-md-3 col-sm-6 col-lg-2">
					<label for="ijenjang">Jenjang *</label>
					<select id="ijenjang" name="jenjang" class="form-control" required>
						<option value="">--pilih--</option>
						<?php foreach ($jenjang_library as $key=>$value) { ?>
						<option value="<?=$key?>"><?=$value?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-3 col-sm-6 col-lg-2">
					<label for="ikode">Kode *</label>
					<input id="ikode" type="text" name="kode" class="form-control" required />
				</div>
				<div class="col-md-6 col-lg-8">
					<label for="inama">Nama *</label>
					<input id="inama" type="text" name="nama" class="form-control" required />
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-4">
					<label for="itelp">Telp</label>
					<input id="itelp" type="text" name="telp" class="form-control" />
				</div>
				<div class="col-md-offset-5 col-md-3">
					<label for="iis_active">Is Active? *</label>
					<select id="iis_active" name="is_active" class="form-control" required>
						<option value="1">Iya</option>
						<option value="0">Tidak</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label for="ialamat1">Alamat Baris 1 *</label>
					<input id="ialamat1" type="text" name="alamat1" class="form-control" minlength="1" maxlength="32" required />
				</div>
                <div class="col-md-6">
					<label for="ialamat2">Alamat Baris 2</label>
					<input id="ialamat2" type="text" name="alamat2" class="form-control" maxlength="32" />
				</div>
				<div class="col-md-12">
					<?php $this->getThemeElement('page/components/alamat_preset/html'); ?>
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
