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

	.navbar-form-custom .form-control:hover,
	.navbar-form-custom .form-control:focus,
	.navbar-form,
	.navbar-collapse,
	.form-control,
	.form-control:focus,
	.has-success .form-control:focus,
	.has-warning .form-control:focus,
	.has-error .form-control:focus,
	.popover,
	.progress,
	.progress-bar,
	.btn.active,
	.open .btn.dropdown-toggle,
	.panel {
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

	.form-control-borderless .form-control,
	.form-control-borderless .input-group-addon,
	.form-control-borderless,
	.form-control-borderless:focus {
		border: transparent !important;
	}

	input[type="text"].form-control,
	input[type="password"].form-control,
	input[type="email"].form-control,
	textarea.form-control {
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

		.col-lg-1,
		.col-lg-10,
		.col-lg-11,
		.col-lg-12,
		.col-lg-2,
		.col-lg-3,
		.col-lg-4,
		.col-lg-5,
		.col-lg-6,
		.col-lg-7,
		.col-lg-8,
		.col-lg-9,
		.col-md-1,
		.col-md-10,
		.col-md-11,
		.col-md-12,
		.col-md-2,
		.col-md-3,
		.col-md-4,
		.col-md-5,
		.col-md-6,
		.col-md-7,
		.col-md-8,
		.col-md-9,
		.col-sm-1,
		.col-sm-10,
		.col-sm-11,
		.col-sm-12,
		.col-sm-2,
		.col-sm-3,
		.col-sm-4,
		.col-sm-5,
		.col-sm-6,
		.col-sm-7,
		.col-sm-8,
		.col-sm-9,
		.col-xs-1,
		.col-xs-10,
		.col-xs-11,
		.col-xs-12,
		.col-xs-2,
		.col-xs-3,
		.col-xs-4,
		.col-xs-5,
		.col-xs-6,
		.col-xs-7,
		.col-xs-8,
		.col-xs-9 {
			position: relative;
			min-height: 1px;
			padding-right: 0;
			padding-left: 0;
		}
	}

	.login-box {
		height: 100vh;
		width: 100%;
		background: lightgray;
		display: flex;
		align-items: center;
	}


	.login-box-item-form {
		flex: 36.5%;
		background: #D4E0F0;
		height: 70vh;
		width: 100%;
		font-family: 'Inika', serif;
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-direction: column;
		-ms-flex-direction: column;
	}

	.login-box-item-form>#form-register {
		height: 70%;
		width: 73%;
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.login-box-item-form>.at>label {
		color: #000;
		font-family: 'Noto Serif', serif;
		font-size: 15px;
		font-style: normal;
		font-weight: 400;
		line-height: normal;
	}

	.register-input {
		width: 70%;
		border-radius: 30px;
		height: 51px;
		border: 2px solid #000;
		background: #FFF;
		padding-left: 20px;
		font-family: 'Noto Serif', serif;
		font-size: 23px;
		margin-bottom: 20px;
		text-align : center;
	}

	.cbx {
		position: relative;
		top: 1px;
		width: 20px;
		height: 20px;
		border: 1px solid #c8ccd4;
		border-radius: 3px;
		vertical-align: middle;
		transition: background 0.1s ease;
		cursor: pointer;
		display: block;
		background-color: lightgrey;
	}

	.cbx:after {
		content: '';
		position: absolute;
		top: 3px;
		left: 6.5px;
		width: 5px;
		height: 10px;
		opacity: 0;
		transform: rotate(45deg) scale(0);
		border-right: 2px solid #fff;
		border-bottom: 2px solid #fff;
		transition: all 0.3s ease;
		transition-delay: 0.15s;
	}

	#cbx:checked~.cbx {
		border-color: transparent;
		background: #2977D2;
		animation: jelly 0.6s ease;
	}

	#cbx:checked~.cbx:after {
		opacity: 1;
		transform: rotate(45deg) scale(1);
	}

	.cntr {
		display: flex;
		padding-left: 22.5px;
	}

	@keyframes jelly {
		from {
			transform: scale(1, 1);
		}

		30% {
			transform: scale(1.25, 0.75);
		}

		40% {
			transform: scale(0.75, 1.25);
		}

		50% {
			transform: scale(1.15, 0.85);
		}

		65% {
			transform: scale(0.95, 1.05);
		}

		75% {
			transform: scale(1.05, 0.95);
		}

		to {
			transform: scale(1, 1);
		}
	}

	.hidden-xs-up {
		display: none !important;
	}

	.form-btn {
		width: 333px;
		height: 50px;
		border-radius: 20px;
		border: 1px solid #000;
		background: #167FE0;
		box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
	}

	#flag {
		margin-top: 35px;
		width: 300px;
		height: 140px;
		background: rgba(203, 199, 199, 0.49);
		box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.25);
		display: grid;
		place-items: center;
	}

	#flag>label {
		color: #FFF;
		text-align: center;
		font-family: 'Inika', serif;
		font-size: 50px;
		font-style: normal;
		font-weight: 400;
		line-height: normal;
	}

	#title-register {
		color: #FFF;
		text-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
		font-family: Suez One;
		font-size: 55px;
		font-style: normal;
		font-weight: 400;
		line-height: normal;
	}

	#subtitle-register {
		color: #FFF;
		text-shadow: 0px 0px 10px rgba(0, 0, 0, 1);
		font-family: Noto Sans;
		font-size: 15px;
		font-style: normal;
		font-weight: 400;
		line-height: normal;
		width: 500px;
	}

	#form-title {
		font-family: 'Inika', serif;
		text-align: center;
		font-size: 64px;
		margin-bottom: 40px;
	}

	@media only screen and (max-height: 740px) {
		.login-box-item-form {
			height : 80vh;
		}
	}

	@media only screen and (max-height: 637px) {
		.login-box-item-form {
			height : 90vh;
		}
	}

	@media only screen and (max-width: 633px) {

		#form-title {
			font-size: 50px;
		}
	}

	@media only screen and (max-width: 495px) {
		.login-box-item-form>#form-register {
			width: 90%;
		}

		#form-title {
			font-size: 40px;
		}
	}

	@media only screen and (max-width: 321px) {
		.register-input {
			width: 70%;
			min-height: 50px;
			padding-left: 0;
			text-align: center;
			font-size: 20px;
		}

		.login-box-item-form>.at>label {
			font-size: 10px;
		}

		#form-title {
			font-size: 35px;
		}
	}

	@media only screen and (max-width: 281px) {
		.register-input {
			width: 70%;
			min-height: 50px;
			padding-left: 0;
			text-align: center;
			font-size: 20px;
			margin-bottom: 15px;
		}

		.login-box-item-form>.at>label {
			font-size: 10px;
		}

		#form-title {
			font-size: 30px;
			margin-bottom: 15px;
		}
	}
</style>
<!-- Login Container -->
<div id="login-container" class="">
	<div class="login-box">
		<div class="login-box-item-form d-flex">
			<div class="at">
			</div>
			<form id="form-register" action="<?= base_url('daftar') ?>/store" method="post">
				<p id="form-title">Masukan Kode Verifikasi Anda</p>
				<input type="text" id="token" name="token" class="register-input" placeholder="Enter Your Code" autocomplete="off">
				<div class="cntr" style="padding : 17px 0; ">
					<div style="flex : 90%; font-family: 'Inika', serif;">
						Tidak ada kode masuk? Tekan <button type="button" id="kirim-ulang" class="btn-link" style="padding : 0; margin : 0;" href="#" onclick="resendCode()">kirim ulang</button><text id="countDown"></text>
					</div>
				</div>
				<div style="display : flex; justify-content: center; width : 100%;">
					<button id="submit" type="submit" class="form-btn" style="font-family: 'Inika', serif; font-size : 24px; color : white; margin-top : 15px;">
						Kirim
					</button>
				</div>
				<br>
			</form>
			<div class="at">
				<label>@<?= $this->config->semevar->site_name ?></label>
			</div>
		</div>
	</div>
</div>
<!-- END Login Block -->