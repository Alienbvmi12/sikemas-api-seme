<style>
.nm {
	margin:0;
}
.bl {
	font-size: 1.3em;
	font-weight: bolder;
}
.sml {
	font-size: 1em;
	font-weight: 100;
}
.table.table-vcenter th, .table.table-vcenter td {
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
				<a id="aback" href="<?=base_url_admin('user/pesertadidik/baru/'); ?>" class="btn btn-info">Baru </a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>Home</li>
		<li>Peserta didik</li>
	</ul>
	<!-- END Static Layout Header -->

	<div class="block full">
		<div class="row" style="margin-bottom: 1em;">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-bank"></i></span>
					<select id="fl_a_company_id_dari" class="form-control input-select2">
						<option value="">-- Dari Semua --</option>
						<?php if(isset($institusi_list)){ foreach($institusi_list as $cl){ ?>
						<option value="<?=$cl->id?>"><?=$cl->nama?></option>
						<?php }} ?>
					</select>
				</div>
			</div>

			<div class="col-md-3">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input id="fl_sdate" type="text" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="dari tgl" value="<?=date("Y-m-26",strtotime('-30 days'))?>" />
				</div>
			</div>

      <div class="col-md-3">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-blind"></i></span>
          <select id="fl_status" class="form-control">
            <option value="">-- Semua Status --</option>
            <option value="closed">Closed</option>
            <option value="batal">Batal</option>
          </select>
        </div>
      </div>
		</div>
		<div class="row" style="margin-bottom: 1em;">

			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-bank"></i></span>
					<select id="fl_a_company_id_ke" class="form-control input-select2">
						<option value="">-- Ke Semua --</option>
						<?php if(isset($cabang_list)){ foreach($cabang_list as $cl){ ?>
						<option value="<?=$cl->id?>"><?=$cl->nama?> (<?=$cl->kode?>)</option>
						<?php }} ?>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input id="fl_edate" type="text" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="ke tgl" value="<?=date("Y-m-d")?>" />
				</div>
			</div>
			<div class="col-md-3">
				<div class="btn-group pull-right">
					<button id="fl_download" type="button" class="btn btn-default btn-submit"><i class="fa fa-download icon-submit"></i> XLS</button>
					<button id="fl_button" type="button" class="btn btn-info btn-alt btn-submit"><i class="fa fa-filter icon-submit"></i> Filter</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Content -->
	<div class="block full">

		<div class="block-title">
			<h2><strong>Mutasi Stok</strong></h2>
		</div>

		<div class="table-responsive">
			<table id="drTable" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th>Nama Peserta didik</th>
						<th>Nama Ayah</th>
						<th>Nama Wali</th>
						<th>NISN</th>
						<th>Agama</th>
						<th>Telepon</th>
						
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>

	</div>
	<!-- END Content -->
</div>
