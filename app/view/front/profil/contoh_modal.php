<!-- modal option -->
<div id="modal_profil_foto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Change Display Picture</h2>
			</div>
			<!-- END Modal Header -->

			<div class="modal-body">
				<form id="fmodal_profil_foto" method="post" enctype="multipart/form-data" action="<?=base_url_admin('profil/edit_foto')?>">
					<div class="form-group">
						<input id="iprofil_foto" type="file" name="foto" class="form-control" required />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload Image</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- modal profil edit -->
<div id="modal_profil_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Edit Profile</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<form id="fmodal_profil_edit" method="post" enctype="multipart/form-data" action="<?=base_url_admin('profil/edit')?>" class="form-horizontal">
					<div class="form-group">
						<div class="col-md-12">
							<label for="imodal_profil_edit_nama">Nama *</label>
							<input id="imodal_profil_edit_nama" type="text" name="fnama" class="form-control" value="<?=$sess->user->fnama?>" required />
						</div>
						<div class="col-md-12">
							<label for="imodal_profil_edit_telp">Telp *</label>
							<input id="imodal_profil_edit_telp" type="text" name="telp" class="form-control" minlength="4" value="<?=$sess->user->telp?>" required />
						</div>
						<div class="col-md-12">
							<label for="imodal_profil_edit_kelamin">Jenis Kelamin *</label>
							<select id="imodal_profil_edit_kelamin" name="kelamin" class="form-control">
								<option value="">--pilih--</option>
								<option value="1" <?php if(!empty($sess->user->kelamin)) echo 'selected' ?>>Laki-laki</option>
								<option value="0" <?php if(empty($sess->user->kelamin)) echo 'selected' ?>>Perempuan</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" value="Submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i>  Simpan Perubahan</button>
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
							<button type="submit" value="Submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan Perubahan</button>
						</div>
					</div>
				</form>
			</div>
			<!-- Modal Body -->

		</div>
	</div>
</div>
<!-- end modal profil edit -->