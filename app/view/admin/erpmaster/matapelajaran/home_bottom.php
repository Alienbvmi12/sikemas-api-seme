var ieid = '';
var drTable = {};

function gritter(pesan,jenis="warning"){
	$.bootstrapGrowl(pesan, {
		type: jenis,
		delay: 2500,
		allow_dismiss: true
	});
}

App.datatables();
if(jQuery('#drTable').length>0){
	drTable = jQuery('#drTable')
	.on('preXhr.dt', function ( e, settings, data ){
		$("#modal-preloader").modal("hide");
		//$("#modal-preloader").modal("show");
	}).DataTable({
			"order"					: [[ 0, "desc" ]],
			"responsive"	  : true,
			"bProcessing"		: true,
			"bServerSide"		: true,
			"sAjaxSource"		: "<?=base_url("api_admin/erpmaster/matapelajaran/"); ?>",
			"fnServerData"	: function (sSource, aoData, fnCallback, oSettings) {
				//$('body').removeClass('loaded');

				oSettings.jqXHR = $.ajax({
					dataType 	: 'json',
					method 		: 'POST',
					url 		: sSource,
					data 		: aoData
				}).success(function (response, status, headers, config) {
					$("#modal-preloader").modal("hide");
					$('#drTable > tbody').off('click', 'tr');
					$('#drTable > tbody').on('click', 'tr', function (e) {
						e.preventDefault();
						NProgress.start();
						var id = $(this).find("td").html();
						ieid = id;
						var url = '<?=base_url(); ?>api_admin/erpmaster/matapelajaran/detail/'+id;
						$.get(url).done(function(response){
							NProgress.done();
							if(response.status == 200 || response.status=='100'){
								$("#ieid").val(ieid);
								$("#iekode").val(response.data.kode);
								$("#ienama").val(response.data.nama);
								$("#ieis_active").val(response.data.is_active);

								$("#modal_option").modal("show");
							}else{
								gritter('<h4>Error</h4><p>Tidak dapat mengambil detail data</p>','danger');
							}
						}).fail(function(){
							NProgress.done();
							gritter('<h4>Error</h4><p>Tidak dapat mengambil detail data</p>','danger');
						});
					});
					fnCallback(response);
				}).error(function (response, status, headers, config) {
					gritter('<h4>Error</h4><p>Tidak dapat mengambil data</p>','danger');
				});
			}
	});
}

//tambah
$("#atambah").on("click",function(e){
	e.preventDefault();
	$("#modal_tambah").modal("show");
});
$("#modal_tambah").on("shown.bs.modal",function(e){
	$("#ftambah").off("submit");
	$("#ftambah").on("submit",function(e){
		e.preventDefault();
		NProgress.start();
		var fd = new FormData($(this)[0]);
		var url = '<?=base_url('api_admin/erpmaster/matapelajaran/tambah/');?>';
		$.ajax({
			type: 'post',
			url: url,
			data: fd,
			processData: false,
			contentType: false,
			success: function(respon){
				NProgress.done();
				if(respon.status == 200){
					$("#modal_tambah").modal("hide");
					setTimeout(function(){
						gritter('<h4>Berhasil</h4><p>Data baru berhasil disimpan</p>','success');
					}, 666);
					drTable.ajax.reload();
				}else{
					setTimeout(function(){
						gritter('<h4>Gagal</h4><p>'+respon.message+'</p>','danger');
					}, 666);
				}
			},
			error:function(){
				NProgress.done();
				setTimeout(function(){
					gritter('<h4>Error</h4><p>Proses tambah data tidak bisa dilakukan, coba beberapa saat lagi</p>','warning');
				}, 666);
				return false;
			}
		});
	});
	$("#btambah_submit").off("click");
	$("#btambah_submit").on("click",function(e){
		e.preventDefault();
		$("#ftambah").trigger("submit");
	});
});

$("#modal_tambah").on("hidden.bs.modal",function(e){
	$("#modal_tambah").find("form").trigger("reset");
});


$("#modal_edit").on("shown.bs.modal",function(e){
	//
});
$("#modal_edit").on("hidden.bs.modal",function(e){
	$("#modal_edit").find("form").trigger("reset");
});
$("#fedit").on("submit",function(e){
	e.preventDefault();
	NProgress.start();
	var fd = new FormData($(this)[0]);
	var url = '<?=base_url("api_admin/erpmaster/matapelajaran/edit/"); ?>'+ieid;
	$.ajax({
		type: $(this).attr('method'),
		url: url,
		data: fd,
		processData: false,
		contentType: false,
		success: function(respon){
			NProgress.done();
			if(respon.status == 200){
				$("#modal_edit").modal("hide");
				setTimeout(function(){
					gritter('<h4>Berhasil</h4><p>Proses ubah data telah berhasil!</p>','success');
				}, 666);
				drTable.ajax.reload();
			}else{
				setTimeout(function(){
					gritter('<h4>Gagal</h4><p>'+respon.message+'</p>','danger');
				}, 666);
			}
			$("#modal_edit").modal("hide");
		},
		error:function(){
			NProgress.done();
			setTimeout(function(){
				gritter('<h4>Error</h4><p>Proses ubah data tidak bisa dilakukan, coba beberapa saat lagi</p>','warning');
			}, 666);
			return false;
		}
	});
});


//hapus
$("#ahapus").on("click",function(e){
	e.preventDefault();
	var id = ieid;
	if(id){
		var c = confirm('apakah anda yakin?');
		if(c){
			var url = '<?=base_url('api_admin/erpmaster/matapelajaran/hapus/'); ?>'+id;
			$.get(url).done(function(response){
				if(response.status == 200 || response.status == 200){
					$("#modal_option").modal("hide");
					setTimeout(function(){
						gritter('<h4>Berhasil</h4><p>Data berhasil dihapus</p>','success');
					}, 666);
					drTable.ajax.reload();
				}else{
					setTimeout(function(){
						gritter('<h4>Gagal</h4><p>'+respon.message+'</p>','danger');
					}, 666);
				}
			}).fail(function() {
				setTimeout(function(){
					gritter('<h4>Error</h4><p>Proses penghapusan tidak bisa dilakukan, coba beberapa saat lagi</p>','warning');
				}, 666);
			});
		}
	}
});

$("#bhapus").on("click",function(e){
	e.preventDefault();
	$("#ahapus").trigger("click");
});

//option
$("#aedit").on("click",function(e){
	e.preventDefault();
	$("#modal_option").modal("hide");
	setTimeout(function(){
		$("#modal_edit").modal("show");
	},333);
});