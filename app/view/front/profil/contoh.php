<?php
$user_foto = '';
if(isset($sess->user->foto)) $user_foto = $sess->user->foto;
if(strlen($user_foto)<=4) $user_foto = 'media/user-default.png';
$user_foto = $this->cdn_url($user_foto);
?>

<!-- Content -->
<?php if(isset($notif)){ ?>
	<div class="alert alert-info" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<?=$notif?>
	</div>
<?php } ?>
<div class="row">
	<div class="col-md-3">
		<form id="fupload_logo_kotak" action="<?=base_url('profil/edit_foto')?>" class="general-form" role="form" method="post" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
			<a id="bupload_logo_kotak" href="#" class="btn btn-default btn-sm"><i class=" fa fa-camera"></i></a>
			<input id="ilogo_kotak" class="hidden" name="logo_kotak" type="file" accept="image/png, image/jpeg">
		</form>
		<div class="text-center">
			<img src="<?=$user_foto?>" style="width: 100%;" class="img-responsive" onerror="this.onerror=null;this.src='<?=$this->cdn_url()?>media/user-default.png'" />
		</div>
	</div>
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-12">
				<div class="btn-group pull-right">
					<button id="profil_password_ganti" type="button" class="btn btn-default"><i class="fa fa-key"></i> Ganti password</button>
					<button id="profil_edit_modal" type="button" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</button>
				</div>
			</div>
			<div class="col-md-12">
				<br>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-borderless">
				<tr>
					<th>Nama</th>
					<td>:</td>
					<td><?=$sess->user->fnama?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td>:</td>
					<td><?=$sess->user->email?></td>
				</tr>
				<tr>
					<th>Telp</th>
					<td>:</td>
					<td><?=$sess->user->telp?></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td>:</td>
					<td><?=(!empty($sess->user->kelamin)) ? 'Laki-laki' : 'Perempuan'?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
