var growlPesan = '<h4>Error</h4><p>Tidak dapat diproses, silakan coba beberapa saat lagi!</p>';
var growlType = 'danger';
var drTable = {};
var ieid = '';
App.datatables();
$('.input-select2').select2({
	width: "100%"
})

function gritter(pesan,jenis="info"){
	$.bootstrapGrowl(pesan, {
		type: jenis,
		delay: 2500,
		allow_dismiss: true
	});
}
$.fn.modal.Constructor.prototype.enforceFocus = function() {};
$('.input-select2').select2({
  width: '100%'
});

if(jQuery('#drTable').length>0){
	drTable = jQuery('#drTable')
	.on('preXhr.dt', function ( e, settings, data ){
		$().btnSubmit();
	}).DataTable({
			"order"					: [[ 0, "desc" ]],
			"responsive"	  : true,
			"bProcessing"		: true,
			"bServerSide"		: true,
			"sAjaxSource"		: "<?=base_url("api_admin/pesertadidik/"); ?>",
			"fnServerParams": function ( aoData ) {
				aoData.push(
					{ "name": "status", "value": $("#fl_status").val()},
					{ "name": "a_company_id_dari", "value": $("#fl_a_company_id_dari").val()},
					{ "name": "a_company_id_ke", "value": $("#fl_a_company_id_ke").val()},
					{ "name": "sdate", "value": $("#fl_sdate").val() },
					{ "name": "edate", "value": $("#fl_edate").val() }
				);
			},
			"fnServerData"	: function (sSource, aoData, fnCallback, oSettings) {
				oSettings.jqXHR = $.ajax({
					dataType 	: 'json',
					method 		: 'POST',
					url 		: sSource,
					data 		: aoData
				}).success(function (response, status, headers, config) {
					console.log(response);

					$('#drTable > tbody').off('click', 'tr');
					$('#drTable > tbody').on('click', 'tr', function (e) {
						e.preventDefault();
						var id = $(this).find("td").html();
						ieid = id;
						$("#aedit").attr("href",'<?=base_url_admin('pesertadidik/edit/')?>'+ieid);
						$("#adetail").attr("href",'<?=base_url_admin('pesertadidik/detail/')?>'+ieid);
						$("#modal_option").modal("show");
					});
          $().btnSubmit('done');

					fnCallback(response);
				}).error(function (response, status, headers, config) {
					gritter("<h4>Error</h4><p>Tidak dapat mengambil data tabel</p>",'warning');
					$().btnSubmit('done');
				});
			},
	});
	$('.dataTables_filter input').attr('placeholder', 'Cari');
	$("#fl_button").on("click",function(e){
		e.preventDefault();
		drTable.ajax.reload();
	})
}

//tambah
$("#atambah").on("click",function(e){
	e.preventDefault();
	$("#itable_barang tbody").empty();
	$("#modal_tambah").modal("show");
});
$("#modal_tambah").on("shown.bs.modal",function(e){
	$('#atambah').prop('disabled',true);
});
$("#modal_tambah").on("hidden.bs.modal",function(e){
	$('#atambah').prop('disabled',false);
});

$("#ftambah").on("submit",function(e){
	e.preventDefault();
	if($("#ia_company_id_dari").val() == $("#ia_company_id_ke").val()){
		gritter("<h4>Maaf</h4><p>Asal dan Tujuan cabang untuk mutasi barang tidak boleh sama</p>");
		$("#ia_company_id_ke").focus();
		return false;
	}

	$().btnSubmit();

	var fd = new FormData($(this)[0]);
	var url = '<?=base_url("api_admin/pesertadidik/tambah/"); ?>';
	$.ajax({
		type: $(this).attr('method'),
		url: url,
		data: fd,
		processData: false,
		contentType: false,
		success: function(respon){
			if(respon.status == 200){
				growlPesan = '<h4>Berhasil</h4><p>Proses tambah data telah berhasil!</p>';
				drTable.ajax.reload();
				growlType = 'success';
				$("#modal_tambah").modal("hide");
			}else{
				growlPesan = '<h4>Gagal</h4><p>'+respon.message+'</p>';
				growlType = 'danger';
				$().btnSubmit('done');
			}
			setTimeout(function(){
				$.bootstrapGrowl(growlPesan, {
					type: growlType,
					delay: 2500,
					allow_dismiss: true
				});
			}, 1666);
		},
		error:function(){
			growlPesan = '<h4>Error</h4><p>Proses tambah data tidak bisa dilakukan, coba beberapa saat lagi</p>';
			growlType = 'warning';
			setTimeout(function(){
				$.bootstrapGrowl(growlPesan, {
					type: growlType,
					delay: 2500,
					allow_dismiss: true
				});
			}, 666);

			$().btnSubmit('done');

			return false;
		}
	});

});



//edit
$("#modal_edit").on("shown.bs.modal",function(e){
	//
});
$("#modal_edit").on("hidden.bs.modal",function(e){
	$("#modal_edit").find("form").trigger("reset");
});

$("#fedit").on("submit",function(e){
	e.preventDefault();
	$(".btn-submit").prop("disabled",true);
	var fd = new FormData($(this)[0]);
	var url = '<?=base_url("api_admin/pesertadidik/edit/"); ?>';
	$.ajax({
		type: $(this).attr('method'),
		url: url,
		data: fd,
		processData: false,
		contentType: false,
		success: function(respon){
			$(".btn-submit").removeAttr("disabled");
			if(respon.status == 200){
				growlType = 'success';
				growlPesan = '<h4>Berhasil</h4><p>Proses ubah data telah berhasil!</p>';
				drTable.ajax.reload();
			}else{
				growlType = 'danger';
				growlPesan = '<h4>Gagal</h4><p>'+respon.message+'</p>';
			}
			$("#modal_edit").modal("hide");
			setTimeout(function(){
				$.bootstrapGrowl(growlPesan, {
					type: growlType,
					delay: 2500,
					allow_dismiss: true
				});
			}, 666);
		},
		error:function(){
			$(".btn-submit").removeAttr("disabled");
			growlPesan = '<h4>Error</h4><p>Proses ubah data tidak bisa dilakukan, coba beberapa saat lagi</p>';
			growlType = 'danger';
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


//option
//fill cabang nama
$("#ia_company_id_dari").on("change",function(e){
	e.preventDefault();
	$("#ia_company_nama_dari").val($("#ia_company_id_dari option:selected").html());
});
$("#ia_company_id_ke").on("change",function(e){
	e.preventDefault();
	$("#ia_company_nama_ke").val($("#ia_company_id_ke option:selected").html());
});

//cari barang
$("#itable_barang_tambah").on("click",function(e){
	e.preventDefault();
	$("#modal_tambah").modal("hide");
	setTimeout(function(){
		$("#modal_barang_cari_input").val('');
		$("#modal_barang_cari_form").trigger('submit');
		$("#modal_barang_cari_table tbody").empty();
		$("#modal_barang_cari").modal("show");
	},777);
});
$("#modal_barang_cari_form").on('submit',function(e){
	$(".btn-submit").prop("disabled",true);
	e.preventDefault();
	$().btnSubmit();
	var fd = {};
	fd.sSearch = $("#modal_barang_cari_input").val();
	$.post('<?=base_url('api_admin/pesertadidik/barang/')?>',fd).done(function(dt){
		$().btnSubmit('done');
		if(dt.status == 200){
			$("#modal_barang_cari_table tbody").empty();
			$.each(dt.result,function(k,v){
				var h = '<tr data-id="'+v.id+'" data-nama="'+v.nama+'">';
				h += '<td>'+v.id+'</td>';
				h += '<td>'+v.nama+'</td>';
				h += '<td><a href="#" class="btn btn-info btn-barang-pilih" data-id="'+v.id+'" data-nama="'+v.nama+'" data-harga_beli="'+v.harga_beli+'"><i class="fa fa-check"></i></a></td>';
				h += '</tr>';
				$("#modal_barang_cari_table tbody").append(h);
			});
			$("#modal_barang_cari_table tbody").off("click",".btn-barang-pilih");
			$("#modal_barang_cari_table tbody").on("click",".btn-barang-pilih",function(ev){
				ev.preventDefault();
				var id = $(this).attr("data-id");
				var nama = $(this).attr("data-nama");
				var harga_beli = $(this).attr("data-harga_beli");
				var tr = '<tr id="itable_barang_tr'+id+'">';
				tr += '<td>'+id+'</td>';
				tr += '<td>'+nama+'</td>';
				tr += '<td>';
				tr += '<input id="modal_tambah_table_barang_id_'+id+'" name="c_produk_id[]" type="hidden" value="'+id+'" readonly />';
				tr += '<input id="modal_tambah_table_barang_harga_beli_'+id+'" name="harga_beli[]" type="hidden" value="'+harga_beli+'" readonly />';
				tr += '<input id="modal_tambah_table_barang_ed_'+id+'" name="date_expire['+id+']" type="text" value="" class="form-control barang_ed" placeholder="TTTT-BB-HH" autocomplete="off" />';
				tr += '</td>';
				tr += '<td>';
				tr += '<input id="modal_tambah_table_barang_qty_'+id+'" name="qty['+id+']" type="number" value="1" class="form-control barang_qty" required />';
				tr += '</td>';
				tr += '<td>';
				tr += '<a href="#" class="btn btn-info btn-table-barang-remove" data-id="'+id+'"><i class="fa fa-times"></i></a>';
				tr += '</td>';
				tr += '</tr>';
				$("#itable_barang tbody").append(tr);
				$("#itable_barang tbody").on("click",'.btn-table-barang-remove',function(evt){
					evt.preventDefault();
					var id=$(this).attr("data-id");
					$('#itable_barang_tr'+id+'').hide('slow',function(){
						$('#itable_barang_tr'+id+'').remove();
					});
				});
				$("#modal_barang_cari").modal("hide");
				setTimeout(function(){
					$("#modal_tambah").modal("show");
				},777);
			});
		}
	}).fail(function(){
		gritter('<h4>Error</h4><p>Tidak dapat mencari barang untuk saat ini, silakan coba lagi nanti</p>','danger');

		$().btnSubmit('done');
	})
});

//hapus
$("#ahapus").on("click",function(e){
	e.preventDefault();
	if(ieid){
		var c = confirm('apakah anda yakin?');
		if(c){
	    NProgress.start();
	    $('.btn-submit').prop('disabled',true);
	    $('.icon-submit').addClass('fa-circle-o-notch');
	    $('.icon-submit').addClass('fa-spin');
			var url = '<?=base_url('api_admin/pesertadidik/hapus/'); ?>'+ieid;
			$.get(url).done(function(response){
				if(response.status == 200){
					gritter('<h4>Berhasil</h4><p>Data berhasil dihapus</p>','success');
				}else{
					gritter('<h4>Gagal</h4><p>'+response.message+'</p>','danger');
				}
				drTable.ajax.reload();

				$('.btn-submit').prop('disabled',false);
				$('.icon-submit').removeClass('fa-circle-o-notch');
				$('.icon-submit').removeClass('fa-spin');
				NProgress.done();

				$("#modal_edit").modal("hide");
				$("#modal_option").modal("hide");
			}).fail(function() {
				gritter('<h4>Error</h4><p>Proses penghapusan tidak bisa dilakukan, coba beberapa saat lagi</p>','warning');
				$('.btn-submit').prop('disabled',false);
				$('.icon-submit').removeClass('fa-circle-o-notch');
				$('.icon-submit').removeClass('fa-spin');
				NProgress.done();
			});
		}
	}
});

$("#fl_download").on("click",function(e){
	e.preventDefault();
	var status = $("#fl_status").val();
	var mindate = $("#fl_sdate").val();
	var maxdate = $("#fl_edate").val();
	var a_company_id_dari = $("#fl_a_company_id_dari").val();
	var a_company_id_ke = $("#fl_a_company_id_ke").val();
	var durl = '<?=base_url_admin()?>pesertadidik/download_xls/';
	durl += '?a_company_id_dari='+a_company_id_dari;
	durl += '&a_company_id_ke='+a_company_id_ke;
	durl += '&sdate='+mindate;
	durl += '&edate='+maxdate;
	durl += '&status='+status;
	window.location = durl;
});

$("#bbatal").on("click",function(e){
  e.preventDefault();
  var c = confirm("Apakah anda yakin?");
  if(c){
    NProgress.start();
    $('.btn-submit').prop('disabled',true);
    $('.icon-submit').addClass('fa-circle-o-notch');
    $('.icon-submit').addClass('fa-spin');
    $.get("<?=base_url("api_admin/pesertadidik/batal/")?>"+encodeURIComponent(ieid)).done(function(dt){
      if(dt.status==200){
        gritter('<h4>Berhasil</h4><p>Mutasi berhasil dibatalkan</p>','success');
      }else{
        gritter('<h4>Gagal</h4><p>'+dt.message+'</p>','danger');
      }
      $("#modal_edit").modal("hide");
      $("#modal_option").modal("hide");

			$('.btn-submit').prop('disabled',false);
			$('.icon-submit').removeClass('fa-circle-o-notch');
			$('.icon-submit').removeClass('fa-spin');
			NProgress.done();
      drTable.ajax.reload();
    }).fail(function(){
      gritter('<h4>Error</h4><p>Proses pembatalan tidak dapat dilakukan sekarang, coba beberapa saat lagi</p>','warning');
			$('.btn-submit').prop('disabled',false);
			$('.icon-submit').removeClass('fa-circle-o-notch');
			$('.icon-submit').removeClass('fa-spin');
			NProgress.done();
    });
  }
});
