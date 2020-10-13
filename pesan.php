<?php
include 'head_user.php';
if (empty($_SESSION['id_warga'])) { ?>
	<script>
		document.location.href = 'index.php';
	</script>
<?php } else {
	unset($_SESSION['a']);
	$id = $_SESSION['id_warga'];

	$result = tampilkonfirmasi($id);


	// $data=$konek->query("SELECT *FROM pesan WHERE id_muzakki='' ")
	if (isset($_POST['submit'])) {
		global $konek;
		$confirm = mysqli_real_escape_string($konek, $_POST['konfirm']);
		$nama = $_SESSION['nama_warga'];
		$id_warga = $_POST['id_warga'];
		$status = "0";
		$simpan = $konek->query("INSERT INTO `iuran`.`pesan` (
  `id_pesan`,
  `id_warga`,
  `nama_warga`,
  `pesan`,
  `balasan`,
  `status`
)
VALUES
  (
    null,
    '$id_warga',
    '$nama',
    '$confirm',
    '$balasan',
    '$status'
  );

");
		if ($simpan) {
			echo "<script>alert('pesan dikirim')</script>";
		} else {
			echo "gagal";
		}
	}



?>

	<style>
		.well {
			background-color: white;
		}
	</style>

	<div class=container>

		<div class="row">
			<div class="col-md-9">
				<div class="form-group">
					<div class="panel panel-default">
						<div class="panel-heading">Pesan Anda</div>
						<div class="panel-body">
							<form action="" method="post">
								<input type="text" name="id_warga" value="<?php echo $id ?>">
								<textarea class="form-control" rows="5" name="konfirm" required></textarea>
								<br>
								<input type="submit" name="submit" class="btn btn-block btn-info" value="Kirim Pesan">
							</form>
						</div>
					</div>
				</div>

				<div class="row">
					<?php while ($row = mysqli_fetch_assoc($result)) { ?>
						<div class="col-md-12">
							<div class="well">
								<div class="form-group">

									<p><i><?php echo $row['pesan']; ?></i></p>
									<hr>
									<b>Jawab Admin : </b>
									<p><?php echo $row['balasan']; ?></p>


								</div>
							</div>
						</div>
					<?php } ?>

				</div>

			</div>

		</div>
	</div>

	<?php include 'sidebar.php' ?>
	</div>

<?php }
include 'foot_user.php'; ?>