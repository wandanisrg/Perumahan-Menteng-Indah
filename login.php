<?php include 'head_user.php';



if (isset($_POST['masuk'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = sha1($password);

  if (cekloginwarga($email, $password)) { ?>
    <script>
      document.location.href = 'index.php';
    </script>

<?php } else {
    echo "<div class='alert alert-danger fade in'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        Email dan Password Salah
      </div>";
  }
}
?>

<h1>
  <center>Silahkan Masuk</center>
</h1>
<hr>
<br>
<form class="form-horizontal" role="form" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="Masukan Email" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="masuk" class="btn btn-primary">MASUK</button>
    </div>
  </div>
</form>
</div>
</div>
</div>


</div>
</div>
</div>
<?php include 'foot_user.php'; ?>