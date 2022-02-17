<script>
var strukModal = new bootstrap.Modal(document.getElementById('strukModal'))

var totalBayar = 0
var kembalian = 0

$("#barang").on("change", function () {
	$("#jmlh").val("");
	$("#qty").val("");

	var idBarang = $(this).val();

	$.ajax({
		url: "<?= site_url('Penjualan/getHarga/') ?>" + idBarang,
		type: "POST",
		data: {
			idBarang: idBarang,
		},
		dataType: "JSON",
		success: function (data) {
			$("#namaBarang").val(data.nama_barang);
			$("#harga").val(data.harga);
		},
	});

	$("#qty").attr("readonly", false);
});

$("#qty").on("change", function () {
	var qty = $(this).val();
	var harga = $("#harga").val();
	var total = qty * harga;
	$("#jmlh").val(total);
	$("#tambah").attr("disabled", false);
});

$('#bayar').on('click', function() {
	if(!$('#totalBayar').val()) {
		Swal.fire({
			icon: 'warning',
			title: 'Masukan uang bayar',
			timer: 3500
		})

		return false
	}

	if(parseInt($('#totalBayar').val()) < parseInt('<?=$total?>')) {
		Swal.fire({
			icon: 'warning',
			title: 'Uang bayar kurang',
			timer: 3500
		})

		return false
	}

	totalBayar = $('#totalBayar').val()
	kembalian = parseInt(totalBayar) - parseInt('<?=$total?>')

	$('.totalBayar').text(totalBayar)
	$('#kembalian').text(kembalian)

	$('input[name="totalBayar"]').val(totalBayar)
	$('input[name="kembalian"]').val(kembalian)

	strukModal.show()
})

function PrintElem(elem) 
{
    Popup($(elem).html());
}

function Popup(data) 
{
	// console.log(data)
	// return false
    var mywindow = window.open('', 'new div', 'height=400,width=600');
    mywindow.document.write('<html><head><title></title>');
    mywindow.document.write('<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/struk.css')?>" />');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');

	setTimeout(function () {
		mywindow.print();
		mywindow.close();

		$('#checkoutForm').submit();
	}, 500);

    return true;
}

function printInvoice(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

</script>