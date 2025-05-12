<?php 
include('component/com-kamar.php');
include('component/com-tamu.php');
include('component/com-transaksi.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Check In</title>
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
			background-color: #D6D3C6;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.05);
		}

		.alert-success {
			background-color: #d0e9c6;
			border-color: #b2dba1;
			color: #3c763d;
			border-radius: 10px;
			padding: 20px;
		}

		.alert-info {
			background-color: #d9edf7;
			border-color: #bce8f1;
			color: #31708f;
			border-radius: 10px;
			padding: 15px;
		}

		.well {
			background-color: #f5f5f5;
			border-radius: 8px;
			padding: 15px;
			border: 1px solid #e3e3e3;
		}

		.form-control {
			border-radius: 6px;
		}

		.btn-success {
			background-color: #7e9e7e;
			border-color: #6b886b;
			font-weight: bold;
			color: #fff;
			border-radius: 6px;
		}

		.btn-success:hover {
			background-color: #6b886b;
			border-color: #5a745a;
		}

		.btn-warning {
			background-color: #c5a76e;
			border-color: #b2955f;
			color: #fff;
			font-weight: bold;
			border-radius: 6px;
		}

		.btn-warning:hover {
			background-color: #b2955f;
		}

		h1, .box-title {
			color: #3b3b3b;
		}
	</style>
</head>
<body>

<section class="content-header">
	<h1>Check In <span class="small">Input data tamu</span></h1>
</section>

<section class="content">
	<div class="box">
		<?php if(isset($_POST['checkin-update'])) { ?>
		<div class="alert alert-success">
			<h4>Berhasil</h4>
			Sukses melakukan check-in pada kamar nomor : <?php echo $kamar_view['nomor_kamar']; ?>. 
			<a href="?module=transaksi/checkin-list"><b>Kembali</b></a>
		</div>
		<?php } else { ?>
		<div class="box-header">
			<h3 class="box-title">KAMAR NOMOR : <b><?php echo $kamar_view['nomor_kamar']; ?></b></h3>
		</div>
		<form action="" method="post">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label># INVOICE</label>
							<input class="form-control" name="nomor_invoice" value="<?php echo $transaksi_kamar['nomor_invoice']; ?>" />
						</div>
						<div class="alert alert-info">
							<h4><?php echo $kamar_view['nama_kamar_tipe']; ?></h4>
							<ul class="list-unstyled">
								<li>Harga / Malam : <b>Rp <?php echo number_format($kamar_view['harga_malam']); ?></b></li>
								<li>Maximal Orang Dewasa : <b><?php echo $kamar_view['max_dewasa']; ?> Orang</b></li>
								<li>Maximal Anak-anak : <b><?php echo $kamar_view['max_anak']; ?> Orang</b></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Nama Tamu</label>
							<input class="form-control" value="<?php echo $transaksi_kamar['prefix'].'. '.$transaksi_kamar['nama_depan'].'&nbsp;'.$transaksi_kamar['nama_belakang']; ?>" readonly />
							<select class="form-control nama_tamu" name="id_tamu">
								<option selected="selected" value="<?php echo $transaksi_kamar['id_tamu']; ?>">--Pilih--</option>
								<?php foreach($tamu as $tamu_item) { ?>
								<option value="<?php echo $tamu_item['id_tamu']; ?>">
									<?php echo $tamu_item['prefix'].'. '.$tamu_item['nama_depan'].'&nbsp;'.$tamu_item['nama_belakang']; ?>
								</option>
								<?php } ?>
							</select>
						</div>
						<div class="well">
							<a href="?module=tamu/tamu-add"><b>Klik disini</b></a> jika nama tamu yang dimaksud tidak ditemukan untuk ditambah pada daftar buku tamu.
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>Jumlah Tamu</label>
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" value="<?php echo $transaksi_kamar['jumlah_dewasa'].' Orang Dewasa'; ?>" readonly />
									<select class="form-control" name="jumlah_dewasa">
										<option value="<?php echo $transaksi_kamar['jumlah_dewasa']; ?>">- Dewasa -</option>
										<?php for ($i = 1; $i <= 5; $i++) { ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?> Orang</option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-6">
									<input class="form-control" value="<?php echo $transaksi_kamar['jumlah_anak'].' Anak-anak'; ?>" readonly />
									<select class="form-control" name="jumlah_anak">
										<option value="<?php echo $transaksi_kamar['jumlah_anak']; ?>">- Anak-anak -</option>
										<?php for ($i = 1; $i <= 5; $i++) { ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?> Orang</option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal / Waktu Check-In</label>
							<div class="row">
								<div class="col-sm-6">
									<input id="checkin" class="form-control" name="tanggal_checkin" value="<?php echo $transaksi_kamar['tanggal_checkin']; ?>" />
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="waktu_checkin" value="<?php echo $transaksi_kamar['waktu_checkin']; ?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal / Waktu Check-Out</label>
							<div class="row">
								<div class="col-sm-6">
									<input id="checkout" class="form-control" name="tanggal_checkout" value="<?php echo $transaksi_kamar['tanggal_checkout']; ?>" />
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="waktu_checkout" value="<?php echo $transaksi_kamar['waktu_checkout']; ?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Jumlah Deposit (Rp)</label>
							<input class="form-control" name="deposit" value="<?php echo $transaksi_kamar['deposit']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer"style="text-align: center;background: #D6D3C6">
				<input type="hidden" name="id_kamar" value="<?php echo $transaksi_kamar['id_kamar']; ?>" />
				<input type="hidden" name="id_transaksi_kamar" value="<?php echo $transaksi_kamar['id_transaksi_kamar']; ?>" />
				<button class="btn btn-success" type="submit" name="checkin-update">Ubah Data</button>
				<a class="btn btn-warning" href="?module=transaksi/checkin-list">Batal</a>
			</div>
		</form>
		<?php } ?>
	</div>
</section>

</body>
</html>
