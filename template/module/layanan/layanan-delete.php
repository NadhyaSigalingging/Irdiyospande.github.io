<?php
include('component/com-layanan.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Hapus Layanan</title>
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
		.btn-danger {
			background-color: #a75d5d;
			border-color: #944848;
			color: white;
		}
		.btn-danger:hover {
			background-color: #944848;
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
	<h1>Hapus Layanan</h1>
</section>

<section class="content">
	<?php if(isset($_POST['layanan-del'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah sukses melakukan penghapusan data layanan. 
		<br/><br/>
		<a class="btn btn-info" href="?module=layanan/layanan-list">Kembali</a>
	</div>
	<?php } else { ?>
	<div class="alert alert-warning">
		<h4>Peringatan</h4>
		Apakah anda yakin ingin menghapus layanan <strong><?php echo $layanan_view['nama_layanan']; ?></strong>?<br>
		<small>Data yang dihapus tidak dapat dikembalikan.</small>
		<br/><br/>
		<form action="" method="post">
			<input type="hidden" name="id_layanan" value="<?php echo $layanan_view['id_layanan']; ?>" />
			<button class="btn btn-success" type="submit" name="layanan-del">Ya, Hapus</button>
			<a class="btn btn-info" href="?module=layanan/layanan-update&layanan=<?php echo $layanan_view['id_layanan']; ?>">Batal</a>
		</form>
	</div>
	<?php } ?>
</section>

</body>
</html>
