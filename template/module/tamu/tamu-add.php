<?php include('component/com-tamu.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add New Guest</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<style>
		html, body {
			background-color: #DFDAC8;
			font-family: 'Segoe UI', sans-serif;
			margin: 0;
			padding: 0;
		}
		.content {
			padding: 20px;
			background-color: #DFDAC8;
			min-height: 100vh;
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		.header-box {
			text-align: left;
			margin-bottom: 20px;
			padding: 20px 30px;
			background-color: #D6D3C6;
			border-radius: 12px;
			box-shadow: 0 2px 6px rgba(0,0,0,0.05);
			border: 1px solid #c9c4b1;
			width: 100%;
			max-width: 1300px;
		}
		.header-box h1 {
			color: #3b3b3b;
			margin: 0;
			font-size: 28px;
		}
		.box {
			background-color: #D6D3C6;
			border-radius: 12px;
			padding: 25px 30px;
			box-shadow: 0 2px 6px rgba(0,0,0,0.05);
			border: 1px solid #c9c4b1;
			width: 100%;
			max-width: 1300px;
		}
		.form-control {
			border-radius: 6px;
		}
		.btn {
			border-radius: 8px;
			min-width: 100px;
		}
		.btn-success {
			background-color: #7e9e7e;
			border-color: #6d896d;
			color: white;
			font-weight: bold;
		}
		.btn-success:hover {
			background-color: #6d896d;
		}
		.btn-warning {
			background-color: #d8a657;
			border-color: #c59243;
			color: white;
			font-weight: bold;
		}
		.btn-warning:hover {
			background-color: #c59243;
		}
		.alert-success {
			background-color: #b7d3b0;
			color: #2d4f2d;
			border-radius: 8px;
			border: 1px solid #9fc79f;
			padding: 20px;
			margin-bottom: 20px;
			width: 100%;
			max-width: 1300px;
		}
	</style>
</head>
<body>

<section class="content">
	<div class="header-box">
		<h1>Add New Guest</h1>
	</div>

	<?php if(isset($_POST['tamu-add'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah berhasil melakukan penambahan data tamu baru. 
		<a href="?module=tamu/tamu-add"><b>Add</b></a> / 
		<a href="?module=tamu/tamu-list"><b>Back</b></a>
	</div>
	<?php } else { ?>
	<div class="box">
		<form action="" method="post">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Guest Name</label>
							<div class="row">
								<div class="col-sm-3">
									<select class="form-control" name="prefix">
										<option value="Mr">Mr</option>
										<option value="Ms">Ms</option>
										<option value="Mrs">Mrs</option>
									</select>
								</div>
								<div class="col-sm-4">
									<input class="form-control" name="nama_depan" placeholder="Nama Depan" required />
								</div>
								<div class="col-sm-4">
									<input class="form-control" name="nama_belakang" placeholder="Nama Belakang" required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>ID</label>
							<div class="row">
								<div class="col-sm-3">
									<select class="form-control" name="tipe_identitas">
										<option value="KTP">KTP</option>
										<option value="SIM">SIM</option>
										<option value="PASSPORT">PASSPORT</option>
									</select>
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="nomor_identitas" placeholder="Nomor Identitas" required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Country</label>
							<div class="row">
								<div class="col-sm-4">
									<input class="form-control" name="warga_negara" placeholder="Contoh: Indonesia" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" name="alamat_jalan" rows="3" placeholder="Alamat Jalan..."></textarea>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" name="alamat_kabupaten" placeholder="Kabupaten / Kota" />
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="alamat_provinsi" placeholder="Provinsi" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label>Phone</label>
									<input class="form-control" name="nomor_telp" required />
								</div>
								<div class="col-sm-6">
									<label>Email</label>
									<input class="form-control" name="email" placeholder="contoh@email.com" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer" style="text-align: center;background: #D6D3C6">
				<button class="btn btn-success" type="submit" name="tamu-add">Add Guest</button>
				<a class="btn btn-warning" href="?module=tamu/tamu-list">Cancel</a>
			</div>
		</form>
	</div>
	<?php } ?>
</section>

</body>
</html>
