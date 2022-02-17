<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/r-2.2.9/datatables.min.css" />

<div class="pagetitle">
	<h1>Stok Barang</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo site_url('penjualan') ?>">Transaksi</a></li>
			<li class="breadcrumb-item active">Stok</li>
		</ol>
	</nav>
</div><!-- End Page Title -->

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Form Penjualan</h5>
					<!-- General Form Elements -->

					<hr class="my-4">

					<div class="row">
						<div class="col-12">
							<table id="list-barang" class="datatables table table-bordered" style="width: 100%;">
								<thead class="table-secondary text-center">
									<tr>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Stok Barang</th>
										<th>Harga</th>
										<th style="width: 130px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($barang as $b) { ?>
										<tr>
											<td class="text-center"><?= $b['id_barang'] ?></td>
											<td><?= $b['nama_barang'] ?></td>
											<td class="text-center"><?= $b['stok'] ?></td>
											<td class="text-center"><?= $b['harga'] ?></td>
											<td class="text-center">
												<a id="<?=$b['id_barang']?>" class="ubah">
													<button type="button" class="btn btn-sm btn-success">
														Ubah
													</button>
												</a>
												<a href="<?=site_url('barang/hapus/'.$b['id_barang'])?>" onclick="return confirm('Apakah Anda yakin hapus data ini?');">
													<button type="button" class="btn btn-sm btn-danger">
														Hapus
													</button>
												</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<form method="POST" action="<?=site_url('barang/update')?>">
	<div class="modal fade" id="ubahBarangModal" tabindex="-1" aria-labelledby="ubahBarangModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ubahBarangModalLabel">Form Ubah Barang</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="form-group row mb-3">
						<label for="id_barang" class="col-sm-2 col-form-label">Kode Barang</label>
						<div class="col-sm-2">
							<input type="number" class="form-control" name="id_barang" id="id_barang" readonly required />
						</div>
					</div>
					<div class="form-group row mb-3">
						<label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nama_barang" id="nama_barang" required />
						</div>
					</div>
					<div class="form-group row mb-3">
						<label for="stok" class="col-sm-2 col-form-label">Stok</label>
						<div class="col-sm-2">
							<input type="number" class="form-control" name="stok" id="stok" required />
						</div>
					</div>
					<div class="form-group row mb-3">
						<label for="harga" class="col-sm-2 col-form-label">Harga</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" name="harga" id="harga" required />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/r-2.2.9/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if($this->session->flashdata('success')) { ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: '<?=$this->session->flashdata('success')?>',
			timer: 3500
		})
	</script>
<?php } ?>

<script>
	var ubahBarangModal = new bootstrap.Modal(document.getElementById('ubahBarangModal'))

	$(document).ready(function() {
		$('.datatables').DataTable()

		$('#list-barang').on('click', '.ubah', function() {
			var idBarang = $(this).attr('id')

			$.ajax({
				url: '<?=site_url('barang/getBarang/')?>' + idBarang,
				type: 'GET',
				dataType: 'JSON',
				success: function(data) {
					$('input[name="nama_barang"]').val(data.nama_barang)
					$('input[name="stok"]').val(data.stok)
					$('input[name="harga"]').val(data.harga)
				}
			})

			$('input[name="id_barang"]').val(idBarang)
			ubahBarangModal.show()
		})
	})
</script>