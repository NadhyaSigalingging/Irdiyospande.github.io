<?php include('component/com-layanan.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Hapus Kategori Layanan</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<style>
		body {
			background-color: #DFDAC8;
			font-family: 'Segoe UI', sans-serif;
		}
		.content {
			padding: 20px;
		}
		.content-header h1 {
			color: #3b3b3b;
			margin-bottom: 20px;
		}
		.box {
			background-color: #D6D3C6;
			border-radius: 12px;
			padding: 20px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
			margin-bottom: 20px;
		}
		.alert {
			border-radius: 10px;
			padding: 20px;
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
		.btn-info {
			background-color: #6c8c8c;
			border-color: #5c7a7a;
			color: white;
		}
		.btn-info:hover {
			background-color: #5c7a7a;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>Hapus Kategori Layanan</h1>
</section>

<section class="content">
	<div class="box">
	<?php if(isset($_POST['layanankat-del'])) { ?>
		<div class="alert alert-success">
			<h4>Berhasil</h4>
			Anda telah sukses melakukan penghapusan data kategori layanan.
			<br/><br/>
			<a class="btn btn-info" href="?module=layanan/kategori-list">Kembali</a>
		</div>
	<?php } else { ?>
		<div class="alert alert-warning">
			<h4><i class="fa fa-exclamation-triangle"></i> Peringatan</h4>
			Apakah Anda yakin ingin menghapus kategori layanan <b><?php echo $layanan_kategori_view['nama_layanan_kategori']; ?></b>?
			<br>
			<small>(Data yang sudah dihapus tidak dapat dikembalikan lagi)</small>
			<br/><br/>
			<form action="" method="post">
				<input type="hidden" name="id_layanan_kategori" value="<?php echo $layanan_kategori_view['id_layanan_kategori']; ?>" />
				<button class="btn btn-success" type="submit" name="layanankat-del">Ya! Hapus</button>
				<a class="btn btn-info" href="?module=layanan/kategori-list">Batal</a>
			</form>
		</div>
	<?php } ?>
	</div>
</section>

</body>
</html>
