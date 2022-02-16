<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/struk.css')?>" />

<div class="pagetitle">
	<h1>Penjualan</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo site_url('penjualan') ?>">Transaksi</a></li>
			<li class="breadcrumb-item active">Penjualan</li>
		</ol>
	</nav>
</div><!-- End Page Title -->

<section class="section">
	<div class="row col-lg-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Form Penjualan</h5>
				<!-- General Form Elements -->
				<form method="POST" action="<?php echo site_url('Penjualan/addCart') ?>">
					<input type="hidden" id="namaBarang" name="namaBarang">
					<div class="row justify-content-between">
						<div class="col-sm-4 mb-3">
							<label for="inputText" class="col col-form-label">Nama Barang</label>
							<select id="barang" class="form-select" name="idBarang">
								<option disabled selected>-- Pilih Barang --</option>
								<?php foreach ($barang as $b) { ?>
									<option value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-sm-4 mb-3">
							<label for="inputEmail" class="col col-form-label">Harga</label>
							<input class="form-control" name="harga" type="text" id="harga" readonly />
						</div>
					</div>
					<div class="row justify-content-between">
						<div class="col-sm-4 mb-3">
							<label for="inputEmail" class="col col-form-label">Quantity</label>
							<input class="form-control" name="qty" type="number" min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="qty" readonly />
						</div>
						<div class="col-sm-4 mb-3">
							<label for="inputEmail" class="col col-form-label">Jumlah</label>
							<input class="form-control" name="jmlh" type="text" id="jmlh" readonly />
						</div>
						<div class="col-sm-6 mb-3">
							<button class="btn btn-outline-primary" id="tambah" type="submit" disabled>Tambah</button>
						</div>
					</div>
				</form><!-- End General Form Elements -->
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<hr class="my-4">
				<div class="row">
					<div class="col-12">
						<table id="list-barang" class="table table-bordered">
							<thead class="table-secondary text-center">
								<tr>
									<th style="width: 20px !important;">Aksi</th>
									<th class="col-2">Kode Barang</th>
									<th>Nama Barang</th>
									<th>Harga</th>
									<th>Quantity</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($carts)) { ?>
									<?php foreach ($carts as $cart) { ?>
										<tr>
											<td style="width: 20px;" class="text-center">
												<a href="<?= site_url('penjualan/deleteItem/' . $cart['idBarang']) ?>" onclick="return confirm('Apakah Anda yakin hapus data ini?');">
													<i class='bx bx-x text-danger'></i>
												</a>
											</td>
											<td class="text-center"><?= $cart['idBarang']; ?></td>
											<td><?= $cart['namaBarang']; ?></td>
											<td class="text-center"><?= $cart['harga']; ?></td>
											<td class="text-center"><?= $cart['qty']; ?></td>
											<td class="text-center"><?= $cart['jmlh']; ?></td>
										</tr>
									<?php } ?>
								<?php } else { ?>
									<tr>
										<td colspan="6" class="text-center">
											Keranjang kosong
										</td>
									</tr>
								<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="5" class="text-end">Total</th>
									<th id="total" class="col-3">
										<?= $total != 0 ? $total : ''; ?>
									</th>
								</tr>
								<tr>
									<th colspan="5" class="text-end">Bayar</th>
									<th><input class="form-control" type="number" min="0" oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="totalBayar" <?= empty($carts) ? 'readonly' : '' ?> /></th>
								</tr>
							</tfoot>
						</table>

						<!-- Button trigger modal -->
						<div class="col d-md-flex justify-content-md-end">
							<button type="button" id="bayar" class="btn btn-outline-success">Bayar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<form id="checkoutForm" method="POST" action="<?= site_url('penjualan/checkout') ?>">
		<input type="hidden" name="totalHarga" value="<?=$total?>" />
		<input type="hidden" name="totalBayar" />
		<input type="hidden" name="kembalian" />
		
		<div class="modal fade printable" id="strukModal" tabindex="-1">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Toko Thomas</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body printStrukContainer">
						<div id="printStruk">
							<p>Toko Thomas</p>
							<table class="bill-details">
								<tbody>
									<tr>
										<td>
											Tanggal : <span><?= date('d-m-Y H:i') ?></span>
										</td>
									</tr>
									<tr>
										<th class="center-align" colspan="2"><span class="receipt">Struk</span></th>
									</tr>
								</tbody>
							</table>

							<table class="items">
								<thead>
									<tr>
										<th class="heading name">Barang</th>
										<th class="heading qty">Harga</th>
										<th class="heading rate">Qty</th>
										<th class="heading amount">Jumlah</th>
									</tr>
								</thead>

								<tbody>
									<?php if (!empty($carts)) { ?>
										<?php foreach ($carts as $cart) { ?>
											<tr>
												<td><?= $cart['namaBarang']; ?></td>
												<td class="price"><?= $cart['harga']; ?></td>
												<td><?= $cart['qty']; ?></td>
												<td class="price"><?= $cart['jmlh']; ?></td>
											</tr>
										<?php } ?>
									<?php } ?>
									<tr>
										<td colspan="3" class="sum-up line">Total Belanja</td>
										<td class="line price"><?=$total?></td>
									</tr>
									<tr>
										<td colspan="3" class="sum-up">Bayar</td>
										<td class="price totalBayar"></td>
									</tr>
									<tr>
										<th colspan="3" class="total text">Kembalian</th>
										<th class="total price" id="kembalian"></th>
									</tr>
								</tbody>
							</table>
							<br/>
							<footer style="text-align:center">
								<p>Terima Kasih telah berbelanja di tempat kami</p>
							</footer>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onclick="PrintElem('.printStrukContainer')">Checkout</button>
						<!-- <button type="submit" class="btn btn-primary" onclick="return PrintElem('.printStrukContainer')">Checkout</button> -->
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- Modal Content: ends -->
</section>

<script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php $this->load->view('include/penjualan'); ?>

<?php if ($this->session->flashdata('success')) { ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: '<?= $this->session->flashdata('success') ?>',
			timer: 3500
		})
	</script>
<?php } ?>

<?php if ($this->session->flashdata('warning')) { ?>
	<script>
		Swal.fire({
			icon: 'warning',
			title: '<?= $this->session->flashdata('warning') ?>',
			timer: 3500
		})
	</script>
<?php } ?>