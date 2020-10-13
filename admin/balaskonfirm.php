<?php include 'head_admin.php';
include 'config/config.php';


if (empty($id = $_GET['id']) and empty($id_warga = $_GET['id_warga'])) {
  echo "id kosong";
} else {
  $result = tampilpesanperid($id);
}
if (isset($_POST['submit'])) {
  $balasan = $_POST['balas_pesan'];
  $status = $_POST['status'];

  if (updatepesan($id, $id_warga, $balasan, $status)) {
    echo "<script>alert('berhasil')</script>";
  } else {
    echo "<script>alert('gagal')</script>";
  }
}
?>
<link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.css">

<div class="content-wrapper">

  <section class="content">

    <form action="" method="post">
      <?php while ($a = mysqli_fetch_assoc($result)) { ?>

        <div class="form-group">
          <label>Nama Warga</label>
          <input readonly type="text" class="form-control" value="<?= $a['nama_warga']; ?>">
        </div>
        <div class="form-group">
          <label>Pesan</label>
          <textarea readonly class="form-control" rows="5" name="pesan"><?= $a['pesan']; ?></textarea>
        </div>
        <div class="form-group">
          <label>Balas Pesan</label>
          <textarea class="form-control" name="balas_pesan" rows="5"></textarea>
        </div>
        <div class="form-group">
          <select name="status" class="form-control">
            <option value="0">Jangan Tampilkan Pesan</option>
            <option value="1">Tampilkan Pesan</option>
          </select>
        </div>
      <?php } ?>
      <input type="submit" name="submit" class="btn btn-success" value="Balas Pesan">
      <a href="konfirmpesan.php" class="btn btn-primary">Kembali</a>

    </form>

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