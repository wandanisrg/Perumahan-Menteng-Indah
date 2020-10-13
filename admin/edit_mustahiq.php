<?php 
include 'head_admin.php';
include 'config/config.php'; 

$id = $_GET['id'];
$result=tampilmustahiqperid($id);

if(isset($_POST['simpan'])){
	$namapenerima=$_POST['nama'];
	$namayayasan=$_POST['yayasan'];
	$alamat=$_POST['alamat'];
	$jumlah=$_POST['jumlah'];
	$tgl=$_POST['tgl'];	
	$amil=$_POST['namaamil'];
	

		if(editdatamustahiq($namapenerima,$namayayasan,$alamat,$jumlah,$tgl,$amil,$id)){
			echo "<script>alert('Berhasil')</script>";
			echo "<script>document.location.href='data_mustahiq.php'</script>";
		}else{
			echo "<script>alert('Gagal')</script>";
		}
}

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->


<form action="" method="post">
<?php while ($a=mysqli_fetch_assoc($result)) { ?>
<div class="container">
<div class="row">
	<div class="col-md-5">
		<div class="header">
			<h1>Edit Data Mustahiq</h1>
			<hr>
		</div>
		  <div class="form-group">
		    <label >Nama Penerima</label>
		    <input type="text" name="nama" class="form-control" value="<?= $a['nama_penerima'] ?>">
		  </div>
		  <div class="form-group">
		    <label >Nama Yayasan</label>
		    <input type="text" name="yayasan" class="form-control" value="<?= $a['nama_yayasan'] ?>">
		  </div>

		  <div class="form-group">
		    <label >Alamat Penerima</label>
		    <textarea name="alamat" id="" class="form-control" cols="10" rows="3"><?= $a['alamat'] ?></textarea>
		  </div>

		  <div class="form-group">
		    <label >Jumlah Penyaluran Zakat</label>
		    <input type="number" name="jumlah" class="form-control" value="<?= $a['jumlah_zakat'] ?>">
		  </div>

		  <div class="form-group">
		    <label >Tanggal Penyaluran</label>
		    <input type="date" name="tgl" class="form-control" value="<?= $a['tgl_penyaluran'] ?>">
		  </div>

		  <div class="form-group">
		    <label >Nama Amil</label>
		    <input type="text" name="namaamil" class="form-control" value="<?= $a['nama_admin'] ?>">
		  </div>
		  <input type="submit" name="simpan" class="btn btn-success" value="Simpan Data">
		  <a href="data_mustahiq.php" class="btn btn-primary">Kembali</a>
	</div>
</div>
<?php } ?>
</form>
</div>

  <section class="content">
  </section>


</div>

       


<?php include 'foot_admin.php'; ?>