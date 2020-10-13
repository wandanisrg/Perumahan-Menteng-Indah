<?php
include 'head_admin.php';
include 'config/config.php';

$result = tampilmustahiq();
?>
<link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.css">
<div class="content-wrapper">


	<section class="content">
		<a href="tambah_data_mustahiq.php" name="simpan" class="btn btn-success">Tambah Data</a>
		<h3>Tabel data mustahiq</h3>
		<div class="well">
			<table id="warga" class="table table-bordered">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Nama penerima</th>
						<th>Nama yayasan</th>
						<th>Alamat</th>
						<th>Jumlah Zakat</th>
						<th>Tgl Penyaluran</th>
						<th>Nama Amil</th>
						<th>Edit</th>
						<th>Hapus</th>
					</tr>
				</thead>

				<tbody>
					<?php

					$no = 1;
					while ($a = mysqli_fetch_assoc($result)) {

					?>

						<tr>
							<td><?php echo  $no; ?></td>
							<td><?php echo  $a['nama_penerima']; ?></td>
							<td><?php echo  $a['nama_yayasan']; ?></td>
							<td><?php echo  $a['alamat']; ?></td>
							<td>Rp. <?php echo  rupiah($a['jumlah_zakat']); ?></td>
							<td><?php echo  $a['tgl_penyaluran']; ?></td>
							<td><?php echo  $a['nama_admin']; ?></td>
							<td><a href="edit_mustahiq.php?id=<?= $a['id_mustahiq']; ?>" class="btn btn-primary">Edit</td>
							<td><a href="hapus_mustahiq.php?id=<?= $a['id_mustahiq']; ?>" onclick="return confirm('Data akan dihapus ?')" name="simpan" class="btn btn-danger">Hapus</td>
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