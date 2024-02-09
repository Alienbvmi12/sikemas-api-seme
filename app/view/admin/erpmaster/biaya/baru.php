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
		<li>Biaya</li>
		<li>Baru</li>
	</ul>
	<!-- END Static Layout Header -->

	<!-- Content -->
	<form id="fbaru" action="<?=base_url_admin('erpmaster/Biaya/baru/'); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Data Utama</strong></h2>
			</div>

			<div class="form-group">
				<div class="col-md-6">
					<label for="ia_institusi_id">Institusi *</label>
					<select id="ia_institusi_id" name="a_institusi_id" class="form-control" required>
						<option value="">--pilih--</option>
						<?php foreach ($institusi_list as $key=>$value) { ?>
							<option value="<?=$value->id?>"><?=$value->nama?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-6">
					<label for="ia_tahunajaran_id">Tahun ajaran *</label>
					<select id="ia_tahunajaran_id" name="a_tahunajaran_id" class="form-control" required>
						<option value="">--pilih--</option>
						<?php foreach ($tahunajaran_list as $key=>$value) { ?>
							<option value="<?=$value->id?>"><?=$value->nama?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">
					<label for="inominal">Nominal *</label>
					<input id="inominal" type="text" name="nominal" class="form-control" required />
				</div>
				<div class="col-md-4">
					<label for="iis_active">Status *</label>
					<select id="iis_active" name="is_active" class="form-control" required>
						<option value="">--pilih--</option>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
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
