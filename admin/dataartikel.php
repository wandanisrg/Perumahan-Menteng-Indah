<?php
include 'head_admin.php';
include 'config/config.php';
$result = tampilartikel();
?>
<link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.css">

<div class="content-wrapper">

  <section class="content">
    <a href="tambah_artikel.php" name="simpan" class="btn btn-success">Tambah Data</a>
    <h3>Tabel Data Artikel</h3>
    <div class="well">
      <table id="muzakki" class="table table-bordered">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Judul Artikel</th>
            <th>Isi Artikel</th>
            <th>Gambar</th>
            <th>Nama Admin</th>
            <th>Edit</th>
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
              <td><?php echo  $a['judul_artikel']; ?></td>
              <td><?php echo  substr($a['isi_artikel'], 0, 50); ?>......</td>
              <td><a href="<?php echo  $a['gambar']; ?>">Lihat Gambar</a></td>

              <td><?php echo $a['nama_admin']; ?></td>
              <td><a href="edit_artikel.php?id=<?= $a['id_artikel']; ?>" name="simpan" class="btn btn-primary">Edit</td>
              <td><a href="hapus_artikel.php?id=<?= $a['id_artikel']; ?>" onclick="return confirm('Data akan dihapus ?')" name="simpan" class="btn btn-danger">Hapus</td>
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
    $('#muzakki').DataTable({
      responsive: true
    });
  });
</script>
<!-- Main Footer -->
<?php include 'foot_admin.php'; ?>