<?php include('component/com-tamu.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Guest Database</title>
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
			padding: 1px;
			background-color: #DFDAC8;
			min-height: 87vh;
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
			padding: 20px;
			box-shadow: 0 2px 6px rgba(0,0,0,0.05);
			border: 1px solid #c9c4b1;
		}
		.box-header {
			margin-bottom: 15px;
			text-align: right;
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
		.table {
			width: 100%;
			border-collapse: collapse;
			background-color: transparent;
		}
		.table thead {
			background-color: #c9c4b1;
			color: #333;
		}
		.table th, .table td {
			vertical-align: middle !important;
			padding: 12px 10px;
			color: #333;
			border-bottom: 1px solid #c1beae;
			background-color: transparent;
		}
		.table-striped > tbody > tr:nth-of-type(odd) {
			background-color: #f4f2ea;
		}
		.table-hover > tbody > tr:hover {
			background-color: #e6e2d2;
		}
		.table-scroll {
			max-height: 500px;
			overflow-y: auto;
			border-radius: 8px;
			border: 1px solid #c1beae;
		}
	</style>
</head>
<body>

<section class="content">
	<div class="content-header">
		<h1>Guest Database</h1>
	</div>

	<div class="box">
		<div class="box-header">
			<a class="btn btn-info" href="?module=tamu/tamu-add">Add New Guest</a>
		</div>
		
		<div class="box-body">
			<div class="table-scroll">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Guest Name</th>
							<th>Country</th>
							<th>Phone</th>
							<th>Email</th>
							<th style="width: 100px;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($tamu as $tamu) { ?>
						<tr>
							<td><?php echo $tamu['prefix'].'. '.$tamu['nama_depan'].'&nbsp;'.$tamu['nama_belakang']; ?></td>
							<td><?php echo $tamu['warga_negara']; ?></td>
							<td><?php echo $tamu['nomor_telp']; ?></td>
							<td><?php echo $tamu['email']; ?></td>
							<td>
								<a class="btn btn-xs btn-info" href="?module=tamu/tamu-update&tamu=<?php echo $tamu['id_tamu']; ?>">Update</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</section>

</body>
</html>
