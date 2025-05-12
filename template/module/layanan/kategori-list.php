<?php include('component/com-layanan.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Category Point Of Sales</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<style>
		html, body {
			background-color: #DFDAC8;
			font-family: 'Segoe UI', sans-serif;
		}
		.content-header h1 {
			color: #3b3b3b;
			margin: 20px;
		}
		.content {
			padding: 20px;
			background-color: #DFDAC8;
		}
		.box {
			background-color: #D6D3C6;
			border-radius: 12px;
			padding: 20px;
			box-shadow: 0 2px 6px rgba(0,0,0,0.05);
			margin-bottom: 20px;
			border: 1px solid #c9c4b1;
		}
		.box-title {
			color: #4b4b4b;
			font-weight: bold;
			margin-bottom: 10px;
		}
		.btn {
			border-radius: 8px;
			min-width: 90px;
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
		}
		.btn-info:hover {
			background-color: #5c7a7a;
		}
		.alert {
			border-radius: 10px;
			padding: 20px;
			margin-bottom: 20px;
			background-color: #f2f0e6;
			border: 1px solid #d4d1c0;
		}
		textarea.form-control, input.form-control {
			background-color: #f5f3e8;
			border-color: #c9c4b1;
			color: #3b3b3b;
		}
		textarea.form-control:focus, input.form-control:focus {
			background-color: #f9f8f1;
			border-color: #7e9e7e;
			box-shadow: none;
		}
		.table {
			background-color: #f5f3e8;
			border-radius: 8px;
			overflow: hidden;
		}
		.table th, .table td {
			vertical-align: middle !important;
			padding: 12px 10px;
			background-color: #f8f7f1 !important;
			border-color: #e0ddcd;
		}
		.table-striped > tbody > tr:nth-of-type(odd) {
			background-color: #f0ede0 !important;
		}
		.table-hover > tbody > tr:hover {
			background-color: #e4e0d2 !important;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>Category Point Of Sales</h1>
</section>

<section class="content">
	<?php if(isset($_POST['layanankat-add'])) { ?>
		<div class="alert alert-success">
			<h4>Berhasil</h4>
			Anda telah berhasil menambah data kategori layanan.
			<br/><br/>
			<a class="btn btn-info" href="?module=layanan/kategori-list">Back</a>
		</div>
	<?php } else { ?>
	<div class="row">
		<div class="col-sm-4">
			<div class="box">
				<form action="" method="post">
					<div class="box-header">
						<h3 class="box-title">Add Category</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Name Category</label>
							<input class="form-control" name="nama_layanan_kategori" required />
						</div>
						<div class="form-group">
							<label>Detail</label>
							<textarea class="form-control" name="keterangan" rows="3"></textarea>
						</div>
					</div>
					<div class="box-footer">
						<button class="btn btn-success" type="submit" name="layanankat-add">Add</button>
						<button class="btn btn-warning" type="reset">Cancel</button>
					</div>
				</form>
			</div>
		</div>

		<div class="col-sm-8">
			<div class="box">
				<?php if(!empty($_GET['layanan-kategori'])) { ?>
					<?php if(isset($_POST['layanankat-update'])) { ?>
						<div class="alert alert-success">
							<h4>Berhasil</h4>
							Anda telah berhasil mengubah data kategori.
							<br/><br/>
							<a class="btn btn-info" href="?module=layanan/kategori-list">Back</a>
						</div>
					<?php } else { ?>
					<form action="" method="post">
						<div class="box-header">
							<h3 class="box-title">Edit Category</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Name Category</label>
								<input class="form-control" name="nama_layanan_kategori" value="<?php echo $layanan_kategori_view['nama_layanan_kategori']; ?>" />
							</div>
							<div class="form-group">
								<label>Detail</label>
								<textarea class="form-control" name="keterangan" rows="3"><?php echo $layanan_kategori_view['keterangan']; ?></textarea>
							</div>
						</div>
						<div class="box-footer">
							<input type="hidden" name="id_layanan_kategori" value="<?php echo $layanan_kategori_view['id_layanan_kategori']; ?>" />
							<button class="btn btn-success" type="submit" name="layanankat-update">Update</button>
							<a class="btn btn-danger" href="?module=layanan/kategori-delete&layanan-kategori=<?php echo $layanan_kategori_view['id_layanan_kategori']; ?>">Delete</a>
							<a class="btn btn-warning" href="?module=layanan/kategori-list">Cancel</a>
						</div>
					</form>
					<?php } ?>
				<?php } else { ?>
				<div class="box-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Name Category</th>
								<th>Detail</th>
								<th style="width: 100px;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($layanan_kategori as $layanan_kategori) { ?>
							<tr>
								<td><?php echo $layanan_kategori['nama_layanan_kategori']; ?></td>
								<td><?php echo $layanan_kategori['keterangan']; ?></td>
								<td>
									<a class="btn btn-xs btn-info" href="?module=layanan/kategori-list&layanan-kategori=<?php echo $layanan_kategori['id_layanan_kategori']; ?>">Update</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
</section>

</body>
</html>
