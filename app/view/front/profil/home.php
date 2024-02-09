
<?php
$user_foto = '';
if (isset($sess->user->foto)) $user_foto = $sess->user->foto;
if (strlen($user_foto) <= 4) $user_foto = 'media/pengguna';
$user_foto = $this->cdn_url($user_foto);
?>

<!-- Content -->
<?php if (isset($notif)) { ?>
	<div class="alert alert-info" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<?= $notif ?>
	</div>
<?php } ?>

<style>
	.edit-btn {
		border-radius: 0px 5px 5px 0px;
		background: #0561A5;
		box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;
		color: white;
	}

	.ganti-password-btn {
		background: #BDBBBB;
	}

	.ganti-foto-btn {
		background: #D9D9D9;
	}

	table.table-border-bottom {
		width: 100%;
		border-collapse: collapse;
	}

	table.table-border-bottom tr {
		font-size: 17px;
		border-bottom: 1px solid #D9D9D9;
	}

	table.table-border-bottom tr td {
		padding: 20px;
	}
</style>

<div class="row" style="padding : 20px;">
	<div class="col-md-5">
		<!-- <form id="fupload_logo_kotak" action="<?= base_url('profil/edit_foto') ?>" class="general-form" role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
			<a id="bupload_logo_kotak" href="#" class="btn btn-default btn-sm"><i class=" fa fa-camera"></i></a>
			<input id="ilogo_kotak" class="hidden" name="logo_kotak" type="file" accept="image/png, image/jpeg">
		</form> -->
		<div class="text-center">
			<img src="<?= $user_foto ?>" style="width: 100%;" class="img-responsive" onerror="this.onerror=null;this.src='<?= $this->cdn_url() ?>media/user-default.png'" />
		</div>
	</div>
	<div class="col-md-7">
		<div class="row">
			<div class="col-md-12">
				<div class="btn-group pull-right" style="flex : 15%">
					<button class="btn btn-default" id="profil_foto" data-toggle="modal" data-target="#modal_profil_foto"><i class="bi bi-image-fill"></i> Ganti Foto</button>
					<button class="btn btn-info" id="profil_password_modal" data-toggle="modal" data-target="#modal_password_change"><i class="bi bi-key-fill"></i> Ganti Password</button>
					<button class="btn btn-primary" id="profil_edit_modal" data-toggle="modal" data-target="#modal_profil_edit"><i class="bi bi-pencil"></i> Edit</button>
				</div>
			</div>
			<div class="col-md-12">
				<div style="display : grid; flex : 85%; place-items : center; padding-top : 40px;">
					<div class="table-responsive" style="height : 100%;">
						<table id="profile-table" class="table-border-bottom">
							<tr>
								<th>Nama</th>
								<td>:</td>
								<td><?= $sess->user->fnama . " " . $sess->user->lnama ?? "Guest" ?> </td>
							</tr>
							<tr>
								<th>Email</th>
								<td>:</td>
								<td><?= $sess->user->email ?? "Guest" ?></td>
							</tr>
							<tr>
								<th>Telp</th>
								<td>:</td>
								<td><?= $sess->user->telp ?? "Guest" ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>



<?php $this->getThemeElement('profil/alamat', $__forward); ?>