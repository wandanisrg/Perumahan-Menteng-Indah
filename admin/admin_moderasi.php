<?php 
include 'head_admin.php';
function rupiah($angka){
$jadi =number_format($angka,0,',','.');
return $jadi;
} 
$result=tampiltransaksi_moderasi();
?>
<link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.css">
<div class="col-md-11">
<div class="row">

<table id="tabel" class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>No Transaksi</th>
			<th>Nama</th>
			<th>Jenis Transaksi</th>
			<th>Bukti Transfer</th>
			<th>Jumlah Bayar</th>
			<th>Status</th>
			<th>Ubah Status</th>
		</tr>
	</thead>

	<tbody>
		<?php $no=1; while ($row=mysqli_fetch_Assoc($result)) { ?>
		<tr>
			<td><?= $no;?></td>
			<td><?= $row['no_transaksi'];?></td>
			<td><?= $row['nama'];?></td>
			<td><?= $row['jenis_transaksi'];?></td>
			<td><?= $row['upload_transfer'];?></td>
			<td>Rp. <?= rupiah($row['jumlah_bayar']);?></td>
			<td><?= $row['status'];?></td>
			<td><a href="">Ubah Status</a></td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>

</div>
</div>

		<script src="media/js/jquery.dataTables.min.js"></script>
        <script src="media/js/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready( function () {
    			$('#tabel').DataTable();
			} );
        </script>



<?php include 'foot_admin.php'; ?>