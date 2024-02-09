var growlPesan = '<h4>Error</h4><p>Tidak dapat diproses, silakan coba beberapa saat lagi!</p>';
var growlType = 'danger';
var drTable = {};
var ieid = '';
App.datatables();
$('.input-select2').select2({
	width: "100%"
});

$.fn.modal.Constructor.prototype.enforceFocus = function() {};
$('.input-select2').select2({
	width: '100%'
});

if(jQuery('#drTable').length>0){
	drTable = jQuery('#drTable')
	.on('preXhr.dt', function ( e, settings, data ){
		$().btnSubmit();
	}).DataTable({
		"order"				: [[ 0, "desc" ]],
		"responsive"	  	: true,
		"bProcessing"		: true,
		"bServerSide"		: true,
		"sAjaxSource"		: "<?=base_url("api_admin/erpmaster/institusi/"); ?>",
		"fnServerParams"	: function ( aoData ) {
			aoData.push(
				{ "name": "is_active", "value": $("#fl_is_active").val()},
				{ "name": "a_institusi_id", "value": $("#fl_a_institusi_id").val()}
			);
		},
		"fnServerData": function (sSource, aoData, fnCallback, oSettings) {
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
					$("#aedit").attr("href",'<?=base_url_admin('erpmaster/institusi/edit/')?>'+ieid);
					$("#adetail").attr("href",'<?=base_url_admin('erpmaster/institusi/detail/')?>'+ieid);
					$("#modal_option").modal("show");
				});
				$().btnSubmit('done');

				fnCallback(response);
			}).error(function (response, status, headers, config) {
				gritter("<h4>Error</h4><p>Tidak dapat mengambil data tabel</p>",'warning');
				$().btnSubmit('done');
			});
		}
	});
	$('.dataTables_filter input').attr('placeholder', 'Cari');
	$("#btn_filter").on("click",function(e){
		e.preventDefault();
		drTable.ajax.reload();
	})
}

//hapus
$("#ahapus").on("click",function(e){
	e.preventDefault();
	if(ieid){
		var c = confirm('apakah anda yakin?');
		if(c){
			$().btnSubmit();
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

