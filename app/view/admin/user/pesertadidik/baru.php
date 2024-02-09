<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?=base_url_admin('user/pesertadidik/'); ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>User</li>
		<li>Peserta Didik</li>
		<li>Baru</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="fbaru" action="<?=base_url_admin('user/pesertadidik/baru/'); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Data Utama</strong></h2>
			</div>
			
			<div class="form-group">
				<div class="col-md-12">
					<label for="ic_siswa_a_institusi_id">Institusi*</label>
					<select id="ic_siswa_a_institusi_id" type="text" name="[c_siswa][a_institusi_id]" class="form-control" required>
						<option value="">--pilih--</option>
						<?php foreach ($institusi_list as $ai) { ?>
							<option value="<?=$ai->id?>"><?=$ai->nama?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-8">
					<label for="ib_user_fnama">Nama*</label>
					<input id="ib_user_fnama" type="text" name="[b_user][fnama]" class="form-control" minlength="2" maxlength="20" placeholder="masukan nama Peserta Didik" required />
				</div>
                <div class="col-md-4">
					<label for="ic_siswa_nomor_induk">Nomor Induk Siswa*</label>
					<input id="ic_siswa_inomor_induk" type="text" name="[c_siswa][nomor_induk]" class="form-control" minlength="2" maxlength="20" placeholder="Masukan No indk siswa" required />
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
