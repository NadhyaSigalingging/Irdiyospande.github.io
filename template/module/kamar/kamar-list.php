<?php
include('component/com-kamar.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>All Room</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<style>
		html, body, .wrapper, .content-wrapper {
			background-color: #DFDAC8 !important;
		}

		.content {
			background-color: #DFDAC8;
			padding: 4px;
			border-radius: 10px;
		}

		.box {
			background-color: #D6D3C6;
			padding: 20px;
			border-radius: 12px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
		}

		.btn-info {
			background-color: #7e9e7e;
			border-color: #6b886b;
			border-radius: 8px;
		}

		.btn-info:hover {
			background-color: #6b886b;
			border-color: #5a745a;
		}

		.table > tbody > tr > td {
			vertical-align: middle;
		}

		.badge {
			padding: 6px 12px;
			border-radius: 20px;
			font-size: 13px;
			text-transform: uppercase;
			color: #fff;
		}

		.bg-green { background-color: #5cb85c; }
		.bg-red { background-color: #d9534f; }
		.bg-yellow { background-color: #f0ad4e; }

		h1 {
			color: #3b3b3b;
		}

		.table-scroll {
			max-height: 500px;
			overflow-y: auto;
			border-radius: 8px;
			border: 1px solid #ccc;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>All Room <span class="small">Detail Room</span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<a class="btn btn-info" href="?module=kamar/kamar-add">Add Room</a>
		</div>

		<div class="box-body">
			<div class="table-scroll">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Room</th>
							<th>Room Type</th>
							<th>Rate / Night</th>
							<th>Max. Adult</th>
							<th>Max. Children</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($kamar as $kamar) { ?>
						<tr>
							<td><?php echo $kamar['nomor_kamar']; ?></td>
							<td><?php echo $kamar['nama_kamar_tipe']; ?></td>
							<td>Rp <?php echo number_format($kamar['harga_malam']); ?></td>
							<td><?php echo $kamar['max_dewasa']; ?> Orang</td>
							<td><?php echo $kamar['max_anak']; ?> Orang</td>
							<td>
								<a href="?module=kamar/kamar-update&kamar=<?php echo $kamar['id_kamar']; ?>" class="btn btn-xs btn-info">Update</a>
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
