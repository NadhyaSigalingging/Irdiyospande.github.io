<?php
include('component/com-tamu.php');
include('component/com-kamar.php');
include('component/com-layanan.php');
include('component/com-transaksi.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Room Services - Add POS</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<style>
		html, body, .wrapper, .content-wrapper {
			background-color: #DFDAC8 !important;
		}

		.content {
			background-color: #DFDAC8;
			padding: 20px;
			border-radius: 10px;
		}

		.box {
			background-color: #D6D3C6;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
		}

		.box-header h3, h1 {
			color: #3b3b3b;
		}

		.btn-primary {
			background-color: #7e9e7e;
			border-color: #6b886b;
		}

		.btn-primary:hover {
			background-color: #6b886b;
			border-color: #5a745a;
		}

		.btn-success {
			background-color: #7e9e7e;
			border-color: #6b886b;
		}

		.btn-success:hover {
			background-color: #6b886b;
			border-color: #5a745a;
		}

		.btn-warning {
			background-color: #c5a76a;
			border-color: #b49557;
			color: #fff;
		}

		.btn-warning:hover {
			background-color: #b49557;
			color: #fff;
		}

		.table > thead > tr > th {
			background-color: #f3f1e9;
			color: #333;
		}

		.alert-success {
			background-color: #e0f2e0;
			border-color: #b5d6b5;
			color: #3c763d;
			border-radius: 8px;
		}

		.alert-warning {
			background-color: #fcf8e3;
			border-color: #faebcc;
			color: #8a6d3b;
			border-radius: 10px;
			padding: 20px;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>Room Services <span class="small">Add Point Of Sales</span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Room : 
				<b><?php echo $kamar_view['nomor_kamar']; ?></b> - 
				<b><?php echo $tamu_view['prefix'].'. '.$tamu_view['nama_depan'].' '.$tamu_view['nama_belakang']; ?></b>
			</h3>
			<a class="btn btn-warning pull-right" href="?module=transaksi/pesan-layanan">Cancel</a>
		</div>
		<div class="box-body">

			<?php if(!empty($_GET['layanan-filter'])) { ?>

				<?php if(isset($_POST['pesan-layanan'])) { ?>
				<div class="alert alert-success">
					<h4>Berhasil</h4>
					Anda berhasil menambah pesanan pada kamar <?php echo $kamar_view['nomor_kamar']; ?>. 
					<a href="?module=transaksi/pesan-layanan"><b>Kembali</b></a>
				</div>
				<?php } ?>

				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Product</th>
							<th>Price</th>
							<th class="col-sm-2">Total</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($layanan_filter as $layanan_filter) { ?>
						<form action="" method="post">
							<input type="hidden" name="id_transaksi_kamar" value="<?php echo $transaksi_kamar['id_transaksi_kamar']; ?>" />
							<input type="hidden" name="harga_layanan" value="<?php echo $layanan_filter['harga_layanan']; ?>" />
							<input type="hidden" name="id_layanan" value="<?php echo $layanan_filter['id_layanan']; ?>" />
							<tr>
								<td><?php echo $layanan_filter['nama_layanan']; ?></td>
								<td><?php echo 'Rp '.number_format($layanan_filter['harga_layanan']).' / '.$layanan_filter['satuan']; ?></td>
								<td>
									<div class="row">
										<div class="col-sm-6">
											<input class="form-control" name="jumlah" />
										</div>
										<div class="col-sm-6">
											<?php echo $layanan_filter['satuan']; ?>
										</div>
									</div>
								</td>
								<td>
									<button class="btn btn-xs btn-success" type="submit" name="pesan-layanan">Order</button>
								</td>
							</tr>
						</form>
						<?php } ?>
					</tbody>
				</table>

			<?php } else { ?>
			
			<!-- Pilih Kategori Layanan -->
			<div class="row">
				<?php foreach($layanan_kategori as $layanan_kategori) { ?>
				<div class="col-sm-3">
					<a class="btn btn-lg btn-block btn-primary" href="<?php echo $url; ?>&layanan-filter=<?php echo $layanan_kategori['id_layanan_kategori']; ?>">
						<?php echo $layanan_kategori['nama_layanan_kategori']; ?>
					</a>
				</div>
				<?php } ?>
			</div>

			<?php } ?>

		</div>
	</div>
</section>

</body>
</html>
