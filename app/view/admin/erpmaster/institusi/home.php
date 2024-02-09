<style>
	.nm {
		margin: 0;
	}

	.bl {
		font-size: 1.3em;
		font-weight: bolder;
	}

	.sml {
		font-size: 1em;
		font-weight: 100;
	}

	.table.table-vcenter th,
	.table.table-vcenter td {
		vertical-align: top;
	}

	#modal_barang_cari_table tr {
		cursor: pointer;
	}
</style>
<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-6"></div>
			<div class="col-md-6">
				<div class="btn-group pull-right">
					<a id="aback" href="<?=base_url_admin('erpmaster/institusi/baru/'); ?>" class="btn btn-info">
						<i class="fa fa-plus"></i>
						Baru
					</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>ERP MAaster</li>
		<li>Institusi</li>
	</ul>
	<!-- END Static Layout Header -->

	<div class="block full">
		<div class="row" style="margin-bottom: 1em;">
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-bank"></i></span>
					<select id="fl_a_institusi_id" class="form-control input-select2">
						<option value="">-- Semua --</option>
						<?php foreach($institusi_list as $cl) { ?>
						<option value="<?=$cl->id?>"> <?=$cl->nama?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-blind"></i></span>
					<select id="fl_is_active" class="form-control">
						<option value="">-- Semua Status --</option>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">			
			<div class="col-md-12">
				<div class="btn-group pull-right">
					<?php $this->getThemeElement('page/components/filter_button'); ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Content -->
	<div class="block full">

		<div class="block-title">
			<h2><strong>Institusi</strong></h2>
		</div>

		<div class="table-responsive">
			<table id="drTable" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th>Nama</th>
						<th>Jenis</th>
						<th>Jenjang</th>
						<th>Alamat</th>
						<th>Kode</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>

	</div>
	<!-- END Content -->
</div>