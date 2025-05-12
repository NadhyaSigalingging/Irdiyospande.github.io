<?php
include('component/com-kamar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Check In | Hotel Management System</title>
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
			background-color: #545B30 !important;
			color: #D6D3C6;
			position: relative;
		}
		.small-box.reserved {
			background-color: #A68A1A !important;
		}
		.small-box .inner h3,
		.small-box .inner p {
			color: #D6D3C6;
		}
		.small-box .icon {
			color: rgba(255, 255, 255, 0.5);
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
		.small-box-footer:hover {
			background: rgba(0, 0, 0, 0.2);
		}
		.alert {
			background-color: #fff3cd;
			border: 1px solid #ffeeba;
			color: #856404;
			border-radius: 10px;
		}
		.label-reserved {
			position: absolute;
			top: 10px;
			right: 10px;
			background: yellow;
			color: #000;
			padding: 3px 8px;
			border-radius: 5px;
			font-weight: bold;
			font-size: 12px;
		}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<section class="content-header">
		<h1>Check In <span class="small">Pilih Kamar</span></h1>
	</section>

	<section class="content">
		<div class="box" style="background: #D6D3C6; padding: 15px; border-radius: 10px;">
			<div class="box-body">
				<?php if (!empty($kamar_tersedia)) { ?>
				<div class="row">
					<?php foreach ($kamar_tersedia as $kamar) { ?>
					<div class="col-sm-3">
						<div class="small-box <?php echo ($kamar['status_kamar'] == 'RESERVASI') ? 'reserved' : ''; ?>">
							<?php if ($kamar['status_kamar'] == 'RESERVASI') { ?>
								<div class="label-reserved">Reserved</div>
							<?php } ?>
							<div class="inner">
								<h3><?php echo $kamar['nomor_kamar']; ?></h3>
								<p><?php echo $kamar['nama_kamar_tipe']; ?></p>
							</div>
							<div class="icon">
								<i class="fa fa-bed"></i>
							</div>
							<?php if ($kamar['status_kamar'] == 'RESERVASI') { ?>
								<a class="small-box-footer" href="?module=transaksi/checkin-add&kamar=<?php echo $kamar['id_kamar']; ?>&reserved=true">Check-in Reserved</a>
							<?php } else { ?>
								<a class="small-box-footer" href="?module=transaksi/checkin-add&kamar=<?php echo $kamar['id_kamar']; ?>">Pilih</a>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php } else { ?>
				<div class="alert alert-warning">
					<h4>Mohon Maaf</h4>
					Saat ini tidak ada kamar yang tersedia atau telah direservasi.
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
