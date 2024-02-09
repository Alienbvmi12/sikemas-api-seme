<style>
@keyframes fadeIn {
  0% {
    -webkit-transform: scale(0);
            transform: scale(0);
    opacity: 0.0;
	}
  100% {
    -webkit-transform: scale(1.05);
            transform: scale(1.05);
    opacity: 1;
		}
}

@-webkit-keyframes fadeIn {
  0% {
    -webkit-transform: scale(0);
    opacity: 0.0;
	}
  100% {
    -webkit-transform: scale(1.05);
    opacity: 1;
		}
	}

.animation-fadeIn {
  animation-name: fadeIn;
  -webkit-animation-name: fadeIn;
  animation-duration: 1.5s;
  -webkit-animation-duration: 1.5s;
  animation-timing-function: ease-in-out;
  -webkit-animation-timing-function: ease-in-out;
  visibility: visible !important;
}
.navbar-form-custom .form-control:hover, .navbar-form-custom .form-control:focus, .navbar-form, .navbar-collapse, .form-control, .form-control:focus, .has-success .form-control:focus, .has-warning .form-control:focus, .has-error .form-control:focus, .popover, .progress, .progress-bar, .btn.active, .open .btn.dropdown-toggle, .panel {
    box-shadow: none;
}
.push-bit {
    margin-bottom: 10px !important;
}
.block {
    margin: 0 0 0.55em;
    padding: 0.5em;
    background-color: #ffffff;
    border: 1px solid #dbe1e8;
		border-top: 4px solid #fac80a;
}
.form-bordered .form-group {
    margin: 0;
    border: none;
    padding: 15px;
    border-bottom: 1px dashed #eaedf1;
}
.form-bordered .form-group.form-actions {
    background-color: #f9fafc;
    border-bottom: none;
}

.form-control-borderless .form-control, .form-control-borderless .input-group-addon, .form-control-borderless, .form-control-borderless:focus {
    border: transparent !important;
}
input[type="text"].form-control, input[type="password"].form-control, input[type="email"].form-control, textarea.form-control {
    -webkit-appearance: none;
}
.instruction * {
	color: #000000;
}
.instruction h1 {
	margin-top: 0;
	padding-top: 0;
	line-height: 1;
	color: #4a4a4a;
	font-size: 1.5em;
}
.instruction p {
	line-height: 1;
	color: #a4a4a4;
	font-size: 1.1em;
}
.col-1-login-cfg {
	margin-top: 0vh;
}
label {
  color: #1c1c1c;
}
@media only screen and (max-width: 1024px) {
	.instruction h1 {
		font-size: 1.43em;
	}
	.instruction p {
		font-size: 1.1em;
	}
	.col-1-login-cfg {
		margin-top: 5vh;
	}
}
@media only screen and (max-width: 768px) {
	.instruction h1 {
		font-size: 1.35em;
	}
	.instruction p {
		font-size: 1.1em;
	}
	.col-1-login-cfg {
		margin-top: 5vh;
	}
}
@media only screen and (max-width: 425px) {
	.instruction h1 {
		font-size: 1.5em;
	}
	.instruction p {
		font-size: 1em;
	}
	.col-1-login-cfg {
		margin-top: 0vh;
	}
  .container {
    padding-left: 0;
    padding-right: 0;
  }
  .row {
    margin-right: 0;
    margin-left: 0;
  }
  .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4,
  .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10,
  .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6,
  .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12,
  .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8,
  .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3,
  .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 0;
    padding-left: 0;
  }
}
</style>
<!-- Login Container -->
<div id="login-container" class="animation-fadeIn">
	<!-- Login Title -->
	<div class="login-title">
		<?php if(!isset($this->config->semevar->site_logo)){ ?>
			<h3><?=$this->config->semevar->site_name?></h3>
		<?php }else{ ?>
			<?php if(strlen($this->config->semevar->site_logo)<=4){ ?>
				<h3><?=$this->config->semevar->site_name?></h3>
			<?php } else{ ?>
				<img src="<?=base_url($this->config->semevar->site_logo)?>" class="img-responsive" />
			<?php }?>
		<?php } ?>
	</div>
	<!-- END Login Title -->

	<!-- Login Block -->
	<div class="block push-bit">
		<div id="f-info" class="alert alert-info" role="alert" style="<?php if(!isset($pesan_info)) echo 'display:none'?>">
			<?php if(isset($pesan_info)) echo $pesan_info?>
		</div>
		<form id="fdaftar" action="<?=base_url("daftar/proses")?>" method="post" class="form-horizontal form-bordered form-control-borderless">
			<div class="form-group instruction">
				<div class="col-xs-12">
					<h1>Daftar</h1>
					<p>Silakan lengkapi form pendaftaran ini sebelum dapat melakukan pelayanan. Nilai pengisian dari form ini akan digunakan untuk login.</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-12">
          <label for="ifnama">Nama Lengkap *</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" id="ifnama" name="fnama" class="form-control input-lg" placeholder="Nama Lengkap" minlength="2" required />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-12">
          <label for="iemail">Email *</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="email" id="iemail" name="email" class="form-control input-lg" placeholder="Email" required />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-12">
          <label for="itelp">Telp / No HP *</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="number" id="itelp" name="telp" class="form-control input-lg" placeholder="Telp / No HP" required />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-12">
          <label for="ipassword">Password *</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
						<input type="password" id="ipassword" name="password" class="form-control input-lg" placeholder="Password" minlength="6" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-12">
          <label for="irepassword">Ulangi Password *</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
						<input type="password" id="irepassword" name="repassword" class="form-control input-lg"  minlength="6" placeholder="Ulangi Password" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-12">
          <label for="ikelamin">Jenis Kelamin *</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<select id="ikelamin" name="kelamin" class="form-control input-lg" required />
              <option value="">--pilih--</option>
              <option value="1">Laki-laki</option>
              <option value="0">Perempuan</option>
            </select>
					</div>
				</div>
			</div>
			<div class="form-group form-actions">
        <div class="col-xs-6 instruction">
          <p>Sudah terdaftar? Silakan <a href="<?=base_url('login')?>" class="">Login</a></p>
        </div>
				<div class="col-xs-6">
					<div class="btn-group pull-right">
						<button type="submit" class="btn btn-primary btn-submit">Daftar <i class="icon-submit fa fa-save"></i></button>
					</div>
				</div>
			</div>
		</form>
			<!-- END Login Form -->
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			<p class="teks-kecil teks-abu"><?=$this->config->semevar->site_title?> v<?=$this->config->semevar->site_version?></p>
		</div>
	</div>
</div>
<!-- END Login Block -->