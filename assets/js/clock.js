var tw = new Date();
if (tw.getTimezoneOffset() == 0) a = tw.getTime() + 7 * 60 * 60 * 1000;
else a = tw.getTime();
tw.setTime(a);
var tahun = tw.getFullYear();
var hari = tw.getDay();
var bulan = tw.getMonth();
var tanggal = tw.getDate();
var hariarray = new Array(
	"Minggu,",
	"Senin,",
	"Selasa,",
	"Rabu,",
	"Kamis,",
	"Jum'at,",
	"Sabtu,"
);
var bulanarray = new Array(
	"Januari",
	"Februari",
	"Maret",
	"April",
	"Mei",
	"Juni",
	"Juli",
	"Agustus",
	"September",
	"Oktober",
	"Nopember",
	"Desember"
);
document.getElementById("tgl").innerHTML =
	hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun;

window.setTimeout("waktu()", 1000);

function waktu() {
	var tanggal = new Date();
	setTimeout("waktu()", 1000);
	document.getElementById("jam").innerHTML =
		tanggal.getHours() +
		":" +
		tanggal.getMinutes() +
		":" +
		tanggal.getSeconds();
}
