<?php
include 'head_user.php';
// include 'config/config.php';
if (empty($_SESSION['id_warga'])) {
  echo "<script>document.location.href = 'login.php';</script>";
} else {

  if (isset($_POST['bayar'])) {
    $notransaksi = $_POST['notransaksi'];
    $id_warga = $_SESSION['id_warga'];
    $id_transaksi = pengkodean("transaksi", $id_warga);
    $nama_warga = $_POST['nama_warga'];
    $jeniszakat = $_POST['jeniszakat'];
    $jumlahbayar = $_POST['jumlahbayar'];
    $id_warga = $_SESSION['id_warga'];
    $status = 0;
    /*
  $nama   = $_FILES['gambar']['name'];
  $size   = $_FILES['gambar']['size'];
  $error  = $_FILES['gambar']['error'];
  $asal = $_FILES['gambar']['tmp_name'];
  
  $lokasi="img/bukti_transfer/" . $nama;
  $format = pathinfo($nama, PATHINFO_EXTENSION);

  if($error === 0){

    if ($size > 9000){ 
    
          if($format === "jpg" || $format === "png" || $format === "JPG" || $format === "PNG" ){
   */
    if (simpantransaksi($id_transaksi, $id_warga, $notransaksi, $nama_warga, $jeniszakat, $jumlahbayar, $status)) {
      echo "<script>alert('Proses Transaksi sukses')</script>";
      echo "<script>window.location.href='profil.php'</script>";
    } else {
      echo "Error Simpan: " . "<br>" . mysqli_error($konek);
    }
    /*
            move_uploaded_file($asal, "img/bukti_transfer/".$nama);
          }else{
            echo "Maaf format filenya harus jpg/png ";
          }
    
      }else{
        echo "file terlalu besar";
      }
  }else "Ada kesalahan saat upload"; */
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
    <h1>Transaksi Iuran</h1>
  </div>

  <form method="post" action="" enctype="multipart/form-data">
    <!-- <input type="text" name="id_transaksi" value="<?php //echo $id_transaksi 
                                                        ?>"> -->
    <div class="form-group">
      <label>No Transaksi</label>
      <?php
      global $konek;
      $sql = mysqli_query($konek, "SELECT * FROM transaksi ORDER BY id DESC");
      $row = mysqli_fetch_array($sql);
      $a = $row['id'] + 1;

      ?>
      <input type="text" class="form-control" name="notransaksi" value="<?php echo date('ymdhis') . $a; ?>" readonly="readonly">
    </div>

    <div class="form-group">
      <label>Nama</label>
      <input type="text" class="form-control" name="nama_warga" value="<?php echo $_SESSION['nama_warga']; ?>" readonly>
    </div>

    <div class="form-group">
      <label>Jenis Iuran</label>
      <div>
        <select class="form-control" name="jeniszakat">
          <option value="0">-- Pilih jenis Iuran --</option>
          <option value="Iuran Keamanan dan Kebersihan">Iuran keamanan dan kebersihan</option>

        </select>
      </div>
    </div>

    <!--
        <div class="form-group">
          <label class="control-label">Upload Bukti Transfer</label>
          <input type="file" name="gambar">
        </div>-->

    <div class="form-group">
      <label for="exampleInputPassword1">Total Tagihan</label>
      <input type="number" class="form-control" name="jumlahbayar" readonly="readonly" value="<?php if (empty($_SESSION['a'])) {
                                                                                                echo '100000';
                                                                                              } else {
                                                                                                echo $_SESSION['a'];
                                                                                              } ?>">
    </div>

    <button type="submit" name="bayar" class="btn btn-block btn-success">B a y a r</button>
  </form>



  <?php include 'sidebar.php'; ?>
  </div>
  </div>

<?php }
include 'foot_user.php'; ?>