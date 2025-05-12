<?php
include('component/com-kamar.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Room Status</title>
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

		.small-box {
			background-color: #7e9e7e !important;
			color: #fff;
			border-radius: 12px;
			padding: 15px;
			margin-bottom: 20px;
			text-align: center;
			box-shadow: 0 4px 6px rgba(0,0,0,0.1);
			transition: transform 0.2s ease-in-out;
		}

		.small-box:hover {
			transform: scale(1.05);
		}

		.small-box .inner h3 {
			font-size: 28px;
			margin: 0;
		}

		.small-box .inner p {
			font-size: 16px;
			margin: 5px 0 0;
		}

		.small-box .icon {
			font-size: 40px;
			margin-top: 10px;
		}

		.small-box-footer {
			display: block;
			padding: 10px;
			background: #6b886b;
			color: #fff;
			border-radius: 0 0 12px 12px;
			text-decoration: none;
			font-weight: bold;
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
	<h1>Room Status <span class="small"></span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">
			<?php if(!empty($kamar_kotor)) { ?>
			<div class="row">
				<?php foreach($kamar_kotor as $kamar_kotor) { ?>
				<div class="col-sm-3">
					<div class="small-box">
						<div class="inner">
							<h3><?php echo $kamar_kotor['nomor_kamar']; ?></h3>
							<p><?php echo $kamar_kotor['nama_kamar_tipe']; ?></p>
						</div>
						<div class="icon">
							<i class="fa fa-bed"></i>
						</div>
						<a class="small-box-footer" href="?module=kamar/kamarkotor_update&kamar=<?php echo $kamar_kotor['id_kamar']; ?>">Select</a>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php } else { ?>
			<div class="alert alert-warning">
				<h4>Mohon Maaf</h4>
				Untuk sementara, tidak ada kamar yang sedang kotor.
			</div>
			<?php } ?>
		</div>
	</div>
</section>

</body>
</html>
