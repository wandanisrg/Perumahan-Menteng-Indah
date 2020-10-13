<?php
include 'head_user.php';


if (empty($iduser = $_SESSION['iduser'])) { ?>
  <script>
    document.location.href = 'index.php';
  </script>
<?php } else {

  $nama_muzakki = $_SESSION['nama_muzakki'];
  $id_artikel = $_GET['id_artikel'];
  $result = tampilartikelperid($id_artikel);


  if (isset($_POST['simpan'])) {
    $id_komentar = $_POST['id_komentar'];
    $id_artikel = $_POST['id_artikel'];
    $nama_muzakki = $_POST['nama_muzakki'];

    if (simpankomentar($komentar, $idartikel, $namauser)) {
      echo "<script>alert('Komentar Anda Telah di Tambahkan')</script>";
    } else {
      echo "<script>alert('Komentar Anda Gagal di Tambahkan')</script>";
    }
  }

?>

  <script src="ckeditor/ckeditor.js"></script>


  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <h1><?= $row['judul_artikel']; ?></h1>
    <img width="40%" src="admin/<?php echo $row['gambar'] ?>">
    <p><?= $row['isi_artikel']; ?></p>

    <form action="" method="post">
      <textarea name="komentar" id="editor1" rows="5" cols="10">

            </textarea>
      <input type="hidden" name="id_artikel" value="<?php echo $idartikel = $row['id_artikel']; ?>">
      <input type="hidden" name="nama_muzakki" value="<?php echo $_SESSION['nama_muzakki']; ?>">
      <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
      </script>
      <br>
      <input type="submit" class="btn btn-success" name="simpan" value="Komentar" placeholder="">
    </form>

    <br>
    <?php
    $result2 = tampilkomentarperid($idartikel);
    while ($a = mysqli_fetch_assoc($result2)) { ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong><?= $a['nama_muzakki']; ?></strong>
        </div>
        <div class="panel-body">
          <?= $a['isi_komentar']; ?>
        </div><!-- /panel-body -->
      </div><!-- /panel panel-default -->

    <?php } ?>
  <?php } //end while result
  ?>

  <?php include 'sidebar.php'; ?>

  </div>
  </div>

<?php }
include 'foot_user.php'; ?>