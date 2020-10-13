<?php
include 'head_admin.php';
include 'config/config.php';

$id = $_GET['id'];
$result = tampiladminperid($id);

if (isset($_POST['simpan'])) {
	$id = $_GET['id'];
	$password = $_POST['password'];
	$password = sha1($password);
	$hidden = $_POST['hidden'];
	$passwordnew = $_POST['passwordnew'];
	$konfirmpassword = $_POST['konfirmpassword'];

	if ($password == $hidden) {

		if ($passwordnew == $konfirmpassword) {
			$passwordnew = sha1($passwordnew);

			if (editpassword($passwordnew, $id)) {
				echo "<script>alert('Berhasil')</script>";
				echo "<script>document.location.href='data_admin.php'</script>";
			} else {
				echo "<script>alert('Gagal')</script>";
				echo "Error Ganti" . mysqli_error($konek);
			}
		} else {
			echo "<script>alert('Konfirmasi Password Anda Salah')</script>";
		}
	} else {
		echo "<script>alert('Password Lama Anda Salah')</script>";
	}
}

?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->


	<!-- Main content -->


	<form action="" method="post">
		<?php while ($a = mysqli_fetch_assoc($result)) { ?>

			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="header">
							<h2>Ubah Password <?= $a['username'] ?></h2>
							<hr>
						</div>
						<div class="form-group">
							<label>Password Lama</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<input type="hidden" name="hidden" class="form-control" value="<?= $a['password'] ?>">
						</div>
						<div class="form-group">
							<label>Password Baru</label>
							<input type="password" name="passwordnew" class="form-control">
						</div>
						<div class="form-group">
							<label>Konfirmasi Password Baru</label>
							<input type="password" name="konfirmpassword" class="form-control">
						</div>

						<input type="submit" name="simpan" class="btn btn-success" value="Simpan Data">
						<a href="data_admin.php" class="btn btn-primary">Kembali</a>
					</div>
				</div>
			<?php } ?>
	</form>
</div>

<section class="content">
</section>


</div>




<?php include 'foot_admin.php'; ?>