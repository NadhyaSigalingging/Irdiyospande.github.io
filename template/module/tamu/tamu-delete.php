<?php include('component/com-tamu.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Hapus Tamu</title>
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
		.alert-success {
			background-color: #b7d3b0;
			color: #2d4f2d;
			border-radius: 8px;
			border: 1px solid #9fc79f;
			padding: 20px;
			margin-bottom: 20px;
		}
		.alert-warning {
			background-color: #ffe6a1;
			color: #5f490b;
			border-radius: 8px;
			border: 1px solid #e0c679;
			padding: 20px;
			margin-bottom: 20px;
		}
		.btn {
			border-radius: 8px;
			min-width: 110px;
			padding: 10px 20px;
			font-weight: 500;
			margin: 5px;
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
			background-color: #7a9ba6;
			border-color: #6b8992;
			color: white;
		}
		.btn-info:hover {
			background-color: #6b8992;
		}
		.box-footer {
			text-align: center;
		}
	</style>
</head>
<body>

<section class="content">
	<div class="content-header">
		<h1>Hapus Tamu</h1>
	</div>

	<?php if(isset($_POST['tamu-del'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah sukses melakukan penghapusan data Tamu. <b><a href="?module=tamu/tamu-list">Kembali</a></b>
	</div>
	<?php } else { ?>
	<div class="box">
		<div class="alert alert-warning">
			<h4>Peringatan</h4>
			Apakah anda yakin untuk menghapus data tamu <b><?php echo $tamu_view['nama_depan'].' '.$tamu_view['nama_belakang']; ?></b>?<br/>
			<small>(Data yang sudah dihapus tidak dapat dikembalikan lagi)</small>
		</div>
		<div class="box-footer">
			<form action="" method="post" style="display:inline;">
				<input type="hidden" name="id_tamu" value="<?php echo $tamu_view['id_tamu']; ?>" />
				<button class="btn btn-success" type="submit" name="tamu-del">Ya! Hapus</button>
			</form>
			<a class="btn btn-info" href="?module=tamu/tamu-update&tamu=<?php echo $tamu_view['id_tamu']; ?>">Batal</a>
		</div>
	</div>
	<?php } ?>
</section>

</body>
</html>
