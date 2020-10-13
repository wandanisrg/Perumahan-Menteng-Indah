<?php include 'head_admin.php';
include 'config/config.php';


if (empty($id = $_GET['id'])) {
  echo "id kosong";
} else {
  $result = tampiltransaksiperid($id);
}

if (isset($_POST['submit'])) {
  $balasan = $_POST['balas_pesan'];
  $status = $_POST['status'];

  if (updatetransaksi($status, $id)) {
    echo "<script>alert('berhasil')</script>";
    echo "<script>window.location.href='data_transaksi.php'</script>";
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
          <label>No Transaksi</label>
          <input readonly type="text" class="form-control" value="<?= $a['no_transaksi']; ?>">
        </div>
        <div class="form-group">
          <label>Nama Warga</label>
          <input readonly type="text" class="form-control" value="<?= $a['nama_warga']; ?>">
        </div>

        <div class="form-group">
          <label>Jenis Transaksi</label>
          <input readonly type="text" class="form-control" value="<?= $a['jenis_zakat']; ?>">
        </div>
        <div class="form-group">
          <label>Bukti Transfer</label>
          <img class="img-responsive" width="20%" src="../<?= $a['bukti_transfer']; ?>">
        </div>

        <div class="form-group">
          <label>Total Tagihan</label>
          <input readonly type="text" class="form-control" value="Rp. <?= rupiah($a['jumlah_bayar']); ?>">
        </div>

        <div class="form-group">
          <select name="status" class="form-control">
            <option value="0">Belum Konfirmasi</option>
            <option value="2">Diterima</option>
            <option value="3">DiTolak</option>
          </select>
        </div>
      <?php } ?>
      <input type="submit" name="submit" class="btn btn-success" value="Simpan">
      <a href="data_transaksi.php" class="btn btn-primary">Kembali</a>

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