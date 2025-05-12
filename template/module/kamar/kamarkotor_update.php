<?php
include('component/com-kamar.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Status Kamar Edit</title>
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
			border-radius: 12px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
		}

		.box-footer {
			padding-top: 20px;
		}

		.form-control {
			border-radius: 8px;
		}

		.btn-success {
			background-color: #7e9e7e;
			border-color: #6b886b;
		}

		.btn-success:hover {
			background-color: #6b886b;
			border-color: #5a745a;
		}

		.btn-danger, .btn-warning {
			border-radius: 8px;
		}

		.alert-success {
			background-color: #d0e9c6;
			border-color: #b2dba1;
			color: #3c763d;
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
	<h1>Room <span class="small">Edit</span></h1>
</section>

<section class="content">
	<?php if(isset($_POST['kamar-update'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda berhasil melakukan perubahan kamar. 
		<a href="?module=kamar/kamar-list">Kembali</a>
	</div>
	<?php } else { ?>
	<form action="" method="post">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-4">
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
					<div class="col-sm-4">
						<div class="form-group">
							<label>Maximal Orang Dewasa</label>
							<input class="form-control" value="<?php echo $kamar_view['max_dewasa']; ?> Orang" disabled />
							<select class="form-control" name="max_dewasa">
								<option value="<?php echo $kamar_view['max_dewasa']; ?>">-- Pilih --</option>
								<option value="1">1 Orang </option>
								<option value="2">2 Orang </option>
								<option value="3">3 Orang </option>
								<option value="4">4 Orang </option>
								<option value="5">5 Orang </option>
							</select>
						</div>
						<div class="form-group">
							<label>Maximal Anak-anak</label>
							<input class="form-control" value="<?php echo $kamar_view['max_anak']; ?> Orang" disabled />
							<select class="form-control" name="max_anak">
								<option value="<?php echo $kamar_view['max_anak']; ?>">-- Pilih --</option>
								<option value="1">1 Orang </option>
								<option value="2">2 Orang </option>
								<option value="3">3 Orang </option>
								<option value="4">4 Orang </option>
								<option value="5">5 Orang </option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Room Status</label>
							<input class="form-control" value="<?php echo $kamar_view['status_kamar']; ?>" disabled />
							<select class="form-control" name="status_kamar">
								<option value="<?php echo $kamar_view['status_kamar']; ?>">-- Pilih --</option>
								<option value="TERSEDIA">VR</option>
								<option value="TERPAKAI">OC</option>
								<option value="KOTOR">VD</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer"style="text-align: center;background: #D6D3C6">
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
