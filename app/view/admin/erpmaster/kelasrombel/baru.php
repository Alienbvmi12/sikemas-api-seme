<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?=base_url_admin('erpmaster/kelasrombel/'); ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>ERPMaster</li>
		<li>Kelas Rombel</li>
		<li>Baru</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="ftambah" action="<?=base_url_admin('kelasrombel/tambah/'); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Data Utama</strong></h2>
			</div>
			
			<div class="form-group">
				<div class="col-md-6">
					<label for="ia_institusi_id">Institusi*</label>
					<select id="ia_institusi_id" type="text" name="a_institusi_id" class="form-control" required>
						    <option value="">--pilih--</option>
						    <?php foreach ($institusi_list as $ai) { ?>
							<option value="<?=$ai->id?>"><?=$ai->nama?></option>
						    <?php } ?>
					</select>
				</div>
                <div class="col-md-6">
					<label for="ijenjang_kelas">Jenjang Kelas*</label>
					<select id="ijenjang_kelas" name="jenjang_kelas" class="form-control" required>
						<option value="">--pilih--</option>
						<?php foreach ($jenjang_kelas as $key=>$value) { ?>
						<option value="<?=$key?>"><?=$value?></option>
						<?php } ?>
					</select>
				</div>
                <div class="col-md-4">
					<label for="inama">Nama Kelas*</label>
					<input id="inama" type="text" name="nama" class="form-control" required>
				</div>
                <div class="col-md-4">
					<label for="ikonsentrasi">Konsentrasi</label>
					<input id="ikonsentrasi" type="text" name="konsentrasi" class="form-control">
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
