<?php
include 'head_admin.php';
include 'config/config.php';


$result = tampilwarga();
?>
<script src="dist/sweet/sweetalert.min.js"></script>
<link rel="stylesheet" href="dist/sweet/sweetalert.css">
<link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.css">

<div class="content-wrapper">
	<!-- Content Header (Page header) -->


	<!-- Main content -->
	<section class="content">

		<h3>Tabel data Warga</h3>
		<div class="well">
			<table id="warga" class="table table-bordered">
				<thead>
					<tr>
						<th>Nomor</th>

						<th>Nama Lengkap</th>
						<th>Email</th>
						<th>Blok</th>
						<th>No Tlp</th>
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

							<td><?php echo  $a['nama_warga']; ?></td>
							<td><?php echo  $a['email']; ?></td>
							<td><?php echo  $a['alamat']; ?></td>
							<td><?php echo  $a['no_telp']; ?></td>
							<td><a href="hapuswarga.php?id=<?php echo  $a['id_warga']; ?>" class="btn btn-primary btn-danger delete-link"><span class="glyphicon glyphicon-remove"></span> Hapus</a></td>
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

<script>
	jQuery(document).ready(function($) {
		$('.delete-link').on('click', function() {
			var getLink = $(this).attr('href');
			swal({
				title: 'Hapus Data',
				text: 'Anda yakin ingin menghapus data ?',
				html: true,
				type: "warning",
				confirmButtonColor: '#d9534f',
				showCancelButton: true,
			}, function() {
				window.location.href = getLink
			});
			return false;
		});
	});
</script>

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