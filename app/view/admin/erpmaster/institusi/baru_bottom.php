//form
$("#fbaru").on("submit",function(e){
	e.preventDefault();

	//pertama-tama panggil dulu animasi loading
	$().btnSubmit();

	var fd = new FormData($(this)[0]);
	$.ajax({
		url: '<?=base_url('api_admin/erpmaster/institusi/baru/'); ?>',
		type: "POST",             
		data: fd, 
		contentType: false,       
		cache: false,             
		processData:false,        
		success: function(data){ 
			if(data.status == 200){
				gritter('<h4>Berhasil</h4><p>Data Baru berhasil ditambahkan</p>', 'success');
				setTimeout(function(){
					window.location = '<?=base_url_admin('erpmaster/institusi/'); ?>';
				},3000);
			}else{
				gritter('<h4>Gagal</h4><p>['+data.status+'] '+data.message+'', 'error');
				setTimeout(function(){
					$().btnSubmit('done');
				}, 3456)
			}
		},
		error: function(data){
			gritter('<h4>Error</h4><p>Untuk saat ini tidak dapat mengambil data dari server', 'warning');
			$().btnSubmit('done');
		}
	});
});

<?php $this->getThemeElement('page/components/alamat_preset/js');?>