function gritter(pesan,jenis="info"){
	$.bootstrapGrowl(pesan, {
		type: jenis,
		delay: 3500,
		allow_dismiss: true
	});
}

$("#bprofil_foto").on("click",function(e){
	e.preventDefault();
	$("#modal_profil_foto").modal('show');
});

$("#profil_edit_modal").on("click",function(e){
	e.preventDefault();
	$("#modal_profil_edit").modal('show');
});

$("#profil_password_ganti").on("click",function(e){
	e.preventDefault();
	$("#modal_password_change").modal('show');
	$("#fmodal_password_change").trigger("reset");
});

$("#fmodal_profil_foto").on("submit",function(e){
	e.preventDefault();
	NProgress.start();
	$.ajax({
		url: '<?=base_url('api_front/profil/picture_change/'); ?>', // Url to which the request is send
		type: "POST",
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data){
			NProgress.done();
			if(data.status == "200" || data.status == 200){
				gritter('<h4>Sukses</h4><p>Tampilan gambar berhasil diubah</p>','success');
				setTimeout(function(){
					window.location.reload();
				},1333);
			}else{
				gritter('<h4>Gagal</h4><p>'+data.message+'</p>','warning');
			}
		},
		error: function(d){
			NProgress.done();
			gritter('<h4>Error</h4><p>Tidak dapat mengubah gambar tampilan sekarang, silakan coba lagi</p>','warning');
		}
	});
});

$("#fmodal_profil_edit").on("submit",function(e){
	e.preventDefault();
	NProgress.start();
	var fd = $(this).serialize();
	$.post('<?=base_url('api_front/profil/edit/')?>',fd).done(function(dt){
		$("#modal_profil_edit").modal('hide');
		NProgress.done();
		if(dt.status == 200){
			gritter("<h4>Sukses</h4><p>profile telah diubah</p>",'success');
			setTimeout(function(){
				window.location = '<?=base_url_admin('profil/')?>';
			},2000);
		}else{
			gritter("<h4>Error</h4><p>"+dt.message+"</p>",'danger');
		}
	}).fail(function(){
		$("#modal_profil_edit").modal('hide');
		NProgress.done();
		window.reload();
	})
});

$("#fmodal_password_change").on("submit",function(e){
	e.preventDefault();
	var npw = $("#imodal_password_change_newpassword").val();
	var cpn = $("#imodal_password_change_confirm_newpassword").val();
	if(cpn != npw){
		gritter("<h4>Warning</h4><p>Kata sandi baru dengan konfirmasi kata sandi baru tidak cocok</p>",'warning')
		$("#imodal_password_change_confirm_newpassword").focus();
		return 0;
	}
	NProgress.start();
	var fd = $(this).serialize();
	$.post('<?=base_url('api_front/profil/password_change/')?>',fd).done(function(dt){
		$("#modal_password_change").modal('hide');
		NProgress.done();
		if(dt.status == 200){
			gritter("<h4>Sukses</h4><p>kata sandi telah dirubah</p>",'success');
			setTimeout(function(){
				window.location = '<?=base_url_admin('profil/')?>';
			},2000);
		}else{
			gritter("<h4>Gagal</h4><p>"+dt.message+"</p>",'danger');
		}
	}).fail(function(){
		$("#modal_password_change").modal('hide');
		gritter("<h4>Error</h4><p>tidak dapat mengubah kata sandi sekarang, silahkan coba lagi nanti</p>",'danger');
		NProgress.done();
		window.reload();
	})
});


//edit_foto
$("#bprofil_foto").on("click",function(e){
	e.preventDefault();
	$("#modal_option").modal('hide');
	$("#fef").trigger("reset");
	setTimeout(function(){
		$("#modal_profil_foto").modal('show');
	},333);
});
$("#fef").on("submit",function(e){
	e.preventDefault();
	var fd = new FormData($(this)[0]);
	var url = 'http://localhost/cenah/erp/api_admin/akun/pengguna/edit_foto/';
	$.ajax({
		type: 'post',
		url: url,
		data: fd,
		processData: false,
		contentType: false,
		success: function(dt){
			if(dt.status=="200" || dt.status == 200){
				$("#modal_profil_foto").modal("hide");
				setTimeout(function(){
					$.bootstrapGrowl('<h4>Sukses</h4><p>Profile picture updated</p>', {
						type: 'success',
						delay: 2500,
						allow_dismiss: true
					});
				}, 666);
				drTable.ajax.reload();
			}else{
				setTimeout(function(){
					$.bootstrapGrowl('<h4>Gagal</h4><p>'+dt.message+'</p>', {
						type: 'danger',
						delay: 2500,
						allow_dismiss: true
					});
					$("#modal_profil_foto").modal("hide");
				}, 666);
			}
		},
		error:function(){
			growlPesan = '<h4>Error</h4><p>Tidak dapat memproses data saat ini, coba lagi nanti</p>';
			growlType = 'warning';
			setTimeout(function(){
				$.bootstrapGrowl(growlPesan, {
					type: growlType,
					delay: 2500,
					allow_dismiss: true
				});
			}, 666);
			return false;
		}
	});
});
$("#btn_foto_reset").on("click",function(e){
	e.preventDefault();
	var c = confirm("Apakah Anda yakin?");
	if(c){
		$.get("<?=base_url()?>api_admin/akun/pengguna/foto_reset/"+(ieid)).done(function(dt){
			if(dt.status == 200){
				$.bootstrapGrowl("<h4>Sukses</h4><p>Administrator display picture has been resetted</p>", {
					type: "info",
					delay: 2500,
					allow_dismiss: true
				});
				drTable.ajax.reload();
			}else{
				$.bootstrapGrowl("<h4>Gagal</h4><p>"+dt.message+"</p>", {
					type: "danger",
					delay: 2500,
					allow_dismiss: true
				});
			}
		}).fail(function(){
			$.bootstrapGrowl("<h4>Error</h4><p>Cannot reset profile picture right now, please try again later</p>", {
				type: "warning",
				delay: 2500,
				allow_dismiss: true
			});
		})
	}
});

//upload foto
$("#bupload_logo_kotak").on("click",function(e){
	e.preventDefault();
	$("#ilogo_kotak").trigger("click");
});
$("#ilogo_kotak").on("change",function(e){
	e.preventDefault();
	$("#fupload_logo_kotak").trigger("submit");
});
$("#fupload_logo_kotakx").on("submit",function(e){
	e.preventDefault();
	NProgress.start();
	var fd = new FormData($(this)[0]);
	$.ajax({
		url: '<?=base_url('profil')?>',
		type: "POST",
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(resp){
			NProgress.done();
			if(resp.status == 200){
				$("#logo_kotak").attr("src","<?=$this->cdn_Url()?>"+resp.data.logo_kotak);
			}else{
				gritter('<h4>Error</h4><p>'+resp.message+'</p>','warning');
				return false;
			}
		},
		error: function(d){
			NProgress.done();
			gritter('<h4>Error</h4><p>Maaf, sementara ini belum bisa upload media</p>','danger');
		}
	});
});