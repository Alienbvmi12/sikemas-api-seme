<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?= base_url_admin('erpmaster/gurutendik_jabatan/'); ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>ERPMaster</li>
		<li>Gurutendik</li>
        <li>Baru</li>
	</ul>
	<!-- END Static Layout Header -->

	<!-- Content -->
	<div class="block full row">
		<div class="block-title">
			<h4><strong>Form Tambah Data</strong></h4>
		</div>
		<form id="ftambah" action="<?= base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="form-bordered form-horizontal" onsubmit="return false;">

			<div class="form-group row">
				<div class="col-md-4">
                    <label for="ia_institusi_id">Institusi *</label>
                        <select id="ia_institusi_id" name="a_institusi_id" class="form-control input-select2" required>
                            <option value="" data-id="null">--pilih--</option>
                            <?php foreach($institusi_list as $ins){ ?>
                            <option value="<?=$ins->id?>" data-id="<?=$ins->id?>"><?=$ins->nama?></option>
                            <?php } ?>
                        </select>
				</div>
				<div class="col-md-4">
                    <label for="ic_gurutendik_id">Guru Tendik *</label>
                        <select id="ic_gurutendik_id" name="c_gurutendik_id" class="form-control input-select2" required>
                            <option value="" data-id="null">--pilih--</option>
                            <?php foreach($gurutendik_list as $gu){ ?>
                            <option value="<?=$gu->id?>" data-id="<?=$gu->id?>"><?=$gu->utype?></option>
                            <?php } ?>
                        </select>
				</div>
				<div class="col-md-4">
                    <label for="ia_jabatan_id">Jabatan *</label>
                        <select id="ia_jabatan_id" name="a_jabatan_id" class="form-control input-select2" required>
                            <option value="" data-id="null">--pilih--</option>
                            <?php foreach($jabatan_list as $jab){ ?>
                            <option value="<?=$jab->id?>" data-id="<?=$jab->id?>"><?=$jab->nama?></option>
                            <?php } ?>
                        </select>
				</div>
                <div class="col-md-4">
                    <label for="ia_matapelajaran_id">Mata Pelajaran</label>
                        <select id="ia_matapelajaran_id" name="a_matapelajaran_id" class="form-control input-select2" required>
                            <option value="" data-id="null">--pilih--</option>
                            <?php foreach($matapelajaran_list as $pel){ ?>
                            <option value="<?=$pel->id?>" data-id="<?=$pel->id?>"><?=$pel->nama?></option>
                            <?php } ?>
                        </select>
				</div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
					<label for="icreated_at">Dibuat Tgl*</label>
					<input id="icreated_at" type="text" class="form-control input-datepicker" value="<?=date('Y-m-d')?>" data-date-format="yyyy-mm-dd" placeholder="TTTT-MM-DD" required>
				</div>
				<div class="col-md-2">
					<label for="iis_active">Status *</label>
					<select id="iis_active" class="form-control" name="is_active">
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>
				</div>
			</div>

			<div class="form-group form-actions row">
				<div class="col-xs-12 text-right">
					<div class="btn-group pull-right">
						<?php $this->getThemeElement('page/components/btn_simpan_perubahan'); ?>
					</div>
				</div>
			</div>

		</div>

	</form>
</div>
