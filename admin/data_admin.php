<?php
include 'head_admin.php';
include 'config/config.php';


$result = tampiladmin();

?>
<link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.css">

<div class="content-wrapper">

	<section class="content">
		<a href="tambah_data_admin.php" name="simpan" class="btn btn-success">Tambah Data</a>
		<h3>Tabel Data Admin</h3>
		<div class="well">
			<table id="muzakki" class="table table-bordered">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Edit</th>
						<th>Ubah Password</th>
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
							<td><?php echo  $a['nama_admin']; ?></td>
							<td><?php echo  $a['username']; ?></td>

							<td><a href="edit_admin.php?id=<?= $a['id_admin']; ?>" class="btn btn-primary">Edit</td>
							<td><a href="ubahpassword_admin.php?id=<?= $a['id_admin']; ?>" class="btn btn-warning">Ubah Password</td>
							<td><a href="hapus_admin.php?id=<?= $a['id_admin']; ?>" onclick="return confirm('Data akan dihapus ?')" class="btn btn-danger">Hapus</td>
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