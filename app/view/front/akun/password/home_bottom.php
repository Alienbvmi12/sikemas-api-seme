function checkPwd() {
  $("#spassword").hide();
  $("#srepassword").hide();
  var str = $("#ipassword").val();
  if (str.length < 6) {
    $("#spassword").slideDown();
    $("#spassword").html("Password terlalu pendek, minimal 6 karakter");
    return("too_short");
  } else if (str.length > 31) {
    $("#spassword").slideDown();
    $("#spassword").html("Password terlalu panjang");
    return("too_long");
  } else if (str.search(/\d/) == -1) {
    $("#spassword").slideDown();
    $("#spassword").html("Silakan tambahkan minimal satu angka");
    return("no_num");
  } else if (str.search(/[a-zA-Z]/) == -1) {
    $("#spassword").slideDown();
    $("#spassword").html("Silakan tambahkan minimal satu huruf");
    return("no_letter");
  } else if (str.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+\.\,\;\:]/) != -1) {
    $("#spassword").slideDown();
    $("#spassword").html("Password tidak dapat menggunakan simbol khusus!");
    return("bad_char");
  }
  return("ok");
}
function gritter(judul,isi){
  $.growl({ title: judul, message: isi });
}
$("#ipassword").on("blur",function(e){
  e.preventDefault();
  checkPwd();
});
$("#irepassword").on("blur",function(e){
  e.preventDefault();
  $("#srepassword").hide();
  var p1 = $("#ipassword").val();
  var p2 = $("#irepassword").val();
  if(p1 != p2){
    $("#srepassword").html("Konfirmasi password tidak sama");
    $("#srepassword").slideDown();
    //$("#irepassword").focus();
  }
});
$("#fpassword").on("submit",function(e){
  $("#spassword").hide();
  $("#srepassword").hide();
  $("#irepassword").focus();
  setTimeout(function(){
    var p1 = $("#ipassword").val();
    var p2 = $("#irepassword").val();
    if(checkPwd() != 'ok'){
      return false;
    }
    if(p1 != p2){
      console.log("password doesnt match");
      $("#srepassword").html("Konfirmasi password tidak sama");
      $("#srepassword").slideDown();
      //$("#irepassword").focus();
      return false;
    }else{
      console.log("password matched!");
      return false;
    }
  },333);

});
//gritter("Test",'Wololoooo');
