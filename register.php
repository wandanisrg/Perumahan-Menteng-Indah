<?php include 'head_user.php';


if (isset($_POST['daftar'])) {

  $nama = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $kode = $_POST['kode'];
  $password_confirm = $_POST['password_confirm'];
  $tgl_daftar = date('Y-m-d');

  global $konek;

  $sql = "SELECT email FROM muzakki WHERE email='$email'";
  $result = mysqli_query($konek, $sql);
  $cek_email = mysqli_num_rows($result);

  if ($cek_email == 0) {

    if ($password === $password_confirm) {
      $password = sha1($password);

      if ($kode === $_SESSION["Captcha"]) {

        if (simpanpendaftaranmuzakki($nama, $email, $password, $tgl_daftar)) {
          echo "<div class='alert alert-success fade in'>
                                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                  Alhamdulillah Pendaftaran berhasil, Silahkan <a href='login.php'>Masuk</a>
                                  </div>";
        } else {
          echo "gagal";
        }
      } else {
        echo "<div class='alert alert-danger fade in'>
                                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                  Kode yang anda masukan salah !
                                  </div>";
      }
    } else {
      echo "<div class='alert alert-danger fade in'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              Password Confirm anda tidak sama
            </div>";
    }
  } else {
    echo "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        Email sudah pernah di daftarkan, silahkan gunakan email yang lain
        </div>";
  }
}

?>

<h1>
  <center>Form Pendaftaran</center>
</h1>
<hr>
<br>
<form class="form-horizontal" role="form" method="post" action="">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Nama Warga</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" placeholder="Nama Muzakki" required="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="Email" required="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="alamat" placeholder="Alamat" required="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">No Telp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="no_telp" placeholder="No_telp" required="">
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="password" placeholder="Masukan Password" required="">
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Konfirmasi Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password_confirm" placeholder="Konfirmasi Password" required="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Kode</label>
        <div class="col-sm-10">
          <img src="captcha.php" alt="">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Masukan Kode</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="kode" placeholder="Masukan Kode" required="">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
        </div>
      </div>
</form>


<?php include 'sidebar.php'; ?>

<?php include 'foot_user.php'; ?>