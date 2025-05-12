<?php
include('component/com-kamar.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Tambah Tipe Kamar</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<style>
		html, body, .wrapper, .content-wrapper {
			background-color: #DFDAC8 !important;
			font-family: 'Segoe UI', sans-serif;
		}
		.content {
			background-color: transparent;
			padding: 20px;
		}
		.content-header h1 {
			color: #3b3b3b;
			margin-bottom: 20px;
		}
		.box {
			background-color: #D6D3C6;
			border-radius: 12px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
			padding: 20px;
		}
		.btn-success {
			background-color: #7e9e7e;
			border-color: #6b886b;
			border-radius: 8px;
			color: white;
		}
		.btn-success:hover {
			background-color: #6b886b;
			border-color: #5a745a;
		}
		.btn-warning {
			border-radius: 8px;
		}
		.form-control, textarea {
			border-radius: 8px;
		}
		.alert {
			border-radius: 8px;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>Tambah Tipe Kamar <span class="small">Administrasi penambahan tipe kamar baru</span></h1>
</section>

<section class="content">
	<?php if(isset($_POST['kamartipe-add'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah berhasil menambah data Tipe Kamar.
		<a href="?module=kamar/tipe-list"><b>Kembali</b></a>
	</div>
	<?php } else { ?>
	<form action="" method="post">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Nama Tipe Kamar</label>
							<input class="form-control" name="nama_kamar_tipe" required />
						</div>
						<div class="form-group">
							<label>Harga / Malam</label>
							<input type="number" class="form-control" name="harga_malam" required />
						</div>
						
					</div>
					<div class="col-sm-4">
						<label>Keterangan</label>
						<textarea class="form-control" name="keterangan" rows="8"></textarea>
					</div>
				</div>
			</div>
			<div class="box-footer"style="text-align: center;background: #D6D3C6">
				<button class="btn btn-success" type="submit" name="kamartipe-add">Tambah</button>
				<a class="btn btn-warning" href="?module=kamar/tipe-list">Batal</a>
			</div>	
		</div>
	</form>
	<?php } ?>
</section>

</body>
</html>
