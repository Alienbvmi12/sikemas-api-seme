
$("#ftambah").on("submit",function(e){
	e.preventDefault();
	NProgress.start();
	$('.btn-submit').prop('disabled',true);
	$('.icon-submit').addClass('fa-circle-o-notch fa-spin');

	var fd = new FormData($(this)[0]);
	var url = '<?= base_url("api_admin/erpmaster/gurutendik_jabatan/baru/")?>';

	$.ajax({
		type: $(this).attr('method'),
		url: url,
		data: fd,
		processData: false,
		contentType: false,
		success: function(respon){
			if(respon.status==200){
				gritter('<h4>Sukses</h4><p>Data baru berhasil tersimpan</p>','success');
				setTimeout(function(){
					window.location = '<?=base_url_admin('erpmaster/gurutendik_jabatan/')?>';
				},3000);
			}else{
				gritter('<h4>Gagal</h4><p>'+respon.message+'</p>','danger');
				$('.icon-submit').removeClass('fa-circle-o-notch fa-spin');
				$('.btn-submit').prop('disabled',false);
				NProgress.done();
			}
		},
		error:function(){
			setTimeout(function(){
				gritter('<h4>Error</h4><p>Tidak dapat menambah data, silahkan coba beberapa saat lagi</p>','warning');
			}, 666);

			$('.icon-submit').removeClass('fa-circle-o-notch fa-spin');
			$('.btn-submit').prop('disabled',false);
			NProgress.done();
			return false;
		}
	});
});

$("#ilevel").on("blur", function(e) {
	e.preventDefault();
	var lvl = this.value;
	if (lvl < 1) {
		gritter('<h4>Gagal</h4><p>Min. Level sama dengan 1</p>','warning');
	} else {
		NProgress.start();
		var level = parseInt(lvl) - 1;
		$.post("<?= base_url("api_admin/erpmaster/gurutendik_jabatan/atasan/")?>", "level=" + level).done(function(result){
			var opt = '<option value="">-- Silakan Pilih --</option>';
			if (result.status == 200) {
				if (result.jabatan !== undefined) {
					$(result.jabatan).each(function(a, k) {
						opt += '<option value="'+ k.id +'">'+ k.nama +'</option>';
					})
				}
			} else {
				gritter('<h4>Gagal</h4><p>'+result.message+'</p>','danger');
			}
			$("#iatasan_id").html(opt);
			NProgress.done();
		})
	}
});
