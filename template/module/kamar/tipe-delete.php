<?php
include('component/com-kamar.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Hapus Tipe Kamar</title>
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
		.alert {
			border-radius: 12px;
			padding: 20px;
			background-color: #D6D3C6;
			color: #333;
			border: none;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
		}
		.alert h4 {
			color: #3b3b3b;
			margin-bottom: 15px;
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
		.btn-info {
			border-radius: 8px;
			color: white;
			background-color: #6c8c8c;
			border-color: #5c7a7a;
		}
		.btn-info:hover {
			background-color: #5c7a7a;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>Hapus Tipe Kamar</h1>
</section>

<section class="content">
	<?php if(isset($_POST['kamartipe-del'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah sukses melakukan penghapusan data kamar. <b><a href="?module=kamar/tipe-list">Kembali</a></b>
	</div>
	<?php } else { ?>
	<div class="alert alert-warning">
		<h4>Peringatan</h4>
		Apakah Anda yakin ingin menghapus tipe kamar <b><?php echo $kamar_tipe_view['nama_kamar_tipe']; ?></b>?<br/>
		(Data yang sudah dihapus tidak dapat dikembalikan lagi.)
		<br/><br/>
		<form action="" method="post">
			<input type="hidden" name="id_kamar_tipe" value="<?php echo $kamar_tipe_view['id_kamar_tipe']; ?>" />
			<button class="btn btn-success" type="submit" name="kamartipe-del">Ya! Hapus</button>
			<a class="btn btn-info" href="?module=kamar/tipe-update&kamar-tipe=<?php echo $kamar_tipe_view['id_kamar_tipe']; ?>">Batal</a>
		</form>
	</div>
	<?php } ?>
</section>

</body>
</html>
