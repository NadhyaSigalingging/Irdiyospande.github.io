<?php
include('component/com-kamar.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Room Type</title>
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
		.box-header {
			margin-bottom: 15px;
		}
		.btn-info {
			background-color: #7e9e7e;
			border-color: #6b886b;
			border-radius: 8px;
			color: white;
			padding: 5px 15px;
		}
		.btn-info:hover {
			background-color: #6b886b;
			border-color: #5a745a;
		}
		.table > thead > tr > th {
			background-color: #c4c1b2;
			border: none;
			text-align: left;
		}
		.table > tbody > tr > td {
			vertical-align: middle;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>Room Type <span class="small"></span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<a class="btn btn-info" href="?module=kamar/tipe-add">Add Room Type</a>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Room Type</th>
						<th>Rate / Night</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($kamar_tipe as $kamar_tipe) { ?>
					<tr>
						<td><?php echo $kamar_tipe['nama_kamar_tipe']; ?></td>
						<td>Rp <?php echo number_format($kamar_tipe['harga_malam']); ?></td>
						<td>
							<a class="btn btn-info btn-xs" href="?module=kamar/tipe-update&kamar-tipe=<?php echo $kamar_tipe['id_kamar_tipe']; ?>">Update</a>
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
