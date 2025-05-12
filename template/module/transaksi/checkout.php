<?php

include('component/com-transaksi.php');
include('component/com-kamar.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Check Out | Hotel Management System</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">

	<style>
		/* Background halaman */
		html, body, .wrapper, .content-wrapper {
			background-color: #DFDAC8 !important;
		}

		.content {
			background-color: #DFDAC8;
			padding: 20px;
			border-radius: 10px;
		}

		/* Box utama */
		.box {
			background: #D6D3C6 !important;
			padding: 15px;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
		}

		/* Card box kamar */
		.small-box {
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			background-color: #CE4D4D !important;
			color: #D6D3C6;
			margin-bottom: 20px;
			transition: transform 0.2s ease;
		}

		.small-box:hover {
			transform: scale(1.02);
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
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<section class="content-header">
		<h1>Check Out <span class="small">Select Room</span></h1>
	</section>

	<section class="content">
		<div class="box">
			<div class="box-body">
				<?php if(!empty($tamu_inhouse)) { ?>
				<div class="row">
					<?php foreach($tamu_inhouse as $tamu_inhouse) { ?>
					<div class="col-sm-3">
						<div class="small-box">
							<div class="inner">
								<h3><?php echo $tamu_inhouse['nomor_kamar']; ?></h3>
								<p><?php echo $tamu_inhouse['prefix'].'. '.$tamu_inhouse['nama_depan'].'&nbsp;'.$tamu_inhouse['nama_belakang']; ?></p>
							</div>
							<div class="icon">
								<i class="fa fa-bed"></i>
							</div>
							<a class="small-box-footer" href="?module=transaksi/checkout-proses&transaksi=<?php echo $tamu_inhouse['id_transaksi_kamar']; ?>">Select</a>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php } else { ?>
				<div class="alert alert-warning">
					<h4>Mohon Maaf</h4>
					Untuk sementara, tidak ada kamar yang terpakai.
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
