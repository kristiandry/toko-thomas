<div class="pagetitle">
	<h1>Tambah Barang</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo site_url('penjualan') ?>">Barang</a></li>
			<li class="breadcrumb-item active">Tambah Barang</li>
		</ol>
	</nav>
</div><!-- End Page Title -->

<section class="section">
	<div class="row col-lg-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Form Tambah Barang</h5>
				<form method="POST" action="<?=site_url('barang/store')?>">
					<div class="form-group row mb-3">
						<label for="id_barang" class="col-sm-2 col-form-label">Kode Barang</label>
						<div class="col-sm-2">
							<input type="number" class="form-control" name="id_barang" id="id_barang" required />
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

					<hr />

					<div class="row">
						<div class="d-grid">
							<button type="submit" class="btn btn-success">
								Simpan
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
	</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
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