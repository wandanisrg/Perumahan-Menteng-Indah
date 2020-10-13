<?php
session_start();
include 'config/config.php';


if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password = sha1($password);

  if (cekloginadmin($username, $password)) {
    //echo $_SESSION['iduser'];
    echo "<script>document.location.href='data_warga.php'</script>";
  } else {
    echo "<script>alert('Username atau Password Anda Salah, Silahkan Ulangi Kembali')</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Admin Perumahan Menteng Indah</title>

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<style>
  .login {
    margin-top: 5%;
  }
</style>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
      </div>

      <div class="col-md-5 login">
        <div class="well">
          <div class="header">
            <center><img src="img/logo.jpg" alt=""></center>
            <hr>
          </div>
          <form action="" method="post">
            <div class="form-group">
              <label for="exampleInputUsername1">Username</label>
              <input type="text" name="username" class="form-control" id="exampleInputUsername1" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Masuk</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>