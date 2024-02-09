$('#fmenu_cari').on('submit',function(e){
  e.preventDefault();
  var keyword = $('#top-search').val().toUpperCase();
  var txtValue = "";
  if(typeof keyword === 'string' && keyword.length>0){
    $.each($('.sidebar-nav'),function(k,a){
      $(a).hide();
      if($(a).has('ul')){
        $.each($(a).find('li'),function(k1,a1){
          $(a1).hide();
        });
      }
    });
    $.each($('.sidebar-nav'),function(k,a){
      if($(a).has('ul')){
        $.each($(a).find('li'),function(k1,a1){
          txtValue = a1.innerText || a1.textContent;
          var idx = txtValue.toUpperCase().indexOf(keyword);
          if (idx > -1) {
            console.log('.sidebar-nav: '+k+' ul: '+k1+' txtValue: '+txtValue+' -- IDX: '+idx);

            $(a).show();
            setTimeout(function(){
              $(a).find('a').removeClass('open');
              $(a).find('a').addClass('open');
              $(a1).parent().show();
              $(a1).show('slow');
            },333);

          }
        });
      }else{
        txtValue = a.innerText || a.textContent;
        var idx = txtValue.toUpperCase().indexOf(keyword);
        if (idx > -1) {
          console.log('.sidebar-nav: '+k+' txtValue: '+txtValue+' -- IDX: '+idx);
          $(a).show('slow');
        }
      }
    });
  }
})
