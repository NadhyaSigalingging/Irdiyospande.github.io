<?php
include('component/com-transaksi.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Room Services</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
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
			background-color: #D6D3C6;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
		}

		/* Override only bg-blue to match olive theme */
		.bg-blue {
			background-color: #7e9e7e !important;
			color: #fff !important;
		}

		.small-box .inner h3 {
			color: #fff;
		}

		.small-box .inner p {
			color: #eaeaea;
		}

		.small-box .icon {
			color: rgba(255, 255, 255, 0.8);
		}

		.small-box-footer {
			background: #6b886b;
			color: #fff;
			text-decoration: none;
			font-weight: bold;
			display: block;
			padding: 10px;
			border-radius: 0 0 4px 4px;
			transition: background 0.3s;
		}

		.small-box-footer:hover {
			background: #5a745a;
			color: #fff;
		}

		.alert-warning {
			background-color: #fcf8e3;
			border-color: #faebcc;
			color: #8a6d3b;
			border-radius: 10px;
			padding: 20px;
		}

		h1 {
			color: #3b3b3b;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>Room Services <span class="small">Select Room</span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">
			<?php if(!empty($tamu_inhouse)) { ?>
			<div class="row">
				<?php foreach($tamu_inhouse as $tamu_inhouse) { ?>
				<div class="col-sm-3">
					<div class="small-box bg-blue">
						<div class="inner">
							<h3><?php echo $tamu_inhouse['nomor_kamar']; ?></h3>
							<p><?php echo $tamu_inhouse['prefix'].'. '.$tamu_inhouse['nama_depan'].'&nbsp;'.$tamu_inhouse['nama_belakang']; ?></p>
						</div>
						<div class="icon">
							<i class="fa fa-bed"></i>
						</div>
						<a class="small-box-footer" href="?module=transaksi/pesan-layanan-add&transaksi=<?php echo $tamu_inhouse['id_transaksi_kamar']; ?>&tamu=<?php echo $tamu_inhouse['id_tamu']; ?>&kamar=<?php echo $tamu_inhouse['id_kamar']; ?>">Select</a>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php } else { ?>
			<div class="alert alert-warning">
				<h4>Mohon Maaf</h4>
				Untuk sementara, tidak ada tamu yang sedang menginap.
			</div>
			<?php } ?>
		</div>
	</div>
</section>

</body>
</html>
