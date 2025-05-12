<?php

include('component/com-transaksi.php');

include('component/com-hitung-transaksi.php');

?>

<div class="row">
	<div class="col-sm-6">
		Costumer :
		<address>
			<strong><?php echo $transaksi_kamar['prefix'].'. '.$transaksi_kamar['nama_depan'].'&nbsp;'.$transaksi_kamar['nama_belakang']; ?></strong><br/>
			<?php echo $transaksi_kamar['alamat_jalan']; ?><br/>
			<?php echo $transaksi_kamar['alamat_kabupaten'].' - '.$transaksi_kamar['alamat_provinsi']; ?><br/>
			<br/>
			Nomor Telp : <?php echo $transaksi_kamar['nomor_telp']; ?><br/>
		</address>
	</div>
	<div class="col-sm-6">
		<b>Invoice Number : </b><br/>
		<span class="lead"><?php echo $transaksi_kamar['nomor_invoice']; ?></span><br/><br/>
		<b>Tanggal :</b><br/>
		<span class="lead"><?php echo date('d M Y'); ?></span>
	</div>
</div>

<h3>Detail</h3>
<table class="table table-bordered table-striped table-responsive">
	<thead>
		<tr>
			<th>Product / Services</th>
			<th>Harga</th>
			<th>Hari</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Tipe Kamar : <?php echo $transaksi_kamar['nama_kamar_tipe']; ?></td>
			<td>Rp <?php echo number_format($transaksi_kamar['harga_malam']); ?></td>
			<td><?php echo $durasi; ?> Malam</td>
			<td>Rp <?php echo number_format($transaksi_kamar['total_biaya_kamar']); ?></td>
		</tr>
		<?php foreach($transaksi_layanan as $transaksi_layanan) { ?>
		<tr>
			<td><?php echo $transaksi_layanan['nama_layanan']; ?></td>
			<td>Rp <?php echo number_format($transaksi_layanan['harga_layanan']); ?></td>
			<td><?php echo $transaksi_layanan['jumlah'].'&nbsp;'.$transaksi_layanan['satuan']; ?></td>
			<td>Rp <?php echo number_format($transaksi_layanan['total']); ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<div class="row">
	<div class="col-sm-6">
		<p class="text-muted well well-sm no-shadow">
			<b></b> Terimakasih Telah Datang ke Penginapan kami sampai jumpa di hari yang akan Datang
		</p>
	</div>
	<div class="col-sm-6">
		<table class="table table-bordered table-responsive">
			<tr>
				<td><b>Total Pembayaran</b></td>
				<td>Rp <?php echo number_format($subtotal); ?></td>
			</tr>
			<tr>
				
			</tr>
			<tr>
				
			</tr>
		</table>
	</div>
</div>
