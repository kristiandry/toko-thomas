<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/r-2.2.9/datatables.min.css"/>

<div class="pagetitle">
	<h1>Penjualan</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo site_url('penjualan') ?>">Laporan</a></li>
			<li class="breadcrumb-item active">Penjualan</li>
		</ol>
	</nav>
</div><!-- End Page Title -->

<section class="section">
	<div class="row col-lg-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Detail Penjualan</h5>
				<div class="row">
					<div class="col-12">
						<table class="table table-borderless">
							<tr>
								<th style="width: 150px;">Tanggal</th>
								<td style="width: 10px;">:</td>
								<td><?=date('d-m-Y H:i:s', strtotime($penjualan['tanggal_penjualan']))?></td>
							</tr>
							<tr>
								<th>Jumlah Barang</th>
								<td>:</td>
								<td><?=$penjualan['jumlah_barang']?></td>
							</tr>
							<tr>
								<th>Total Harga</th>
								<td>:</td>
								<td><?=$penjualan['total_harga']?></td>
							</tr>
							<tr>
								<th>Total Bayar</th>
								<td>:</td>
								<td><?=$penjualan['total_bayar']?></td>
							</tr>
							<tr>
								<th>Kembalian</th>
								<td>:</td>
								<td><?=$penjualan['kembalian']?></td>
							</tr>
						</table>
					</div>
				</div>

				<hr class="mb-4" />

				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table class="table table-bordered" style="width: 100%;">
								<thead class="table-secondary text-center">
									<tr>
										<th style="width: 120px;">Kode Barang</th>
										<th>Nama Barang</th>
										<th>Harga</th>
										<th>Quantity</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody class="text-center">
									<?php foreach($details as $detail) { ?>
										<tr>
											<td><?=$detail['id_barang']?></td>
											<td><?=$detail['nama_barang']?></td>
											<td><?=$detail['harga']?></td>
											<td><?=$detail['quantity']?></td>
											<td><?=$detail['jumlah']?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<hr/>

				<div class="row">
					<div class="col-12">
						<a href="<?=site_url('laporan')?>">
							<div class="d-grid">
								<button type="button" class="btn btn-primary">
									Kembali
								</button>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/r-2.2.9/datatables.min.js"></script>

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
	$(document).ready(function() {
		$('.datatables').DataTable({

		})
	})
</script>