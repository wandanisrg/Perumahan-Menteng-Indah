<?php
include 'head_admin.php';
include 'config/config.php';
$result = tampilbanner();
?>
<link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.css">

<div class="content-wrapper">

  <section class="content">
    <a href="tambah_banner.php" name="simpan" class="btn btn-success">Tambah Data</a>
    <h3>Tabel Banner</h3>
    <div class="well">
      <table id="warga" class="table table-bordered">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Gambar</th>
            <th>Link</th>
            <th>Keterangan</th>
            <th>Hapus</th>
          </tr>
        </thead>

        <tbody>
          <?php

          $no = 1;
          while ($a = mysqli_fetch_assoc($result)) {

          ?>

            <tr>
              <td><?php echo  $no; ?></td>
              <td><a href="<?php echo  $a['banner']; ?>">Lihat Gambar</a></td>
              <td><?php echo  $a['link']; ?></td>
              <td><?php echo  $a['keterangan']; ?></td>
              <td><a href="hapus_banner.php?id=<?= $a['id_banner']; ?>" onclick="return confirm('Data akan dihapus ?')" name="simpan" class="btn btn-danger">Hapus</td>
            </tr>
          <?php
            $no++;
          }
          ?>

        </tbody>
      </table>
    </div>


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
<!-- Main Footer -->
<?php include 'foot_admin.php'; ?>