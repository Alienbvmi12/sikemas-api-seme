var login_try = 0;

$("#flupa").on("submit",function(evt){
	evt.preventDefault();
	console.log('login')
	login_try++;
	var url = '<?=base_url('lupa/proses'); ?>';
	var fd = {};
	fd.email = $("#iemail").val();
	if(fd.email.length<=3){
		$("#iemail").focus();
		gritter("<h4>Info</h4><p>Email belum diisi atau terlalu pendek</p>",'info');
		return false;
	}
	NProgress.start();
	$(".btn-submit").prop("disabled",true);
	$(".icon-submit").removeClass("fa-circle-o-notch");
	$(".icon-submit").removeClass("fa-spin");
  $(".icon-submit").removeClass("fa-save");
	$("#icon-submit").addClass("fa-envelope");
	$("#iemail").prop("disabled",true);
	$(".icon-submit").addClass("fa-circle-o-notch");
  $(".icon-submit").addClass("fa-spin");
	$.post(url,fd).done(function(dt){
		NProgress.set(0.6);
		if(dt.status == 200){
			gritter("<h4>Sukses</h4><p>Silakan cek kotak masuk / spam email anda</p>",'success');
			setTimeout(function(){
				NProgress.set(0.7)
			},2000);
			setTimeout(function(){
				NProgress.done();
				$("#iemail").removeAttr("disabled");
				$(".btn-submit").removeAttr("disabled");
		    $(".icon-submit").removeClass("fa-circle-o-notch");
				$(".icon-submit").removeClass("fa-spin");
		    $(".icon-submit").addClass("fa-envelope");
				$(".btn-submit").prop("disabled",false);
			},3000);
		}else{
			$("#iemail").removeAttr("disabled");
	    $(".icon-submit").removeClass("fa-circle-o-notch");
			$(".icon-submit").removeClass("fa-spin");
	    $(".icon-submit").addClass("fa-envelope");
			$(".btn-submit").prop("disabled",false);
			NProgress.done();
			gritter("<h4>Gagal</h4><p>"+dt.message+"</p>",'danger');
			setTimeout(function(){
				$("#bsubmit").removeClass("fa-spin");
				if(login_try>2){
					//window.location = '<?=base_url('login')?>';
				}
			},3000);
		}
	}).fail(function(){
    $(".icon-submit").removeClass("fa-circle-o-notch");
		$(".icon-submit").removeClass("fa-spin");
    $(".icon-submit").addClass("fa-envelope");
    $("#iemail").removeAttr("disabled");
		$(".btn-submit").prop("disabled",false);
		gritter("<h4>Error</h4><p>Tidak dapat mereset password saat ini, silahkan coba lagi nanti</p>",'warning');
		NProgress.done();
	});
});
setTimeout(function(){
  $('#iemail').focus();
},777);
