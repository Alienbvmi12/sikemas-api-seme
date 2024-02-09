var advis_id = <?=$cam->id?>;
var is_submit = 0;
var utype = '';
var is_update = 0;
var lampiran_id = ''

$("#modal_pemberitahuan").modal('show');

$('#isurat_permohonan').on('change',function(e){
  e.preventDefault();
  console.log('Change');
  var count=1;
  var files = e.currentTarget.files; // puts all files into an array

  // call them as such; files[0].size will get you the file size of the 0th file
  var x = 0;
  var filesize = ((files[x].size/1024)/1024).toFixed(4); // MB
  console.log('filesize',filesize);
  if (filesize >= 2) {
    gritter('<h4>Maaf</h4><p>Ukuran file surat Permohonan terlalu besar, maks 2MB</p>','warning');
    $(this)[0].value=null;
  }
});

function disableInput(selector){
  $(selector).attr('disabled', true);
}

function enableInput(selector){
  $(selector).removeAttr('disabled', false);
}

function updateFile(sinput=""){
  $('.btn-submit').prop('disabled',true);
  $('.icon-submit').removeClass('fa-save');
  $('.icon-submit').addClass('fa-circle-o-notch');
  $('.icon-submit').addClass('fa-spin');
  var fd = new FormData();
  var files = sinput[0].files[0];
  var name = sinput.attr('name');
  console.log(lampiran_id, 'lampiran_id di update event')
  fd.append('file_nya', files);
  fd.append('name', name);
  fd.append('advis_id', advis_id);
  fd.append('lampiran_id',lampiran_id);
  fd.append('utype',utype);
  $.ajax({
      url: '<?=base_url("api_front/advis/update_file/")?>',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        $('.btn-submit').prop('disabled',false);
        $('.icon-submit').removeClass('fa-spin');
        $('.icon-submit').removeClass('fa-circle-o-notch');
        $('.icon-submit').addClass('fa-save');
        if(response.status == 200){
          lampiran_id = response.data.lampiran_id;
          file = response.data.file;
          is_update = 0;

          console.log('file update')
          var a = '<a href="'+file+'" target="_blank">'
          if(file.substr(file.length - 3) == 'pdf'){
              a += '<img src="<?=base_url("media/pdf_logo.png")?>" class="img-responsive"/>'
          }else{
              a += '<img src="'+file+'" width="50%" class="img-responsive"/>'
          }
          a += '</a>'
          a += '<div class="btn-group">'
          a += '<a class="delete-file btn btn-default" href="#" data-id="'+lampiran_id+'"><i class="fa fa-trash"></i></a>'
          if(utype == 'multiplefile'){
            a += '<a class="update-file btn btn-default" href="#" data-id="'+lampiran_id+'"><i class="fa fa-pencil"></i></a>'
          }
          a += '</div>'
          $("#"+name+lampiran_id).html(a);
        }else{
          gritter('<h4>Perhatian</h4><span>'+response.message+'</span>','warning');
        }
        NProgress.done();
      },error: function(){
        $('.btn-submit').prop('disabled',false);
        $('.icon-submit').removeClass('fa-spin');
        $('.icon-submit').removeClass('fa-circle-o-notch');
        $('.icon-submit').addClass('fa-save');
        gritter('<h4>Gagal</h4><span>coba beberapa saat lagi</span>','danger');
        NProgress.done();
      }
  });
}

function postFile(sinput=""){
  NProgress.start();
  $('.btn-submit').prop('disabled',true);
  $('.icon-submit').removeClass('fa-save');
  $('.icon-submit').addClass('fa-circle-o-notch');
  $('.icon-submit').addClass('fa-spin');
  var fd = new FormData();
  var files = sinput[0].files[0];
  var name = sinput.attr('name');

  fd.append('file_nya', files);
  fd.append('name', name);
  fd.append('advis_id', advis_id);
  fd.append('utype',utype);
  $.ajax({
    url: '<?=base_url("api_front/advis/upload_file/")?>',
    type: 'post',
    data: fd,
    contentType: false,
    processData: false,
    success: function(response){

      if(response.status == 200){
        lampiran_id = response.data.lampiran_id;
        file = response.data.file;
        var is_updated = response.data.is_updated;

        if(utype != 'multiplefile'){
          disableInput("#"+sinput.attr('id'))
        }

        is_update = 0;

        sinput.val('')

        var a = '<div id="'+name+lampiran_id+'" class="col-md-2">'
        a += '<a href="'+file+'" target="_blank">'
        if(file.substr(file.length - 3) == 'pdf'){
            a += '<img src="<?=base_url("media/pdf_logo.png")?>" class="img-responsive"/>'
        }else{
            a += '<img src="'+file+'" width="50%" class="img-responsive"/>'
        }
        a += '</a>'
        a += '<div class="btn-group">'
        a += '<a class="delete-file btn btn-default" href="#" data-id="'+lampiran_id+'"><i class="fa fa-trash"></i></a>'
        if(utype == 'multiplefile'){
          a += '<a class="update-file btn btn-default" href="#" data-id="'+lampiran_id+'"><i class="fa fa-pencil"></i></a>'
        }
        a += '</div></div>'
        if(utype != 'multiplefile'){
          $("#panelfile_"+name).html(a);
        }else{
          $("#panelfile_"+name).append(a);
        }

      }else{
        gritter('<h4>Perhatian</h4><span>'+response.message+'</span>','warning');
      }

      $("#panelfile_"+name).off('click','.delete-file')
      $("#panelfile_"+name).on('click','.delete-file', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.get('<?=base_url("api_front/advis/delete_lampiran/")?>'+id).done(function(dt){
          if(dt.status == 200){
            utype = $("#i"+name).attr('data-utype');
            if(utype != 'multiplefile'){
              enableInput("#"+sinput.attr('id'))
              is_update = 0;
            }
            $("#"+name+lampiran_id).slideUp();
            setTimeout(function(){
              $("#"+name+lampiran_id).remove();
            },300)
          }else{
            gritter('<h4>Perhatian</h4><span>'+response.message+'</span>','warning');

          }
        }).fail(function(){
          gritter('<h4>Gagal</h4><span>coba beberapa saat lagi</span>','danger');
        })
      })

      $("#panelfile_"+name).off('click','.update-file')
      $("#panelfile_"+name).on('click','.update-file', function(e){
        e.preventDefault();
        lampiran_id = $(this).attr('data-id');
        console.log(lampiran_id,'lampiran_id')
        if(lampiran_id == ''){
          gritter('<h4>Perhatian</h4><span>Id lampiran tidak ada</span>','warning')
          return
        }
        is_update = 1;
        $("#i"+name).trigger('click');
      });
      $('.btn-submit').prop('disabled',false);
      $('.icon-submit').removeClass('fa-spin');
      $('.icon-submit').removeClass('fa-circle-o-notch');
      $('.icon-submit').addClass('fa-save');
      NProgress.done();
    },error: function(){
      $('.btn-submit').prop('disabled',false);
      $('.icon-submit').removeClass('fa-spin');
      $('.icon-submit').removeClass('fa-circle-o-notch');
      $('.icon-submit').addClass('fa-save');
      gritter('<h4>Gagal</h4><span>coba beberapa saat lagi</span>','danger');
      NProgress.done();
    }
  });
}

function postData(sinput){
  NProgress.start();
  $('.btn-submit').prop('disabled',true);
  $('.icon-submit').removeClass('fa-save');
  $('.icon-submit').addClass('fa-circle-o-notch');
  $('.icon-submit').addClass('fa-spin');
  var fd = new FormData($("#ftambah")[0]);
  var url = '<?=base_url("api_front/advis/baru/"); ?>';
  fd.append('advis_id',advis_id);
  $.ajax({
    type: $("#ftambah").attr('method'),
    url: url,
    data: fd,
    processData: false,
    contentType: false,
    success: function(respon){
      if(respon.status==200){
        if(is_submit == 1){
          gritter('<h4>Berhasil</h4><p>Data berhasil disimpan</p>','success');
          setTimeout(function(){
            window.location = '<?=base_url('advis')?>';
          }, 2666);
        }else{
          $('.btn-submit').prop('disabled',false);
          $('.icon-submit').removeClass('fa-spin');
          $('.icon-submit').removeClass('fa-circle-o-notch');
          $('.icon-submit').addClass('fa-save');
          advis_id = respon.data.id;
          postFile(sinput);
        }
      }else{
        $('.btn-submit').prop('disabled',false);
        $('.icon-submit').removeClass('fa-spin');
        $('.icon-submit').removeClass('fa-circle-o-notch');
        $('.icon-submit').addClass('fa-save');
        gritter('<h4>Gagal</h4><p>'+respon.message+'</p>','danger');
      }
      NProgress.done();
    },
    error:function(){
      gritter('<h4>Error</h4><p>Proses tambah data tidak bisa dilakukan, coba beberapa saat lagi</p>','danger');
      $('.btn-submit').prop('disabled',false);
      $('.icon-submit').removeClass('fa-spin');
      $('.icon-submit').removeClass('fa-circle-o-notch');
      $('.icon-submit').addClass('fa-save');
      NProgress.done();
    }
  });

}

$("#ftambah").on("submit",function(e){
	e.preventDefault();
  NProgress.start();
  $('.btn-submit').prop('disabled',true);
  is_submit = 1;
  postData();
});


//validasi data utama sebelum upload file

$('input[type="file"]').on('click', function(e){
    console.log(lampiran_id,'lampiran_id di click event')
    if(!$("#ftambah")[0].checkValidity()){
      e.preventDefault();
      $("#ftambah").find(':submit').click();
    }else{
        console.log('open file')
    }
})

$('.btn-file-add').on('click', function(e){
  e.preventDefault();
  $("#"+$(this).attr('data-id')).trigger('click');
})

$('input[type="file"]').on('change', function(e){
  e.preventDefault();
  NProgress.start();
  console.log(lampiran_id,'lampiran_id di change event')
  utype = $(this).attr('data-utype');

  var sinput = $(this);

  if(advis_id == '' || advis_id == 0){
    postData(sinput);
  }else{
    console.log('upload file without upload advice')
    console.log(is_update,'is_update')
    if(is_update == 1){
      updateFile(sinput);
    }else{
      postFile(sinput);
    }
  }
});

//fill
var fill = <?=json_encode($cam)?>;
$.each(fill,function(k,v){
  if(typeof v == 'string' || v instanceof String){
    $('#i'+k).val(v);
  }else if(typeof v == 'number' || v instanceof Number){
    $('#i'+k).val(v);
  }
});
