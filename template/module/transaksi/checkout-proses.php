<?php
include('component/com-transaksi.php');
include('component/com-hitung-transaksi.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Checkout</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
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
			background-color: #D6D3C6 !important;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
		}

		.alert-success {
			background-color: #d4edda;
			border-color: #c3e6cb;
			color: #155724;
			border-radius: 10px;
		}

		.alert-info {
			background-color: #829983;
			border-color: #829983;
			color: #ffffff;
			border-radius: 10px;
			box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
		}

		.alert-info h4 {
			color: #ffffff;
			font-weight: bold;
			text-transform: uppercase;
		}

		.box-footer {
			text-align: center;
			padding-top: 30px;
			background: transparent;
			border-top: none;
		}

		.btn-custom {
			background-color: #829983;
			border-color: #6f846d;
			color: white;
			font-weight: bold;
			padding: 10px 25px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
			transition: background-color 0.3s ease;
			margin: 0 10px;
		}

		.btn-custom:hover {
			background-color: #6f846d;
			border-color: #5d705a;
		}
		.btn-print {
			background-color:rgb(79, 89, 221);
			border-color:rgb(145, 153, 168);
			color: white;
			font-weight: bold;
			padding: 10px 25px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
			margin: 0 10px;
		}
		.btn-invoice {
			background-color: #637165;
			border-color: #637165;
			color: white;
			font-weight: bold;
			padding: 10px 25px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
			margin: 0 10px;
		}

		.btn-invoice:hover {
			background-color: #566458;
			border-color: #566458;
		}

		.btn-cancel {
			background-color: #a89f91;
			border-color: #a89f91;
			color: white;
			font-weight: bold;
			padding: 10px 25px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
			margin: 0 10px;
		}

		.btn-cancel:hover {
			background-color: #978f84;
			border-color: #978f84;
		}
	</style>
</head>
<body>
<section class="content-header">
	<h1>Check Out</h1>
</section>

<section class="content">
	<div class="box">
		<?php if (isset($_POST['checkout'])) { ?>
			<div class="alert alert-success">
				<h4>Berhasil</h4>
				Sukses melakukan check-out pada kamar nomor : <?php echo $transaksi_kamar['nomor_kamar']; ?>. 
				<a href="?module=transaksi/checkout"><b>Kembali</b></a>
			</div>
		<?php } else { ?>
			<div class="box-header">
				<h3 class="box-title">Room Number : <b><?php echo $transaksi_kamar['nomor_kamar']; ?></b></h3>
			</div>
			<form action="" method="post">
				<div class="box-body">
					<div class="row">
						<div class="col-sm-3">						
							<div class="alert alert-info">
								<h4><?php echo $transaksi_kamar['nama_kamar_tipe']; ?></h4>
								<ul class="list-unstyled">
									<li>Harga / Malam : <b>Rp <?php echo number_format($transaksi_kamar['harga_malam']); ?></b></li>
									<li>Maximal Orang Dewasa : <b><?php echo $transaksi_kamar['max_dewasa']; ?> Orang</b></li>
									<li>Maximal Anak-anak : <b><?php echo $transaksi_kamar['max_anak']; ?> Orang</b></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label># INVOICE</label>
								<input class="form-control" name="nomor_invoice" value="<?php echo $transaksi_kamar['nomor_invoice']; ?>" readonly />
							</div>
							<div class="form-group">
								<label>Guest Name</label>
								<input class="form-control" value="<?php echo $transaksi_kamar['prefix'] . '. ' . $transaksi_kamar['nama_depan'] . '&nbsp;' . $transaksi_kamar['nama_belakang']; ?>" readonly />
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<label>Total Guest</label>
								<div class="row">
									<div class="col-sm-6">
										<input class="form-control" value="<?php echo $transaksi_kamar['jumlah_dewasa'] . ' Dewasa'; ?>" readonly />
									</div>
									<div class="col-sm-6">
										<input class="form-control" value="<?php echo $transaksi_kamar['jumlah_anak'] . ' Anak-anak'; ?>" readonly />
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Check-In Date</label>
								<div class="row">
									<div class="col-sm-6">
										<input class="form-control" value="<?php echo $transaksi_kamar['tanggal_checkin']; ?>" readonly />
									</div>
									<div class="col-sm-6">
										<input class="form-control" value="<?php echo $transaksi_kamar['waktu_checkin']; ?>" readonly />
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Check-Out Date</label>
								<div class="row">
									<div class="col-sm-6">
										<input id="checkout" class="form-control" name="tanggal_checkout" data-date-format="yyyy-mm-dd" value="<?php echo $transaksi_kamar['tanggal_checkout']; ?>" />
									</div>
									<div class="col-sm-6">
										<input class="form-control" name="waktu_checkout" value="<?php echo $transaksi_kamar['waktu_checkout']; ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>

					<h3>Detail Transaction</h3>
					<hr/>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Keterangan Layanan / Produk</th>
								<th>Rate</th>
								<th>Qty</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Room reserved type : <?php echo $transaksi_kamar['nama_kamar_tipe'] . ' ROOM'; ?></td>
								<td>Rp <?php echo number_format($transaksi_kamar['harga_malam']); ?></td>
								<td><?php echo $durasi . ' malam'; ?></td>
								<td>Rp <?php echo number_format($subtotal_kamar); ?></td>
							</tr>
							<?php foreach ($transaksi_layanan as $layanan) { ?>
								<tr>
									<td><?php echo $layanan['nama_layanan']; ?></td>
									<td>Rp <?php echo number_format($layanan['harga_layanan']); ?></td>
									<td><?php echo $layanan['jumlah'] . ' ' . $layanan['satuan']; ?></td>
									<td>Rp <?php echo number_format($layanan['total']); ?></td>
								</tr>
							<?php } ?>
							<tr>
								<td rowspan="4"></td>
								<td colspan="2"><b>Sub-Total</b></td>
								<td><b>Rp <?php echo number_format($subtotal); ?></b></td>
							</tr>
							<tr>
								<td colspan="2">PPn 10%</td>
								<td>Rp <?php echo number_format($ppn); ?></td>
							</tr>
							<tr>
								<td colspan="2">Total Deposit</td>
								<td class="text-red">Rp <?php echo number_format($transaksi_kamar['deposit']); ?></td>
							</tr>
							<tr>
								<td colspan="2"><b>Grand Total</b></td>
								<td><b>Rp <?php echo number_format($grand_total); ?></b></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="box-footer">
					<input type="hidden" name="id_kamar" value="<?php echo $transaksi_kamar['id_kamar']; ?>" />
					<input type="hidden" name="id_transaksi_kamar" value="<?php echo $transaksi_kamar['id_transaksi_kamar']; ?>" />
					<input type="hidden" name="jumlah_pembayaran" value="<?php echo $grand_total; ?>" />

					<button class="btn btn-custom" type="submit" name="checkout">Check Out</button>
					<a class="btn btn-print" href="?report=transaksi-tamu&transaksi=<?php echo $transaksi_kamar['id_transaksi_kamar']; ?>" target="_blank">Print </a>
					<a class="btn btn-cancel" href="?module=transaksi/checkin">Cancel</a>
				</div>
			</form>
		<?php } ?>
	</div>
</section>
</body>
</html>
