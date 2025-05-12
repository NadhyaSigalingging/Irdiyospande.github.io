<?php
include('component/com-kamar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Booking | Hotel Management System</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">

	<style>
		html, body, .wrapper, .content-wrapper {
			background-color: #DFDAC8 !important;
		}

		.content {
			background-color: #DFDAC8;
			padding: 20px;
			border-radius: 10px;
		}

		.small-box {
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			background-color: #3f8acb !important; /* warna biru */
			color: #ffffff;
		}

		.small-box .inner h3,
		.small-box .inner p {
			color: #ffffff;
		}

		.small-box-footer {
			background: rgba(0, 0, 0, 0.1);
			color: #fff !important;
			display: block;
			padding: 10px;
			text-align: center;
			text-decoration: none;
			border-radius: 0 0 10px 10px;
		}

		.alert {
			background-color: #fff3cd;
			border: 1px solid #ffeeba;
			color: #856404;
			border-radius: 10px;
		}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<section class="content-header">
		<h1>Booking <span class="small">Pilih Kamar</span></h1>
	</section>

	<section class="content">
		<div class="box" style="background: #D6D3C6; padding: 15px; border-radius: 10px;">
			<div class="box-body">
				<?php if(!empty($kamar_direservasi)) { ?>
				<div class="row">
					<?php foreach($kamar_direservasi as $kamar_direservasi) { ?>
					<div class="col-sm-3">
						<div class="small-box">
							<div class="inner">
								<h3><?php echo $kamar_direservasi['nomor_kamar']; ?></h3>
								<p><?php echo $kamar_direservasi['nama_kamar_tipe']; ?></p>
							</div>
							<div class="icon">
								<i class="fa fa-bed"></i>
							</div>
							<a class="small-box-footer" href="?module=transaksi/booking-add&kamar=<?php echo $kamar_direservasi['id_kamar']; ?>">Reservasi</a>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php } else { ?>
				<div class="alert alert-warning">
					<h4>Mohon Maaf</h4>
					Untuk sementara, tidak ada kamar yang tersedia.
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

</div>

<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/dist/js/app.min.js"></script>
</body>
</html>
