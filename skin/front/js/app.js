function gritter(pesan, type = 'danger') {
	$.bootstrapGrowl(pesan, {
		type: type,
		delay: 5500,
		allow_dismiss: true
	});
}

var updateClock = function () {
	function pad(n) {
		return (n < 10) ? '0' + n : n;
	}

	var now = new Date();

	var s =
		pad(now.getHours()) + ':' +
		pad(now.getMinutes()) + ':' +
		pad(now.getSeconds());

	$('#waktu').html(s);

	var delay = 1000 - (now % 1000);
	setTimeout(updateClock, delay);
};
updateClock();
