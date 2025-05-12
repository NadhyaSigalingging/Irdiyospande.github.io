<?php

include('component/com-kamar.php');
include('component/com-transaksi.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dashboard | Hotel Management System</title>
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
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
			border-radius: 10px;
		}
		.box {
			border-radius: 10px;
		}

		/* Custom warna box Kamar Tersedia */
		.kamar-tersedia-box {
			background-color: #668068 !important;
			color: #ffffff !important;
		}
		.kamar-tersedia-box .icon {
			color: rgba(255, 255, 255, 0.6);
		}
		.kamar-tersedia-box .inner h3,
		.kamar-tersedia-box .inner p {
			color: #ffffff;
		}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<section class="content-header">
		<h1>Dashboard <span class="small">Welcome | Hotel Management System</span></h1>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-sm-3">
				<div class="small-box kamar-tersedia-box">
					<div class="inner">
						<h3><?php echo $total_kamar; ?></h3>
						<p>Kamar Tersedia</p>
					</div>
					<div class="icon">
						<i class="fa fa-bed"></i>
					</div>
					<a class="small-box-footer" href="#"></a>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo $total_terpakai; ?></h3>
						<p>Terisi</p>
					</div>
					<div class="icon">
						<i class="fa fa-bed"></i>
					</div>
					<a class="small-box-footer" href="#"></a>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo $total_kotor; ?></h3>
						<p>Kamar Kotor (VD)</p>
					</div>
					<div class="icon">
						<i class="fa fa-bed"></i>
					</div>
					<a class="small-box-footer" href="#"></a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Tamu</h3>
					</div>
					<div class="box-body">
						<?php if(!empty($tamu_inhouse)) { ?>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nama Tamu</th>
									<th>Nomor Kamar</th>
									<th>Tanggal/Jam Check-In</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($tamu_inhouse as $tamu) { ?>
								<tr>
									<td><?php echo $tamu['prefix'].'. '.$tamu['nama_depan'].' '.$tamu['nama_belakang']; ?></td>
									<td><?php echo $tamu['nomor_kamar']; ?></td>
									<td><?php echo $tamu['tanggal_checkin'].' - '.$tamu['waktu_checkin']; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php } else { ?>
						<div class="alert alert-warning">
							<h4>Mohon maaf</h4>
							Untuk sementara tidak ada tamu yang sedang menginap di hotel.
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/dist/js/app.min.js"></script>

</body>
</html>
