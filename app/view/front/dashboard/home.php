<div class="container">
	<?php $this->getThemeElement('dashboard/styles'); ?>
	<h1>Selamat Datang, <?= $sess->user->fnama ?></h1>
	<br />
	<div class="row">
		<?php if (isset ($sess->user->institusi_owner->id) && isset($ai[0])) { ?>
			<?php foreach ($ai as $kotak) { ?>
				<div class="col-sm-4">
					<div class="thumbnail">
						<div class="caption text-center" onclick="location.href='<?= base_url('dashboard/institusi/' . $sess->user->institusi_owner->id) ?>'">
							<div class="position-relative">
								<img src="<?= base_url('media/logo.png') ?>" style="width:72px;height:72px;" />
							</div>
							<h4 id="thumbnail-label">
								<a href="#" target="_blank"><?= $kotak->nama ?></a>
							</h4>
							<p><i class="fa fa-file-text-o light-red lighter bigger-120"></i>&nbsp; <?= ucfirst($sess->user->institusi_owner->utype) ?></p>
							<div calss="thumbnail-description smaller">
								<?= $kotak->alamat1 ?>
								<?= $kotak->alamat2 ?>
								<?= $kotak->kelurahan ?>
								<?= $kotak->kecamatan ?>
								<?= $kotak->kabkota ?>
								<?= $kotak->provinsi ?>
								<?= $kotak->negara ?>
								<?= $kotak->kodepos ?>
							</div>

						</div>
						<div class="caption card-footer text-center">
							<ul class="list-inline">
								<li><i class="people lighter"></i>&nbsp;7 Member Aktif</li>
								<li>&nbsp;</li>
								<li><i class="glyphicon glyphicon-envelope lighter"></i><a href="#">&nbsp;Help</a></li>
							</ul>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>