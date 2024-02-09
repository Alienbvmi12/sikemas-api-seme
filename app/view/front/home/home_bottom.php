function inputProses(key, value){
if(typeof(value) != "undefined" && value !== null){
$("#v"+key).text(value);
}
}
NProgress.start();
$.get('<?= base_url("api_front/home/statistik/") ?>').done(function(dt){
NProgress.done();
if(dt.status != 200){
gritter('<h4>Perhatian</h4><span>'+dt.message+'</span>','warning');
}
$.each(dt.data.statistik_rekomendasi, function(k,v){
$("#v"+v.utype).text(v.total);
})

$("#vtotal_advis").text(dt.data.total_advis);
$("#vtotal_rekomendasi").text(dt.data.total_rekomendasi);

inputProses('evaluasi', dt.data.proses.evaluasi);
inputProses('diskusi',dt.data.proses.diskusi);
inputProses('investigasi',dt.data.proses.investigasi);
inputProses('selesai',dt.data.proses.selesai);

}).fail(function(){
NProgress.done();
gritter('<h4>Gagal</h4><span>coba beberapa saat lagi</span>','danger');
})

$(".owl-carousel").owlCarousel({
loop: true,
margin: 0,
items: 1,
dots: true,
nav: true,
navText: ["<i class='fa fa-chevron-left prev-btn'></i>", "<i class='fa fa-chevron-right next-btn'></i>"],
animateOut: 'fadeOut',
animateIn: 'fadein',
smartSpeed: 90,
autoHeight: false,
autoplay: true,
mouseDrag: false
});