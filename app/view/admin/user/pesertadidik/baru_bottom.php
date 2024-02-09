
//form
$("#fbaru").on("submit",function(e){
	e.preventDefault();
	var fd = new FormData($(this)[0]);
	$.ajax({
		url: '<?=base_url('api_admin/user/pesertadidik/baru/'); ?>',
		type: "POST",             
		data: fd, 
		contentType: false,       
		cache: false,             
		processData:false,        
		success: function(data){ 
			if(data.status == 200){
				growlShow('<h4>Berhasil</h4><p>Data Baru berhasil ditambahkan</p>','success');
				setTimeout(function(){
					window.location = '<?=base_url_admin('pesertadidik/'); ?>';
				},3000);
			}else{
				growlShow('Error '+data.message,'error');
			}
		},
		error: function(data){
			growlShow('Untuk saat ini tidak dapat menambahkan peserta didik');
		}
	});
});
