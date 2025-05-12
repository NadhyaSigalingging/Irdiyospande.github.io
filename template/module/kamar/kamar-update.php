<?php
include('component/com-kamar.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Room Edit</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<style>
		html, body, .wrapper, .content-wrapper {
			background-color: #DFDAC8 !important;
		}

		.content {
			background-color: #DFDAC8;
			padding: 30px;
			border-radius: 10px;
		}

		.box {
			background-color: #D6D3C6;
			padding: 30px;
			border-radius: 12px;
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
			max-width: 900px;
			margin: auto;
		}

		.box-footer {
			padding-top: 20px;
			text-align: center;
			background: #D6D3C6;
			border-top: 1px solid #ccc;
			margin-top: 20px;
		}

		.form-group label {
			font-weight: bold;
			color: #3b3b3b;
		}

		.form-control {
			border-radius: 8px;
			box-shadow: none;
			border: 1px solid #ccc;
		}

		h1 {
			color: #3b3b3b;
			margin-bottom: 30px;
		}

		.btn {
			border-radius: 8px;
			min-width: 130px;
			font-weight: bold;
		}

		.btn-success {
			background-color: #7e9e7e;
			border-color: #6b886b;
			color: white;
		}

		.btn-success:hover {
			background-color: #6b886b;
			border-color: #5a745a;
		}

		.btn-danger {
			background-color: #d9534f;
			border-color: #c9302c;
		}

		.btn-warning {
			background-color: #f0ad4e;
			border-color: #eea236;
		}

		.alert-success {
			background-color: #d0e9c6;
			border-color: #b2dba1;
			color: #3c763d;
			border-radius: 10px;
			padding: 20px;
			max-width: 800px;
			margin: 20px auto;
			text-align: center;
		}
	</style>
</head>
<body>

<section class="content-header text-center">
	<h1>Room <small>Edit</small></h1>
</section>

<section class="content">
	<?php if(isset($_POST['kamar-update'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda berhasil melakukan perubahan kamar. 
		<a href="?module=kamar/kamar-list" class="btn btn-success btn-sm" style="margin-top: 10px;">Kembali ke daftar</a>
	</div>
	<?php } else { ?>
	<form action="" method="post">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Room Number</label>
							<input class="form-control" name="nomor_kamar" value="<?php echo $kamar_view['nomor_kamar']; ?>" />
						</div>
						<div class="form-group">
							<label>Room Type</label>
							<input class="form-control" value="<?php echo $kamar_view['nama_kamar_tipe']; ?>" disabled />
							<select class="form-control" name="id_kamar_tipe">
								<option value="<?php echo $kamar_view['id_kamar_tipe']; ?>">-- Pilih --</option>
								<?php foreach ($kamar_tipe as $kamar_tipe) { ?>
								<option value="<?php echo $kamar_tipe['id_kamar_tipe']; ?>"><?php echo $kamar_tipe['nama_kamar_tipe']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Maximal Orang Dewasa</label>
							<input class="form-control" value="<?php echo $kamar_view['max_dewasa']; ?> Orang" disabled />
							<select class="form-control" name="max_dewasa">
								<option value="<?php echo $kamar_view['max_dewasa']; ?>">-- Pilih --</option>
								<?php for ($i = 1; $i <= 5; $i++) { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?> Orang</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Maximal Anak-anak</label>
							<input class="form-control" value="<?php echo $kamar_view['max_anak']; ?> Orang" disabled />
							<select class="form-control" name="max_anak">
								<option value="<?php echo $kamar_view['max_anak']; ?>">-- Pilih --</option>
								<?php for ($i = 1; $i <= 5; $i++) { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?> Orang</option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="box-footer">
				<input type="hidden" name="id_kamar" value="<?php echo $kamar_view['id_kamar']; ?>" />
				<button class="btn btn-success" type="submit" name="kamar-update">Update Room</button>
				<a class="btn btn-danger" href="?module=kamar/kamar-delete&kamar=<?php echo $kamar_view['id_kamar']; ?>">Delete Room</a>
				<a class="btn btn-warning" href="?module=kamar/kamar-list">Cancel</a>
			</div>
		</div>
	</form>
	<?php } ?>
</section>

</body>
</html>
