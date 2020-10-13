<?php 
include 'head_admin.php'; 
include 'config/config.php';
$result=tampilmustahiq();
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
<?php

  if(isset($_POST['submit'])){

  $link=$_POST['link'];
  $ket=$_POST['ket'];


  $nama   = $_FILES['gambar']['name'];
  $size   = $_FILES['gambar']['size'];
  $error  = $_FILES['gambar']['error'];
  $asal   = $_FILES['gambar']['tmp_name'];
  
  $lokasi="img/banner/" . $nama;
  $format = pathinfo($nama, PATHINFO_EXTENSION);

  if($error === 0){

    if ($size < 612000){ 
    
          if($format === "jpg" || $format === "png" || $format === "JPG" || $format === "PNG" ){
            
            if(simpanbanner($link,$ket,$lokasi)){
              echo "<script>alert('Banner berhasil di simpan')</script>";
              echo "<script>location='index.php';</script>";
              }else{
                echo "Error: " . $query . "<br>" . mysqli_error($konek);
              } 
    
            move_uploaded_file($asal, "img/banner/".$nama);
          }else{
            echo "Maaf format filenya harus jpg/png ";
          }
    
      }else{
        echo "file melebihi batas 600 kb";
      }
  }else "Ada kesalahan saat upload";
}

 ?>



<div class="container">
  <div class="row">
      <div class="col-md-8">
      <h1>Tambah Banner</h1>
      <hr>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Banner</label>
            <input type="file" name="gambar">
        </div>
        <div class="form-group">
            <label>Link</label>
            <input type="text" name="link" class="form-control">
        </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="ket" class="form-control">
          </div>

          <button type="submit" name="submit" class="btn btn-success">Simpan</button>
          <a href="index.php" class="btn btn-primary">Kembali</a>
      </form>
      </div>

    <div class="col-md-4">

    </div>
  </div>
</div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
