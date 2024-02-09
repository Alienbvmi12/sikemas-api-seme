<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?=base_url_admin('erpmaster/pengguna_jabatan/'); ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>ERPMaster</li>
		<li>Pengguna Jabatan</li>
		<li>Edit</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="fedit" action="<?=base_url_admin('pengguna_jabatan/edit/'); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Data Utama</strong></h2>
			</div>
			
			<div class="form-group">
				<div class="col-md-4">
					<label for="iea_jabatan_id">Jabatan</label>
					<select id="iea_jabatan_id" type="text" name="a_jabatan_id" class="form-control">
						    <option value="">--pilih--</option>
						    <?php foreach ($jabatan_list as $aj) { ?>
							<option value="<?=$aj->id?>"><?=$aj->nama?></option>
						    <?php } ?>
					</select>
				</div>
                <div class="col-md-4">
					<label for="ienama">Nama</label>
					<input id="ienama" type="text" name="nama" class="form-control">
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
					<label for="ieusername">Username</label>
					<input id="ieusername" type="text" name="username" class="form-control">
				</div>
                <div class="col-md-4">
					<label for="ieemail">Email</label>
					<input id="ieemail" type="email" name="email" class="form-control">
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
