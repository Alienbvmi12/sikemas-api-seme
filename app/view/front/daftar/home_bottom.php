</script>
<script>
	var login_try = 0;
	var Login = function() {
		return {
			init: function() {}
		}
	}();
	$(function() {
		Login.init();
	});

	function gritter(pesan, jenis = "info") {
		$.bootstrapGrowl(pesan, {
			type: jenis,
			delay: 3500,
			allow_dismiss: true
		});
	}


	$("#form-register").on("submit", function(evt) {
		evt.preventDefault();
		login_try++;
		var p1 = $('#password').val();
		var p2 = $('#confirm-password').val();
		if (p1 != p2) {
			$('#confirm-password').focus();
			gritter("<h4>Perhatian</h4><p>Password tidak sama</p>", 'info');
			return 0;
		}

		NProgress.start();
		$("#submit").prop('disabled', true);
		$(".icon-submit").removeClass("fa-save");
		$(".icon-submit").addClass("fa-circle-o-notch");
		$(".icon-submit").addClass("fa-spin");
		var url = '<?= base_url('daftar/store') ?>';
		var fd = $(this).serialize();

		$.post(url, fd).done(function(result) {
			NProgress.set(0.4);
			var hasil = result.data;
			if (result.status == 200) {
				gritter("<h4>Sukses</h4><p>Selanjutnya anda harus memverifikasi email anda</p>", 'success');
				setTimeout(NProgress.set(0.7), 2000);
				setTimeout(function() {
					NProgress.done();
					window.location = hasil.redirect_url;
				}, 5000);
			} else {
				gritter("<h4>Gagal</h4><p>" + result.message + "</p>", 'danger');
				$("#submit").prop('disabled', false);
				$(".icon-submit").removeClass("fa-circle-o-notch");
				$(".icon-submit").removeClass("fa-spin");
				$(".icon-submit").addClass("fa-save");
				NProgress.done();
			}
		}).fail(function() {
			$("#submit").prop('disabled', false);
			$(".icon-submit").removeClass("fa-circle-o-notch");
			$(".icon-submit").removeClass("fa-spin");
			$(".icon-submit").addClass("fa-save");
			gritter("<h4>Error</h4><p>tidak dapat login sekarang, silahkan coba lagi nanti</p>", 'warning');
			NProgress.done();
		});
	});
</script>
<script>