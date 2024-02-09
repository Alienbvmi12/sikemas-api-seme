<!-- modal profil foto -->
<div id="modal_profil_foto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Ganti Foto</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<form id="fmodal_profil_foto" method="post" enctype="multipart/form-data" action="<?=base_url_admin('profil/edit_foto')?>" class="form-horizontal form-bordered">
					<div class="form-group">
						<input id="iprofil_foto" type="file" name="foto" class="form-control" required />
					</div>
					<div class="form-group form-actions">
						<div class="pull-right">
							<button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-upload icon-submit"></i> Upload</button>
						</div>
					</div>
				</form>
			</div>
			<!-- Modal Body -->

		</div>
	</div>
</div>
<!-- end modal profil foto -->

<!-- modal profil edit -->
<div id="modal_profil_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Edit Profil</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<form id="fmodal_profil_edit" method="post" enctype="multipart/form-data" action="<?=base_url_admin('profil/edit')?>" class="form-horizontal">
					<div class="form-group">
						<div class="col-md-12">
							<label for="imodal_profil_edit_nama">Nama *</label>
							<input id="imodal_profil_edit_nama" type="text" name="nama" class="form-control" value="<?=$sess->admin->nama?>" required />
						</div>
						<div class="col-md-12">
							<label for="imodal_profil_edit_email">Email *</label>
							<input id="imodal_profil_edit_email" type="text" name="email" class="form-control" value="<?=$sess->admin->email?>" required />
						</div>
						<div class="col-md-12">
							<label for="imodal_profil_edit_username">Username *</label>
							<input id="imodal_profil_edit_username" type="text" name="username" class="form-control" minlength="6" value="<?=$sess->admin->username?>" required />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="submit" value="Submit" class="btn btn-primary" />
						</div>
					</div>
				</form>
			</div>
			<!-- Modal Body -->

		</div>
	</div>
</div>
<!-- end modal profil edit -->

<!-- modal profil edit -->
<div id="modal_password_change" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Change Password</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<form id="fmodal_password_change" method="post" enctype="multipart/form-data" action="<?=base_url_admin('profil/edit')?>" class="form-horizontal">
					<div class="form-group">
						<div class="col-md-12">
							<label for="imodal_password_change_oldpassword">Old Password *</label>
							<input id="imodal_password_change_oldpassword" type="password" name="oldpassword" class="form-control" value="" required />
						</div>
						<div class="col-md-12">
							<label for="imodal_password_change_newpassword">New Password *</label>
							<input id="imodal_password_change_newpassword" type="password" name="newpassword" class="form-control" minlength="6" value="" required />
						</div>
						<div class="col-md-12">
							<label for="imodal_password_change_confirm_newpassword">Confirm New Password *</label>
							<input id="imodal_password_change_confirm_newpassword" type="password" name="confirm_newpassword" class="form-control" minlength="6" value="" required />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" value="Submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
						</div>
					</div>
				</form>
			</div>
			<!-- Modal Body -->

		</div>
	</div>
</div>
<!-- end modal profil edit -->
