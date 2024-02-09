var pakaian = {};
pakaian.ukuran = ['XXS','XS','S','M','L','XL','XXL','XXXL'];
pakaian.warna = ['Hitam'];
//SEO
function convertToSlug(title){
	return title
		.toString().toLowerCase()
		.replace(/\s+/g, '-')           // Replace spaces with -
		.replace(/[^\w\-]+/g, '')       // Remove all non-word chars
		.replace(/\-\-+/g, '-')         // Replace multiple - with single -
		.replace(/^-+/, '')             // Trim - from start of title
		.replace(/-+$/, '');
}

//media

var media_id = '';
var folder_id = '';
var media_name = '';
var galeri_item_count = 0;

  function uploadFormShow(){
  	$("#modal_media_add").modal('show');
  	var url = '<?=base_url('api_admin/cms/media/'); ?>';
  	$.get(url).done(function(dt){
  		var h = '';
  		$.each(dt.result.folders,function(key,val){
  			h += '<option value="'+val.folder+'">'+val.folder+'</option>';
  		});
  		$("#ifolder").html(h).trigger('change');
  		$("#modal_media_add_loading").hide();
  		$("#modal_media_add_form").slideDown('slow');

  		$("#ifoldertambah").off("click")
  		$("#ifoldertambah").on("click",function(e){
  			e.preventDefault();
  			var f = prompt('Masukan nama folder baru');
  			if(f != null){
  				h = '<option value="'+f+'">'+f+'</option>';
  				$("#ifolder").prepend(h).val(f).trigger('change');
  			}
  		});
  	});
  }
	function row_media_manager(){
		//console.log('row_media_manager');
  	var base_url_img = '<?=base_url(); ?>';
  	var base_url_def = '<?=base_url('media/uploads/'.'/default.jpg'); ?>';
  	var url = '<?=base_url('api_admin/cms/media/'); ?>';

  	url += '?folder='+folder_id;

  	var h = '';
  	$("#rwm").html('<div class="col-md-12"><h2>Loading....</h2></div>');
  	$.get(url).done(function(dt){
  		if(dt.status == 200 || dt.status == '200'){
  			if(dt.result.files.length > 0){

  				var h = '';
  				$.each(dt.result.files,function(key,val){
  					h += '<div class="col-xs-6 col-sm-4 col-md-3 document">';
  					h += '	<div class="thmb">';
  					h += '		<div class="thmb-prev" data-id="'+val.id+'" data-nama="'+val.nama+'" data-thumb="'+val.thumb+'" style="background-image:url('+base_url_def+');min-width: 100px;min-height: 60px;">';
  					h += '			<img src="'+base_url_img+'/'+val.thumb+'" class="img-responsive" alt="">';
  					h += '		</div>';
  					h += '		<h5 class="fm-title"><a id="athmbopt" href="#" data-id="'+val.id+'" data-thumb="'+val.thumb+'" data-nama="'+val.nama+'">'+val.filename+'</a></h5>';
  					h += '		<small class="text-muted">'+val.tgl+'</small>';
  					h += '	</div>';
  					h += '</div>';
  				});

  				var base_url_media = '<?=base_url(); ?>';

  				$("#rwm").html(h);
  				$("#rwm").off("click",".thmb-prev");
  				$("#rwm").on("click",".thmb-prev",function(e){
  					e.preventDefault();

  					media_id = $(this).attr("data-id");
  					url_img = $(this).attr("data-nama");
  					url_thb = base_url_media+$(this).attr("data-thumb");

            var j = '';

            j += '<div id="galeri_item_'+galeri_item_count+'" class="col-xs-6 col-sm-4 col-md-4 document galeri_item_item">';
  					j += '	<div class="thmb">';
  					j += '		<div class="thmb-prev" style="background-image:url('+base_url_def+'); min-width: 100px;min-height: 60px;">';
  					j += '			<img src="'+url_thb+'" class="img-responsive" alt="">';
            j += '		</div>';
            j += '		<input type="hidden" name="image[]" value="'+url_img+'" />';
            j += '    <div class="input-group" style="">'
            j += '		  <input type="text" id="galeri_item_caption_'+galeri_item_count+'" name="caption[]" value="" class="form-control " placeholder="Caption"  />';
            j += '		  <span class="input-group-btn">';
            j += '        <button id="bgaleri_item_del" type="button" class="btn btn-danger" data-id="'+galeri_item_count+'"><i class="fa fa-trash-o"></i></button>';
            j += '	    </span>';
  					j += '	  </div>';
  					j += '	</div>';
  					j += '</div>';
            galeri_item_count++;

            $("#dgaleri_items").append(j);
            $("#dgaleri_items").off("click",'#bgaleri_item_del');
            $("#dgaleri_items").on("click",'#bgaleri_item_del',function(e){
              e.preventDefault();
              var id=$(this).attr("data-id");
              var cap = $('#galeri_item_caption_'+id).val();
              if(cap.length>0){
                var c = confirm('Apakah anda yakin?');
                if(c){
                  $("#galeri_item_"+id).remove();
                }
              }else{
                $("#galeri_item_"+id).remove();
              }
            });

            $("#modal_media").modal('hide');
  				});
  				$("#rwm").off("click","#athmbopt");
  				$("#rwm").on("click","#athmbopt",function(e){
  					e.preventDefault();

  					media_id = $(this).attr("data-id");
  					url_img = $(this).attr("data-nama");
  					url_thb = base_url_media+$(this).attr("data-thumb");

            var j = '';

            j += '<div id="galeri_item_'+galeri_item_count+'" class="col-xs-6 col-sm-4 col-md-4 document galeri_item_item">';
  					j += '	<div class="thmb">';
  					j += '		<div class="thmb-prev" style="background-image:url('+base_url_def+'); min-width: 100px;min-height: 60px;">';
  					j += '			<img src="'+url_thb+'" class="img-responsive" alt="">';
            j += '		</div>';
            j += '		<input type="hidden" name="image[]" value="'+url_img+'" />';
            j += '    <div class="input-group" style="">'
            j += '		  <input type="text" id="galeri_item_caption_'+galeri_item_count+'" name="caption[]" value="" class="form-control " placeholder="Caption"  />';
            j += '		  <span class="input-group-btn">';
            j += '        <button id="bgaleri_item_del" type="button" class="btn btn-danger" data-id="'+galeri_item_count+'"><i class="fa fa-trash-o"></i></button>';
            j += '	    </span>';
  					j += '	  </div>';
  					j += '	</div>';
  					j += '</div>';
            galeri_item_count++;

            $("#dgaleri_items").append(j);
            $("#dgaleri_items").off("click",'#bgaleri_item_del');
            $("#dgaleri_items").on("click",'#bgaleri_item_del',function(e){
              e.preventDefault();
              var id=$(this).attr("data-id");
              var cap = $('#galeri_item_caption_'+id).val();
              if(cap.length>0){
                var c = confirm('Apakah anda yakin?');
                if(c){
                  $("#galeri_item_"+id).remove();
                }
              }else{
                $("#galeri_item_"+id).remove();
              }
            });

            $("#modal_media").modal('hide');
  				});


  				//folders
  				var h = '';
  				$("#folder_list").empty();
  				$.each(dt.result.folders,function(key,val){
  					h +='<li><a href="#" class="folder_selector" data-folder="'+val.folder+'"><i class="fa fa-folder-o"></i> '+val.folder+'</a></li>';
  				});
  				$("#folder_list").html(h);

  				$("#folder_list").off("click");
  				$("#folder_list").on("click",".folder_selector",function(e){
  					e.preventDefault();
  					folder_id = $(this).attr("data-folder");
  					row_media_manager();
  				})
  			}else{
  				var h ='<div class="col-md-12"><h2>Folder Media masih kosong</h2></div>';
  				$("#rwm").html(h);
  			}
  		}

  	});
  }

  $("#modal_media_add").on("hidden.bs.modal",function(e){
  	$("#modal_media_add_form").trigger("reset");
  	$("#modal_media_add_loading").show();
  	$("#modal_media_add_form").hide('slow');
  });
  $("#aiimgsel").on("click",function(e){
    e.preventDefault();
    $("#modal_media").modal('show');
    row_media_manager();
    $("#buploadshow").off("click");
    $("#buploadshow").on("click",function(e){
      e.preventDefault();
      uploadFormShow();
    });
  });
  $("#aieimgsel").on("click",function(e){
    e.preventDefault();
    $("#modal_media").modal('show');
    row_media_manager();
    $("#buploadshow").off("click");
    $("#buploadshow").on("click",function(e){
      e.preventDefault();
      uploadFormShow();
    });
  });

  $("#bgaleritambah").on("click",function(e){
    e.preventDefault();
		//console.log('click');
    $("#modal_media").modal('show');
    row_media_manager();
    $("#buploadshow").off("click");
    $("#buploadshow").on("click",function(e){
      e.preventDefault();
      uploadFormShow();
    });
  });
	
  $("#modal_media_add_form").on("submit",function(e){
  	e.preventDefault();
		growlShow('Sedang upload gambar, silakan tunggu!','info');
  	$("#modal_media_add").modal("hide");

  	$.ajax({
  		url: '<?=base_url('api_admin/cms/media/add'); ?>', // Url to which the request is send
  		type: "POST",
  		data: new FormData(this),
  		contentType: false,
  		cache: false,
  		processData:false,
  		success: function(data){
  			if(data.status == "100" || data.status == 100){
  				setTimeout(function(){
						growlShow('Media berhasil diupload','success');
  				},1333);
  			}else{
					growlShow(data.message,'danger');
  				return false;
  			}
  			setTimeout(function(){
  				row_media_manager();
  			},3000);
  		},
  		error: function(d){
				growlShow('Maaf, sementara ini belum bisa upload media','danger');
  		}
  	});

  });
	
function growlShow(pesan,type='danger'){
	$.bootstrapGrowl(pesan, {
		type: type,
		delay: 2500,
		allow_dismiss: true
	});
}
$("#inama").on("blur",function(e){
	e.preventDefault();
	$("#islug").val(convertToSlug($('#inama').val()));
});
$("#isku").on("blur",function(e){
	e.preventDefault();
	$("#isku").parent().parent().removeClass('has-error');
	var fd = {};
	fd.kolom = 'sku';
	fd.nilai = $(this).val();
	var url = '<?=base_url('api_admin/pesertadidik/check/'); ?>';
	$.post(url,fd).done(function(dt){
		if(dt.status == 443 || dt.status == '443'){
			$("#isku").parent().parent().addClass('has-error');
		}
	});
});
$("#iutype").on("change",function(e){
	e.preventDefault();
	var v = $(this).val();
	if(v =='paket' || v == 'variasi'){
		$("#paket_wrapper").slideDown('slow');
	}else{
		$("#paket_wrapper").hide();
	}
});
$("#iutype").trigger('change');

$("#ipoin_dokter").on("blur",function(e){
	e.preventDefault();
	var v = parseFloat($(this).val()).toFixed(1);
	$(this).val(v);
});
$("#ipoin_terapis").on("blur",function(e){
	e.preventDefault();
	var v = parseFloat($(this).val()).toFixed(1);
	$(this).val(v);
});
$("#ipoin_pelanggan").on("blur",function(e){
	e.preventDefault();
	var v = parseFloat($(this).val()).toFixed(1);
	$(this).val(v);
});

$("#bpaket_item_tambah").on("click",function(e){
	e.preventDefault();
	alert('underconstruction');
});

//form
$("#ftambah").on("submit",function(e){
	e.preventDefault();
	growlShow('Loading...','info');
	
	var fd = new FormData($(this)[0]);
	
	$.ajax({
		url: '<?=base_url('api_admin/pesertadidik/tambah/'); ?>',
		type: "POST",             
		data: fd, 
		contentType: false,       
		cache: false,             
		processData:false,        
		success: function(data){ 
			if(data.status == '200' || data.status == 200){
				growlShow('<h4>Berhasil</h4><p>Peserta didik Berhasil ditambahkan</p>','success');
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
