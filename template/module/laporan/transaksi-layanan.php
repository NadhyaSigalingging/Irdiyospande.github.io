<?php
include('component/com-laporan.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Point Of Sales Report</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<style>
		html, body, .wrapper, .content-wrapper {
			background-color: #DFDAC8 !important;
		}

		.content {
			background-color: #DFDAC8;
			padding: 20px;
			border-radius: 10px;
		}

		.box {
			background-color: #D6D3C6 !important;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
		}

		.table-striped > tbody > tr:nth-child(odd) {
			background-color: #f3f2ed;
		}

		.table > thead > tr {
			background-color: #c2beb1;
			color: #333;
		}

		.btn-success {
			background-color: #829983;
			border-color: #6f846d;
			color: white;
			font-weight: bold;
			border-radius: 6px;
			transition: background-color 0.3s ease;
		}

		.btn-success:hover {
			background-color: #6f846d;
			border-color: #5d705a;
		}

		.form-control {
			border-radius: 6px;
		}

		h1 {
			color: #3b3b3b;
		}

		.lead {
			font-weight: bold;
			color: #333;
		}

		/* Scrollable table container */
		.scrollable-table {
			max-height: 400px; /* Adjust the height as needed */
			overflow-y: auto;
			border: 1px solid #ccc;
			border-radius: 10px;
		}
	</style>
</head>
<body>
	<section class="content-header">
		<h1>Point Of Sales Report</h1>
	</section>

	<section class="content">
		<form action="" method="post">
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<input id="checkin" data-date-format="yyyy-mm-dd" class="form-control" name="tanggal-start" placeholder="From" />
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<input id="checkout" data-date-format="yyyy-mm-dd" class="form-control" name="tanggal-end" placeholder="To" />
					</div>
				</div>
				<div class="col-sm-3">
					<button class="btn btn-success" type="submit" name="laporan-layanan">View</button>
				</div>
			</div>
		</form>

		<?php if(isset($_POST['laporan-layanan'])) { ?>
		<div class="box">
			<div class="box-body">
				<!-- Add scrollable container here -->
				<div class="scrollable-table">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Date / Time</th>
								<th>Room Number</th>
								<th>Product / Services</th>
								<th>Price / Pax</th>
								<th>Pax</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($laporan_layanan as $laporan_layanan) { ?>
							<tr>
								<td><?php echo $laporan_layanan['tanggal'].' - '.$laporan_layanan['waktu']; ?></td>
								<td><?php echo $laporan_layanan['nomor_kamar']; ?></td>
								<td><?php echo $laporan_layanan['nama_layanan']; ?></td>
								<td>Rp <?php echo number_format($laporan_layanan['harga_layanan']); ?></td>
								<td><?php echo $laporan_layanan['jumlah'].'&nbsp;'.$laporan_layanan['satuan']; ?></td>
								<td>Rp <?php echo number_format($laporan_layanan['total']); ?></td>
							</tr>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="6"><span class="lead">Total Revenue : <b>Rp <?php echo number_format($total_laporan_layanan); ?></b></span></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<?php } ?>
	</section>
</body>
</html>
