$("#tambah").on("click", function () {
    var list = `
    <form action="<?=site_url('penjualan/nota')?>" method="POST">
    <tr>
      <td class="jumlah text-end" name="idBarang">${idBarang}</td>
      <td class="jumlah text-end" name="nB">${namaBarang}</td>
      <td class="jumlah text-end" name="hR">${harga}</td>
      <td class="jumlah text-end" name="qT">${qty}</td>
      <td class="jumlah text-end" name="tO">${total}</td>
      </tr>
    </form>
      
    `;
    $("#list-barang tbody").html(list);
    hargaTotal += total;
    $("#total").text(hargaTotal);
    $("#totalBayar").attr("readonly", false);

    $("#totalBayar").on("change", function () {
        $("#bayar").attr("disabled", false);
    });
    list = $(this).val();
    $("#bayar").on("click", function () {
        $("#bayar").on("click", function () {
            var totalRow = $("#pembayaran").find("tr").length;
            //console.log(totalRow)
            var list = `
    <tr>
    <td>${hargaTotal}</td>
    <td>${totalRow}</td>
    <td><input type="number" class="form-control" id="uang" required></td>
    </tr>`;
            $("#pembayaran tbody").html(list);
        });

        $("#doneDeal").on("click", function () {
            // var hargaTotal = 0
            // var uang = 0
            var uang = $("#uang").val();
            var kembalian = uang - hargaTotal;

            $("#kembalianModal #kembalian").text(kembalian);
            pembayaranModal.hide();

            idBarang = 0;
            namaBarang = "";
            qty = 0;
            harga = 0;
            total = 0;
            hargaTotal = 0;
            $("#barang").val("");
            $("#harga").val("");
            $("#jmlh").val("");
            $("#qty").val("");

            $("#list-barang tbody").html("");
            $("#list-barang tfoot").html("");
            kembalianModal.show();
        });
    });
});