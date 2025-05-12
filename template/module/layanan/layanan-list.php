<?php
include('component/com-layanan.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Layanan Tambahan</title>
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
			background-color: #DFDAC8;
			padding: 20px;
			border-radius: 12px;
			box-shadow: 0 2px 6px rgba(0,0,0,0.05);
			border: 1px solid #c9c4b1;
		}
		.box-header {
			margin-bottom: 15px;
		}
		.btn {
			border-radius: 8px;
			min-width: 90px;
		}
		.btn-info {
			background-color: #6c8c8c;
			border-color: #5c7a7a;
			color: white;
		}
		.btn-info:hover {
			background-color: #5c7a7a;
		}
		table {
			background-color: transparent;
			color: #333;
		}
		table th, table td {
			vertical-align: middle !important;
			padding: 12px 10px;
		}
		.table-striped > tbody > tr:nth-of-type(odd) {
			background-color: #f4f2ea;
		}
		.table-hover > tbody > tr:hover {
			background-color: #e6e2d2;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>Layanan Tambahan</h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<a class="btn btn-info" href="?module=layanan/layanan-add">Tambah Layanan</a>
		</div>
		<div class="box-body">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Layanan</th>
						<th>Kategori</th>
						<th>Harga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($layanan as $layanan) { ?>
					<tr>
						<td><?php echo $layanan['nama_layanan']; ?></td>
						<td><?php echo $layanan['nama_layanan_kategori']; ?></td>
						<td>Rp <?php echo number_format($layanan['harga_layanan']) . ' / ' . $layanan['satuan']; ?></td>
						<td>
							<a class="btn btn-xs btn-info" href="?module=layanan/layanan-update&layanan=<?php echo $layanan['id_layanan']; ?>">Update</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

</body>
</html>
