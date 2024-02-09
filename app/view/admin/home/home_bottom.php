</script>
<script>
var aniDrt = 3000;

function gritter(pesan,jenis="info"){
	$.bootstrapGrowl(pesan, {
		type: jenis,
		delay: 3456,
		allow_dismiss: true
	});
}
function commaSeparateNumber(val){
  while (/(\d+)(\d{3})/.test(val.toString())){
    val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  }
  return val;
}

function getStat(){
	NProgress.start();
	var url = '<?=base_url("api_admin/")?>';
	$.ajax({
		url: url,
		cache: true,
		success: function(dt){
			NProgress.done();
			$({someValue: 0}).animate({someValue: dt.data.klien_jml}, {
	      duration: aniDrt,
	      easing:'swing', // can be anything
	      step: function() { // called on every step
	        $('#h_klien_jml').text(commaSeparateNumber(Math.round(this.someValue)));
	      }
		  });
			$({someValue: 0}).animate({someValue: dt.data.proyek_jml}, {
	      duration: aniDrt,
	      easing:'swing', // can be anything
	      step: function() { // called on every step
	        $('#h_proyek_jml').text(commaSeparateNumber(Math.round(this.someValue)));
	      }
		  });
			$({someValue: 0}).animate({someValue: dt.data.modul_jml}, {
	      duration: aniDrt,
	      easing:'swing', // can be anything
	      step: function() { // called on every step
	        $('#h_modul_jml').text(commaSeparateNumber(Math.round(this.someValue)));
	      }
		  });
			$({someValue: 0}).animate({someValue: dt.data.item_pekerjaan_jml}, {
	      duration: aniDrt,
	      easing:'swing', // can be anything
	      step: function() { // called on every step
	        $('#h_item_pekerjaan_jml').text(commaSeparateNumber(Math.round(this.someValue)));
	      }
		  });
			$({someValue: 0}).animate({someValue: dt.data.tagihan.nominal}, {
	      duration: aniDrt,
	      easing:'swing', // can be anything
	      step: function() { // called on every step
	        $('#k_tagihan').text("Rp"+commaSeparateNumber(Math.round(this.someValue)));
	      }
		  });
			$({someValue: 0}).animate({someValue: dt.data.tagihan_bulan.nominal}, {
	      duration: aniDrt,
	      easing:'swing', // can be anything
	      step: function() { // called on every step
	        $('#k_tagihan_bulan').text("Rp"+commaSeparateNumber(Math.round(this.someValue)));
	      }
		  });
			$({someValue: 0}).animate({someValue: dt.data.tagihan_bulan_depan.nominal}, {
	      duration: aniDrt,
	      easing:'swing', // can be anything
	      step: function() { // called on every step
	        $('#k_tagihan_bulan_depan').text("Rp"+commaSeparateNumber(Math.round(this.someValue)));
	      }
		  });
			$({someValue: 0}).animate({someValue: dt.data.todo_count.P}, {
	      duration: aniDrt,
	      easing:'swing', // can be anything
	      step: function() { // called on every step
	        $('#todo_count_plan').text(""+commaSeparateNumber(Math.round(this.someValue)));
	      }
		  });
			$({someValue: 0}).animate({someValue: dt.data.todo_count.C}, {
	      duration: aniDrt,
	      easing:'swing', // can be anything
	      step: function() { // called on every step
	        $('#todo_count_code').text(""+commaSeparateNumber(Math.round(this.someValue)));
	      }
		  });
			$({someValue: 0}).animate({someValue: dt.data.todo_count.B}, {
	      duration: aniDrt,
	      easing:'swing', // can be anything
	      step: function() { // called on every step
	        $('#todo_count_build').text(""+commaSeparateNumber(Math.round(this.someValue)));
	      }
		  });
			$({someValue: 0}).animate({someValue: dt.data.todo_count.T}, {
	      duration: aniDrt,
	      easing:'swing', // can be anything
	      step: function() { // called on every step
	        $('#todo_count_test').text(""+commaSeparateNumber(Math.round(this.someValue)));
	      }
		  });
		},
		error: function(){
			NProgress.done();
		}
	})

}

setTimeout(function(){
	getStat();
},333);
