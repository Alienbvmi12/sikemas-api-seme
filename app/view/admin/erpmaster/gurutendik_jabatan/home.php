<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-6">&nbsp;</div>
			<div class="col-md-6">
				<div class="btn-group pull-right">
					<a id="" href="<?=base_url_admin('erpmaster/gurutendik_jabatan/baru/')?>" class="btn btn-info"><i class="fa fa-plus"></i> Baru</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>ERPMaster</li>
		<li>Gurutendik</li>
	</ul>
	<!-- END Static Layout Header -->

	<!-- Content -->
	<div class="block full">

		<div class="block-title">
			<h4><strong>Filter</strong></h4>
		</div>

    <div class="row row-filter">
		<div class="col-md-4">
        <div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-bank"></i>
			</div>
                <select id="ia_institusi_id" name="a_institusi_id" class="form-control input-select2" required>
					<option value="">--Semua--</option>
					<?php foreach($institusi_list as $ins){ ?>
                    <option value="<?=$ins->id?>" data-id="<?=$ins->id?>"><?=$ins->nama?></option>
                    <?php } ?>
				</select>
        </div>
        </div>
        <div class="col-md-4">
        <div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-tags"></i>
			</div>
                <select id="ic_gurutendik_id" name="c_gurutendik_id" class="form-control input-select2" required>
					<option value="">--Semua--</option>
					<?php foreach($gurutendik_list as $gu){ ?>
                    <option value="<?=$gu->id?>" data-id="<?=$gu->id?>"><?=$gu->utype?></option>
                    <?php } ?>
				</select>
        </div>
        </div>
        <div class="col-md-4">
        <div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-user"></i>
			</div>
                <select id="ia_jabatan_id" name="a_jabatan_id" class="form-control input-select2" required>
                    <option value="">--Semua--</option>
                    <?php foreach($jabatan_list as $jab){ ?>
                    <option value="<?=$jab->id?>" data-id="<?=$jab->id?>"><?=$jab->nama?></option>
                    <?php } ?>
				</select>
        </div>
        </div>
        <div class="col-md-4">
        <div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-book"></i>
			</div>
                <select id="ia_matapelajaran_id" name="a_matapelajaran_id" class="form-control input-select2" required>
					<option value="">--Semua--</option>
					<?php foreach($matapelajaran_list as $pel){ ?>
                    <option value="<?=$pel->id?>" data-id="<?=$pel->id?>"><?=$pel->nama?></option>
                    <?php } ?>
				</select>
        </div>
        </div>
        <br>
        <div class="col-md-2">
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
				<input id="fl_maxdate" type="text" class="form-control input-datepicker" placeholder="Ke Tgl" data-date-format="yyyy-mm-dd" value="<?=date('Y-m-t')?>"  />
			</div>
		</div>
        <div class="col-md-2">
            <select id="fl_is_active" class="form-control">
            <option value="">-- Semua --</option>
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
            </select>
            <br />
            <br />
      </div>
      <div class="col-md-2">
			<div class="btn-group pull-right">
            <?php $this->getThemeElement('page/components/filter_button', $__forward); ?>
            </div>
	  </div>

		<div class="table-responsive">
			<table id="drTable" class="table table-vcenter table-condensed table-bordered">
				<thead>
                    <?=$this->cgjm->datatable()->table_headers()?>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
    </div>

	</div>
	<!-- END Content -->

    <!-- Content -->
	<div class="block full">
    <div class="block-title">
        <h2><strong>Data Jabatan Guru Tendik</strong></h2>
    </div>
    <div class="table-responsive">
        <table id="drTable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Institusi</th>
                    <th>Guru Tendik</th>
                    <th>Jabatan</th>
                    <th>Mata Pelajaran</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    </div>
    <!-- END Content -->
</div>
