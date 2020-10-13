<?php include 'head_admin.php';
include 'config/config.php';

$result = tampildatatransaksi();
$result2 = tampiljumlahtransaksiperid();
?>
<link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.css">

<div class="content-wrapper">
	<!-- Content Header (Page header) -->


	<!-- Main content -->
	<section class="content">

		<h3>Tabel data transaksi iuran</h3>
		<?php while ($d = mysqli_fetch_assoc($result2)) { ?>
			<h3>Total Pemasukan Iuran Rp. <?= rupiah($d['jumlah']); ?></h3>
		<?php } ?>
		<div class="well">
			<table id="warga" class="table table-bordered">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Nomor Transaksi</th>
						<th>Nama Warga</th>
						<th>Jenis Transaksi Iuran</th>
						<th>Tanggal Pembayaran</th>
						<th>Jumlah Pembayaran</th>
						<th>Status</th>
						<th>Konfirmasi Status Pembayaran</th>

					</tr>
				</thead>

				<tbody>
					<?php

					$no = 1;
					while ($a = mysqli_fetch_assoc($result)) {

					?>

						<tr>
							<td><?php echo  $no; ?></td>
							<td><?php echo  $a['no_transaksi']; ?></td>
							<td><?php echo  $a['nama_warga']; ?></td>
							<td><?php echo  $a['jenis_zakat']; ?></td>
							<td><?php echo  $a['tgl_bayar']; ?></td>
							<td>Rp. <?php echo  rupiah($a['jumlah_bayar']); ?></td>
							<td><?php if ($a['status'] == "1") {
									echo "<p class='btn btn-warning'>Menunggu Konfirmasi</p>";
								} elseif ($a['status'] == "2") {
									echo "<p class='btn btn-success'>Di Terima</a>";
								} else {
									echo "<p class='btn btn-danger'>Di Tolak</a>";
								} ?>
							</td>

							<td><a href="cek_transaksi.php?id=<?= $a['id_transaksi']; ?>" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-edit"></span> Konfirmasi</a></td>
						</tr>
					<?php
						$no++;
					}
					?>

				</tbody>
			</table>
		</div>


	</section>


</div>

<script src="media/js/jquery.dataTables.min.js"></script>
<script src="media/js/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function() {
		$('#warga').DataTable({
			responsive: true
		});
	});
</script>


<?php include 'foot_admin.php'; ?>