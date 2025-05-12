<?php
include('component/com-layanan.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Tambah Layanan</title>
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
			padding: 20px;
			border-radius: 12px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
		}
		.form-control {
			border-radius: 8px;
			box-shadow: none;
			border-color: #ccc;
		}
		label {
			font-weight: 600;
			margin-top: 10px;
		}
		.box-footer {
			margin-top: 20px;
		}
		.btn {
			border-radius: 8px;
			min-width: 100px;
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
			background-color: #c4a95c;
			border-color: #b0934b;
			color: white;
		}
		.btn-warning:hover {
			background-color: #b0934b;
		}
		.btn-info {
			background-color: #6c8c8c;
			border-color: #5c7a7a;
			color: white;
			margin-right: 5px;
		}
		.alert {
			border-radius: 10px;
			padding: 20px;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>Tambah Layanan Tambahan</h1>
</section>

<section class="content">
	<?php if(isset($_POST['layanan-add'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah melakukan penambahan data layanan. 
		<br/><br/>
		<a class="btn btn-info" href="?module=layanan/layanan-add">Tambah Lagi</a>
		<a class="btn btn-info" href="?module=layanan/layanan-list">Kembali</a>
	</div>
	<?php } else { ?>
	<form action="" method="post">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<label>Nama Layanan</label>
							<input class="form-control" name="nama_layanan" required />
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<select class="form-control" name="id_layanan_kategori" required>
								<option value="">-- Pilih Kategori --</option>
								<?php foreach($layanan_kategori as $layanan_kategori) { ?>
								<option value="<?php echo $layanan_kategori['id_layanan_kategori']; ?>">
									<?php echo $layanan_kategori['nama_layanan_kategori']; ?>
								</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Satuan</label>
							<input class="form-control" name="satuan" required />
						</div>
						<div class="form-group">
							<label>Harga</label>
							<input class="form-control" name="harga_layanan" required />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer"style="text-align: center;background: #D6D3C6">
				<button class="btn btn-success" type="submit" name="layanan-add">Tambah</button>
				<a class="btn btn-warning" href="?module=layanan/layanan-list">Batal</a>
			</div>
		</div>
	</form>
	<?php } ?>
</section>

</body>
</html>
