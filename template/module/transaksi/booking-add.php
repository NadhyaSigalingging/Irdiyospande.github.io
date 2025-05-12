<?php 
include('component/com-kamar.php');
include('component/com-tamu.php');
include('component/com-transaksi.php');

$nomor_invoice = 'INV-' . date('Ymd') . '-' . (rand(10, 100));

if (isset($_POST['reservasi'])) {

    $tanggal_checkin = date_create($_POST['tanggal_checkin']);
    $tanggal_checkout = date_create($_POST['tanggal_checkout']);
    $durasi = date_diff($tanggal_checkin, $tanggal_checkout)->format('%a');

    // Ambil semua data yang dibutuhkan dari kamar dan tipe kamar
    $kamar_view = $database->get('kamar', [
        '[><]kamar_tipe' => 'id_kamar_tipe'
    ], [
        'kamar.id_kamar',
        'kamar.nomor_kamar',
        'kamar_tipe.nama_kamar_tipe',
        'kamar_tipe.harga_malam',
        'kamar_tipe.max_dewasa',
        'kamar_tipe.max_anak'
    ], [
        'kamar.id_kamar' => $_POST['id_kamar']
    ]);

    $total_biaya_kamar = $durasi * $kamar_view['harga_malam'];

    $database->insert('transaksi_kamar', [
        'id_user' => $_SESSION['id_user'],
        'nomor_invoice' => $_POST['nomor_invoice'],
        'tanggal' => date('Y-m-d'),
        'id_tamu' => $_POST['id_tamu'],
        'id_kamar' => $_POST['id_kamar'],
        'jumlah_dewasa' => $_POST['jumlah_dewasa'],
        'jumlah_anak' => $_POST['jumlah_anak'],
        'tanggal_checkin' => $_POST['tanggal_checkin'],
        'waktu_checkin' => $_POST['waktu_checkin'],
        'tanggal_checkout' => $_POST['tanggal_checkout'],
        'waktu_checkout' => $_POST['waktu_checkout'],
        'deposit' => $_POST['deposit'],
        'total_biaya_kamar' => $total_biaya_kamar,
        'status' => 'RESERVASI'
    ]); 
}
 $database->update('kamar', [
    'status_kamar' => 'RESERVASI'
], [
    'kamar.id_kamar' => $_POST['id_kamar']
]);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Booking | Hotel Management System</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
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
		.box-header h3 {
			font-weight: bold;
		}
		.alert-success, .alert-info, .well {
			border-radius: 10px;
		}
		.alert-success {
			background-color: #d4edda;
			border-color: #c3e6cb;
			color: #155724;
		}
		.alert-info {
			background-color: #3f8acb;
			border-color: #3f8acb;
			color: #ffffff;
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
			background-color: #3f8acb;
			border-color: #3477b6;
			color: white;
			font-weight: bold;
			padding: 10px 25px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
			transition: background-color 0.3s ease;
			margin: 0 10px;
		}
		.btn-custom:hover {
			background-color: #3477b6;
		}
		.btn-cancel {
			background-color: #a89f91;
			border-color: #a89f91;
			color: white;
			font-weight: bold;
			padding: 10px 25px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
			transition: background-color 0.3s ease;
			margin: 0 10px;
		}
		.btn-cancel:hover {
			background-color: #978f84;
		}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<section class="content-header">
		<h1>Booking <span class="small">Detail Booking Kamar</span></h1>
	</section>

	<section class="content">
		<div class="box">
			<?php if (isset($_POST['booking'])) { ?>
				<div class="alert alert-success">
					<h4>Berhasil</h4>
					Sukses melakukan booking kamar nomor: <?php echo $kamar_view['nomor_kamar']; ?>. 
					<a href="?module=reservasi/add-reservasi"><b>Kembali</b></a>
				</div>
			<?php } else { ?>
			<div class="box-header">
				<h3 class="box-title">Room Number & Type: <b><?php echo $kamar_view['nomor_kamar']; ?></b></h3>
			</div>
			<form action="" method="post">
				<div class="box-body">
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label># INVOICE</label>
								<input class="form-control" name="nomor_invoice" value="<?php echo $nomor_invoice; ?>" readonly />
							</div>
							<div class="alert alert-info">
								<h4><?php echo $kamar_view['nama_kamar_tipe']; ?></h4>
								<ul class="list-unstyled">
									<li>Room Rate: <b>Rp <?php echo number_format($kamar_view['harga_malam']); ?></b></li>
									<li>Maximal Adult: <b><?php echo $kamar_view['max_dewasa']; ?> Orang</b></li>
									<li>Maximal Children: <b><?php echo $kamar_view['max_anak']; ?> Orang</b></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Guest Name</label>
								<select class="form-control" name="id_tamu" required>
									<option selected="selected">--Pilih--</option>
									<?php foreach ($tamu as $t) { ?>
									<option value="<?php echo $t['id_tamu']; ?>">
										<?php echo $t['prefix'].'. '.$t['nama_depan'].' '.$t['nama_belakang']; ?>
									</option>
									<?php } ?>
								</select>
							</div>
							<div class="well">
								<a href="?module=tamu/tamu-add"><b>Klik disini</b></a> jika nama tamu belum terdaftar.
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<label>Total Guest</label>
								<div class="row">
									<div class="col-sm-6">
										<select class="form-control" name="jumlah_dewasa">
											<option value="0">- Dewasa -</option>
											<?php for ($i=1; $i<=5; $i++) echo "<option value='$i'>$i Orang</option>"; ?>
										</select>
									</div>
									<div class="col-sm-6">
										<select class="form-control" name="jumlah_anak">
											<option value="0">- Anak-anak -</option>
											<?php for ($i=1; $i<=5; $i++) echo "<option value='$i'>$i Orang</option>"; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Check-In Date</label>
								<div class="row">
									<div class="col-sm-6">
                                    <input class="form-control" type="date" name="tanggal_checkin" value="<?php echo date('Y-m-d'); ?>" required />

									</div>
									<div class="col-sm-6">
                                    <input class="form-control" type="time" name="waktu_checkin" value="<?php echo date('H:i'); ?>" required />

									</div>
								</div>
                                <div class="form-group">
								<label>Check-out Date</label>
								<div class="row">
									<div class="col-sm-6">
                                    <input class="form-control" type="date" name="tanggal_checkout" value="<?php echo date('Y-m-d'); ?>" required />

									</div>
									<div class="col-sm-6">
                                    <input class="form-control" type="time" name="waktu_checkout" value="<?php echo date('H:i'); ?>" required />

									</div>
								</div>
							<br>
							<div class="form-group">
								<label>Deposit (Rp)</label>
								<input class="form-control" type="number" name="deposit" min="0" step="1000" placeholder="Masukkan deposit (opsional)" />


							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<input type="hidden" name="id_kamar" value="<?php echo $kamar_view['id_kamar']; ?>" />
					<a class="btn btn-cancel" href="?module=reservasi/add-reservasi">Batal</a>
					<button class="btn btn-custom" type="submit" name="reservasi">Reservasi</button>
				</div>
			</form>
			<?php } ?>
		</div>
	</section>
</div>

<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/dist/js/app.min.js"></script>
</body>
</html>