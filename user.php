<?php
include 'head_user.php';


if (empty($_SESSION['id_warga'])) { ?>
  <script>
    document.location.href = 'index.php';
  </script>
<?php } else {
  unset($_SESSION['a']);
  $result = tampilartikel();
  $result_pemasukan = totalpemasukan_zakat();
  $result_penyaluran = tampilpenyaluran_jumlah();


?>

  <div class=container>
    <div class="page-header">

      <center>
        <p class="lead">Sistem pembayaran iuran perumahan menteng indah</p>
      </center>
    </div>
  </div>


  <div class=container>
    <div class="row">
      <div class="col-md-1">



      </div>

      <div class="col-md-10">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <h1><a href="singleartikel.php?id=<?= $row['id_artikel']; ?>"><?= $row['judul_artikel']; ?></a></h1>
          <img width="40%" src="<?php echo $row['gambar'] ?>">
          <p><?= excerpt($row['isi_artikel']); ?><a href="singleartikel.php?id=<?= $row['id_artikel']; ?>">Baca Selengkapnya</p>

          <hr style="border:1px solid black">
        <?php } ?>
      </div>

    </div>
  </div>

<?php }
include 'foot_user.php'; ?>