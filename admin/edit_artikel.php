<?php
include 'head_admin.php';
include 'config/config.php';


$result = tampilmustahiq();
$id = $_GET['id'];
$result2 = tampilartikellperid($id);

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <?php

    if (isset($_POST['submit'])) {

      $id = $_GET['id'];
      $judul = $_POST['judul'];
      $artikel = $_POST['artikel'];

      $nama   = $_FILES['gambar']['name'];
      $size   = $_FILES['gambar']['size'];
      $error  = $_FILES['gambar']['error'];
      $asal   = $_FILES['gambar']['tmp_name'];

      $lokasi = "../img/artikel/" . $nama;
      $format = pathinfo($nama, PATHINFO_EXTENSION);

      if ($error === 0) {

        if ($size > 9000) {

          if ($format === "jpg" || $format === "png" || $format === "JPG" || $format === "PNG") {

            if (updateartikel($id, $judul, $lokasi, $artikel, $namaamil, $namamustahiq)) {
              echo "<script>alert('Artikel berhasil di update')</script>";
              echo "<script>window.location.href='dataartikel.php'</script>";
            } else {
              echo "<script>alert('Artikel GAGAl di update')</script>";
              echo "Error Koneksi:" . mysqli_error($konek);
            }

            move_uploaded_file($asal, "../img/artikel/" . $nama);
          } else {
            echo "Maaf format filenya harus jpg/png ";
          }
        } else {
          echo "file terlalu besar";
        }
      } else "Ada kesalahan saat upload";
    }

    ?>
    <script src="../ckeditor/ckeditor.js"></script>


    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h1>Edit Artikel</h1>
          <hr>
          <form action="" method="POST" enctype="multipart/form-data">
            <?php while ($a = mysqli_fetch_assoc($result2)) { ?>

              <div class="form-group">
                <label>Judul Artikel</label>

                <input type="hidden" name="id_artikel" class="form-control" value="<?= $a['id_artikel'] ?>">
                <input type="text" name="judul" class="form-control" value="<?= $a['judul_artikel'] ?>">
              </div>
              <div class="form-group">
                <label>Masukan Gambar</label>
                <input type="file" name="gambar">
              </div>


              <div class="form-group">
                <label for="comment">Isi Artikel</label>
                <textarea name="artikel" id="editor1" rows="10" cols="50">
                <?= $a['isi_artikel'] ?>
          </textarea>
              <?php } ?>
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
  CKEDITOR.replace('editor1');
</script>