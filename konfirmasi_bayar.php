<?php
include 'head_user.php';

if (empty($id = $_SESSION['id_warga'])) {
  echo "<script>document.location.href = 'login.php';</script>";
} else {

  $result = tampiltransaksiperstatus($id);

  if (isset($_POST['bayar'])) {
    $no_transaksi = $_POST['notransaksi'];
    $namabank = $_POST['namabank'];
    $norekuser = $_POST['norek_user'];
    $atasnama = $_POST['atasnama'];
    $rek_tujuan = $_POST['rek_tujuan'];
    $totaltagihan = $_POST['total_tagihan'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $ket = $_POST['ket'];
    $status = $_POST['status'];

    $id_user = $_SESSION['id_warga'];


    $nama   = $_FILES['gambar']['name'];
    $size   = $_FILES['gambar']['size'];
    $error  = $_FILES['gambar']['error'];
    $asal = $_FILES['gambar']['tmp_name'];

    $lokasi = "img/bukti_transfer/" . $nama;
    $format = pathinfo($nama, PATHINFO_EXTENSION);

    if ($error === 0) {

      if ($size > 100) {

        if ($format === "jpg" || $format === "png" || $format === "JPG" || $format === "PNG") {

          if (updatetransaksi($no_transaksi, $namabank, $norekuser, $atasnama, $rek_tujuan, $jumlahbayar_user, $tgl_bayar, $lokasi, $ket, $status)) {
            echo "<script>alert('Konfirmasi Berhasil, Admin kami akan mengecek konfirmasi anda dalam 1x24 Jam')</script>";
            echo "<script>window.location.href='profil.php';</script>";
          } else {
            echo "Error Update Transaksi: " . "<br>" . mysqli_error($konek);
          }

          move_uploaded_file($asal, "img/bukti_transfer/" . $nama);
        } else {
          echo "Maaf format filenya harus jpg/png ";
        }
      } else {
        echo "file terlalu besar";
      }
    } else "Ada kesalahan saat upload";
  }

?>
  <style>
    #cara {
      background-color: #eee;
    }

    #form {
      background-color: white;
    }
  </style>
  <div class="page-header">
    <h1>Konfirmasi Transaksi</h1>
  </div>

  <form method="post" action="" enctype="multipart/form-data">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="form-group">
        <label>No Transaksi</label>
        <input type="text" class="form-control" name="notransaksi" value="<?php echo $row['no_transaksi'] ?>" readonly="readonly">
      </div>

      <div class="form-group">
        <label>Total Tagihan</label>
        <input type="text" class="form-control" value="<?php echo rupiah($row['jumlah_bayar']) ?>" readonly="readonly">
      </div>
    <?php } ?>

    <div class="form-group">
      <label for="sel1">Dompet Digital</label>
      <select name="namabank" class="form-control" id="sel1">
        <option value="0">Pilih Dompet Digital</option>
        <option value="OVO">OVO</option>
      </select>
    </div>

    <div class="form-group">
      <label>No Hp Dompet Digital</label>
      <input type="number" name="norek_user" class="form-control">
    </div>

    <div class="form-group">
      <label>Atas Nama</label>
      <input type="text" name="atasnama" class="form-control">
    </div>

    <div class="form-group">
      <label>Tanggal Pembayaran</label>
      <input type="date" name="tgl_bayar" class="form-control">
    </div>

    <div class="form-group">
      <label class="control-label">Bukti Pembayaran</label>
      <input type="file" name="gambar">
    </div>

    <div class="form-group">
      <label>Keterangan (optional)</label>
      <input type="text" name="ket" class="form-control">
    </div>

    <input type="hidden" name="status" value="1">

    <button type="submit" name="bayar" class="btn btn-block btn-success">Konfirmasi</button>
  </form>



  <?php include 'sidebar.php'; ?>
  </div>
  </div>

<?php }
include 'foot_user.php'; ?>