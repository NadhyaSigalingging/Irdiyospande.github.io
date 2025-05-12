<?php include('component/com-tamu.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Update Guest</title>
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
		}
		.content-header {
			margin-bottom: 20px;
			background-color: #D6D3C6;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 2px 6px rgba(0,0,0,0.05);
			border: 1px solid #c9c4b1;
		}
		.content-header h1 {
			color: #3b3b3b;
			margin: 0;
			font-size: 28px;
		}
		.box {
			background-color: #D6D3C6;
			border-radius: 10px;
			padding: 25px;
			box-shadow: 0 2px 6px rgba(0,0,0,0.05);
			border: 1px solid #c9c4b1;
		}
		.form-control {
			border-radius: 6px;
		}
		.btn {
			border-radius: 8px;
			min-width: 110px;
			padding: 10px 20px;
			font-weight: 500;
		}
		.btn-success {
			background-color: #7e9e7e;
			border-color: #6d896d;
			color: white;
		}
		.btn-success:hover {
			background-color: #6d896d;
		}
		.btn-warning {
			background-color: #d8a657;
			border-color: #c59243;
			color: white;
		}
		.btn-warning:hover {
			background-color: #c59243;
		}
		.btn-danger {
			background-color: #cc5c5c;
			border-color: #b94e4e;
			color: white;
		}
		.btn-danger:hover {
			background-color: #b94e4e;
		}
		.alert-success {
			background-color: #b7d3b0;
			color: #2d4f2d;
			border-radius: 8px;
			border: 1px solid #9fc79f;
			padding: 20px;
			margin-bottom: 20px;
		}
		.box-footer {
			text-align: center;
			margin-top: 20px;
		}
	</style>
</head>
<body>

<section class="content">
	<div class="content-header">
		<h1>Update Guest</h1>
	</div>

	<?php if(isset($_POST['tamu-update'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah berhasil melakukan perubahan data tamu. 
		<a href="?module=tamu/tamu-list"><b>Kembali</b></a>
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
									<input class="form-control" name="prefix" value="<?php echo $tamu_view['prefix']; ?>" readonly />
								</div>
								<div class="col-sm-4">
									<input class="form-control" name="nama_depan" value="<?php echo $tamu_view['nama_depan']; ?>" />
								</div>
								<div class="col-sm-4">
									<input class="form-control" name="nama_belakang" value="<?php echo $tamu_view['nama_belakang']; ?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>ID</label>
							<div class="row">
								<div class="col-sm-3">
									<input class="form-control" name="tipe_identitas" value="<?php echo $tamu_view['tipe_identitas']; ?>" readonly />
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="nomor_identitas" value="<?php echo $tamu_view['nomor_identitas']; ?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Country</label>
							<input class="form-control" name="warga_negara" value="<?php echo $tamu_view['warga_negara']; ?>" />
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" name="alamat_jalan"><?php echo $tamu_view['alamat_jalan']; ?></textarea>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" name="alamat_kabupaten" value="<?php echo $tamu_view['alamat_kabupaten']; ?>" />
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="alamat_provinsi" value="<?php echo $tamu_view['alamat_provinsi']; ?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input class="form-control" name="nomor_telp" value="<?php echo $tamu_view['nomor_telp']; ?>" />
						</div>
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" name="email" value="<?php echo $tamu_view['email']; ?>" />
						</div>
					</div>
				</div>
			</div>

			<div class="box-footer"style="text-align: center;background: #D6D3C6">
				<input type="hidden" name="id_tamu" value="<?php echo $tamu_view['id_tamu']; ?>" />
				<button class="btn btn-success" type="submit" name="tamu-update">Update</button>
				<a class="btn btn-danger" href="?module=tamu/tamu-delete&tamu=<?php echo $tamu_view['id_tamu']; ?>">Delete</a>
				<a class="btn btn-warning" href="?module=tamu/tamu-list">Cancel</a>
			</div>
		</form>
	</div>
	<?php } ?>
</section>

</body>
</html>
