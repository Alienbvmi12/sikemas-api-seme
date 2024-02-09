var drTable = {};

if(jQuery('#drTable').length>0){
	drTable = jQuery('#drTable')
	.on('preXhr.dt', function ( e, settings, data ){
		NProgress.start();
	}).DataTable({
			"order"             : [[ 0, "desc" ]],
			"responsive"	    : true,
			"bProcessing"		: true,
			"bServerSide"		: true,
			"sAjaxSource"		: "<?=base_url("api_front/invoice/biayarinci/")?>",
			"fnServerParams"    : function ( aoData ) {
				aoData.push(
                    { "name": "scdate", "value": $("#fl_scdate").val() },
                    { "name": "ecdate", "value": $("#fl_ecdate").val() },
					{ "name": "is_active", "value": $("#fl_is_active").val() }
				);
			},
			"fnServerData"	: function (sSource, aoData, fnCallback, oSettings) {
				oSettings.jqXHR = $.ajax({
					dataType: 'json',
					method: 'POST',
					url: sSource,
					data: aoData
				}).done(function (response, status, headers, config) {
					NProgress.done();
                    $('#drTable > tbody').off('click', 'tr');
					$('#drTable > tbody').on('click', 'tr', function (e) {
						e.preventDefault();
						var id = $(this).find("td").html();
						ieid = id;
                        $('#adetail').attr('href','<?=base_url("rekomendasi/detail/")?>'+encodeURIComponent(ieid));
						$('#aedit').attr('href','<?=base_url("rekomendasi/edit/")?>'+encodeURIComponent(ieid));
						$("#modal_option").modal("show");
					});
					fnCallback(response);
				}).fail(function (response, status, headers, config) {
					NProgress.done();
					gritter("<h4>Error</h4><p>Tidak dapat mengambil data dari server</p>",'warning');
				});
			},
	});
	$('.dataTables_filter input').attr('placeholder', 'Cari');
	$("#filter_button").on("click",function(e){
		e.preventDefault();
		drTable.ajax.reload();
	});
}