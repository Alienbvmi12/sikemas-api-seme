$(".alamat-preset-select2").select2({
	ajax: {
		method: 'post',
		dataType: 'json',
        delay: 250,
		data: function (params) {
            var query = {
                keyword: params.term
            }
            return query;
        },
        processResults: function (dt) {
            return {
                results:  $.map(dt.result, function (itm) {
                    return {
                        text: (itm.desakel+', '+itm.kecamatan+', '+itm.kabkota+', '+itm.provinsi+', '+itm.negara),
                        id: (itm.desakel+', '+itm.kecamatan+', '+itm.kabkota+', '+itm.provinsi+', '+itm.negara)
                    }
                })
            };
        },
        cache: true
	},
	formatNoMatches: function () {
        return "Isi nama daerah / kecamatan";
    },
	"language": {
        "noResults": function(){
            return "Isi nama daerah / kecamatan";
        }
    }
});