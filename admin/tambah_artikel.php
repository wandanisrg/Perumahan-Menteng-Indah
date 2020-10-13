<?php 
include 'head_admin.php'; 
include 'config/config.php';
$result=tampilmustahiq();
$id_artikel=pengkodean("artikel","AR");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
<?php

  if(isset($_POST['submit'])){
  $id_artikel=$_POST['id_artikel'];
  $judul=$_POST['judul'];
  $artikel=$_POST['artikel'];
  $namaamil=$_POST['namaamil'];
  $namamustahiq=$_POST['mustahiq'];


  $nama   = $_FILES['gambar']['name'];
  $size   = $_FILES['gambar']['size'];
  $error  = $_FILES['gambar']['error'];
  $asal   = $_FILES['gambar']['tmp_name'];
  
  $lokasi="img/artikel/" . $nama;
  $format = pathinfo($nama, PATHINFO_EXTENSION);

  if($error === 0){

    if ($size > 9000){ 
    
          if($format === "jpg" || $format === "png" || $format === "JPG" || $format === "PNG" ){
            
            if(simpanartikel($id_artikel,$judul,$lokasi,$artikel,$namaamil,$namamustahiq)){
              echo "<script>alert('Artikel berhasil di simpan')</script>";
              echo "<script>location='dataartikel.php';</script>";
              }else{
                echo "Error: " . $query . "<br>" . mysqli_error($konek);
              } 
    
            move_uploaded_file($asal, "img/artikel/".$nama);
          }else{
            echo "Maaf format filenya harus jpg/png ";
          }
    
      }else{
        echo "file terlalu besar";
      }
  }else "Ada kesalahan saat upload";
}

 ?>
<script src="../ckeditor/ckeditor.js"></script>


<div class="container">
  <div class="row">
      <div class="col-md-8">
      <h1>Tambah Artikel</h1>
      <hr>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="hidden" name="id_artikel" value="<?php echo $id_artikel ?>">
            <label>Judul Artikel</label>
            <input type="text" name="judul" class="form-control" placeholder="Judul">
          </div>
          <div class="form-group">
            <label>Masukan Gambar</label>
            <input type="file" name="gambar">
          </div>

          <input type="hidden" name="namaamil" value="<?= $_SESSION['nama_admin'];?>">
          <div class="form-group">
          <label for="sel1">Pilih Mustahiq</label>
          <select name="mustahiq" class="form-control" id="sel1">
          <?php while ($row=mysqli_fetch_assoc($result)){?>
            <option value=<?= $row['nama_penerima'];?>><?= $row['nama_penerima'];?></option>
            <?php } ?>
          </select>
        </div>

          <div class="form-group">
          <label for="comment">Isi Artikel</label>
          <textarea name="artikel" id="editor1" rows="10" cols="50">
                
            </textarea>
        </div>
          <button type="submit" name="submit" class="btn btn-success">Simpan</button>
          <a href="dataartikel.php" class="btn btn-primary">Kembali</a>
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
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>