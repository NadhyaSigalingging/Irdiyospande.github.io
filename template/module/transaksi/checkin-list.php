<?php
include('component/com-transaksi.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Guest In-House</title>
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

		.alert-warning {
			background-color: #f7e7c3;
			border-color: #f0d9a9;
			color: #8a6d3b;
			border-radius: 10px;
			padding: 20px;
		}

		.alert-warning h4 {
			color: #8a6d3b;
			font-weight: bold;
			text-transform: uppercase;
		}

		.table-striped > tbody > tr:nth-child(odd) {
			background-color: #f3f2ed;
		}

		.table > thead > tr {
			background-color: #c2beb1;
			color: #333;
		}

		.btn-primary {
			background-color: #829983;
			border-color: #6f846d;
			color: white;
			font-weight: bold;
			border-radius: 6px;
			transition: background-color 0.3s ease;
		}

		.btn-primary:hover {
			background-color: #6f846d;
			border-color: #5d705a;
		}

		h1 {
			color: #3b3b3b;
		}
	</style>
</head>
<body>
	<section class="content-header">
		<h1>Guest In-House</h1>
	</section>

	<section class="content">
		<div class="box">
			<div class="box-body">
				<?php if (!empty($tamu_inhouse)) { ?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Room</th>
								<th>Guest Name</th>
								<th>Check-In Date</th>
								<th>Check-Out Date</th>
								<th>Deposit</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($tamu_inhouse as $tamu_inhouse) { ?>
								<tr>
									<td><?php echo $tamu_inhouse['nomor_kamar']; ?></td>
									<td><?php echo $tamu_inhouse['prefix'] . '. ' . $tamu_inhouse['nama_depan'] . '&nbsp;' . $tamu_inhouse['nama_belakang']; ?></td>
									<td><?php echo $tamu_inhouse['tanggal_checkin']; ?></td>
									<td><?php echo $tamu_inhouse['tanggal_checkout']; ?></td>
									<td>Rp <?php echo number_format($tamu_inhouse['deposit']); ?></td>
									<td>
										<a class="btn btn-xs btn-primary" href="?module=transaksi/checkin-update&transaksi=<?php echo $tamu_inhouse['id_transaksi_kamar']; ?>&kamar=<?php echo $tamu_inhouse['id_kamar']; ?>">Ubah</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php } else { ?>
					<div class="alert alert-warning">
						<h4>Mohon maaf</h4>
						Untuk sementara tidak ada tamu yang sedang menginap.
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
</body>
</html>
