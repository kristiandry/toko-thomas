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
				<h5 class="card-title d-flex justify-content-between">
					Laporan Penjualan
					<a href="<?=site_url('laporan/exportExcel')?>">
						<button type="button" class="btn btn-success btn-sm">
							Export Excel
						</button>
					</a>
				</h5>
				<div class="table-responsive">
					<table class="datatables table table-bordered" style="width: 100%;">
						<thead class="table-secondary text-center">
							<tr>
								<th>Tanggal</th>
								<th style="width: 120px;">Jumlah Barang</th>
								<th>Total Harga</th>
								<th>Total Bayar</th>
								<th>Kembalian</th>
								<th style="width: 50px;">Aksi</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php foreach($penjualans as $penjualan) { ?>
								<tr>
									<td><?=date('d-m-Y H:i:s', strtotime($penjualan['tanggal_penjualan']))?></td>
									<td><?=$penjualan['jumlah_barang']?></td>
									<td><?=$penjualan['total_harga']?></td>
									<td><?=$penjualan['total_bayar']?></td>
									<td><?=$penjualan['kembalian']?></td>
									<td>
										<a href="<?=site_url('laporan/detail/'.$penjualan['id_penjualan'])?>">
											<button type="button" class="btn btn-primary btn-sm">
												Detail
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