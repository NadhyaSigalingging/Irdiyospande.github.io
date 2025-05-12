<?php
include('component/com-kamar.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Room</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<style>
		html, body, .wrapper, .content-wrapper {
			background-color: #DFDAC8 !important;
			font-family: 'Segoe UI', sans-serif;
		}
		.content-header h1 {
			text-align: center;
			margin: 30px 0;
			color: #3b3b3b;
		}
		.content {
			background-color: transparent;
			padding: 20px;
		}
		.box {
			background-color: #D6D3C6;
			padding: 30px;
			border-radius: 12px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
		}
		.form-group label {
			font-weight: 600;
			color: #3b3b3b;
		}
		.form-control {
			border-radius: 8px;
			border: 1px solid #ccc;
		}
		select.form-control option {
			color: #000;
		}
		.alert-success {
			background-color: #cde3cd;
			color: #2e4b2e;
			border-radius: 10px;
			padding: 15px;
			text-align: center;
			margin-bottom: 20px;
		}
		.btn-success {
			background-color: #7e9e7e;
			border-color: #6b886b;
			border-radius: 8px;
			padding: 10px 30px;
			font-weight: bold;
			color: white;
		}
		.btn-success:hover {
			background-color: #6b886b;
			border-color: #5a745a;
		}
		.btn-warning {
			border-radius: 8px;
			padding: 10px 30px;
			font-weight: bold;
			color: white;
		}
		.box-footer {
			text-align: center;
			margin-top: 30px;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>Add Room</h1>
</section>

<section class="content">
	<?php if(isset($_POST['kamar-add'])) { ?>
		<div class="alert alert-success">
			<h4>Berhasil</h4>
			Anda berhasil melakukan penambahan kamar. <br>
			<a href="?module=kamar/kamar-add">Tambah kamar lagi</a> /
			<a href="?module=kamar/kamar-list">Kembali</a>
		</div>
	<?php } else { ?>
	<form action="" method="post">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Room Number</label>
							<input class="form-control" name="nomor_kamar" required />
						</div>
						<div class="form-group">
							<label>Room Type</label>
							<select class="form-control" name="id_kamar_tipe" required>
								<option disabled selected>-- Select --</option>
								<?php foreach ($kamar_tipe as $kamar_tipe) { ?>
									<option value="<?php echo $kamar_tipe['id_kamar_tipe']; ?>">
										<?php echo $kamar_tipe['nama_kamar_tipe']; ?>
									</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Maximal Adult</label>
							<select class="form-control" name="max_dewasa" required>
								<option disabled selected>-- Select --</option>
								<?php for($i = 1; $i <= 5; $i++) { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?> Orang</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Maximal Children</label>
							<select class="form-control" name="max_anak" required>
								<option disabled selected>-- Select --</option>
								<?php for($i = 1; $i <= 5; $i++) { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?> Orang</option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer"style="text-align: center;background: #D6D3C6">
				<button class="btn btn-success" type="submit" name="kamar-add">Add Room</button>
				<a class="btn btn-warning" href="?module=kamar/kamar-list">Cancel</a>
			</div>
		</div>
	</form>
	<?php } ?>
</section>

</body>
</html>
