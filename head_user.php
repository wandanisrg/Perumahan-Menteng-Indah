<?php


include 'config/config.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Iuran Menteng Indah</title>
  <link rel="shortcut icon" href="home.ico">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
  body {
    background-color: rgba(195, 191, 191, 0.09);
  }

  .navbar-default .navbar-toggle .icon-bar {
    background-color: #fffcfc;
  }

  .navbar-default .navbar-toggle:hover {
    /*background-color: #00afd1; Asli*/
    background-color: #12F5E8;
  }

  .navbar-default .navbar-brand {
    color: #f5f5f5;
  }

  .garis {
    border: 0.5px solid #06F945;
  }

  .garis_foot {
    border: 0.5px solid white;
  }

  .navbar-default {
    background-color: #A9A9A9;
    /*background-color: #00afd1;*/
    border-color: #00afd1;
    border-radius: 0px;
  }

  .navbar-default .navbar-nav>li>a {
    color: white;
  }

  .btn-success {
    border-radius: 0px;
  }

  .navbar-default .navbar-nav>li>a:hover {
    color: #fff;
    background-color: #a4c5e2;
  }

  .well {
    background-color: white;
  }

  .carousel-caption {
    background-color: black;
    opacity: 0.5;
  }

  footer.footer {
    border: 0px solid black;
    height: 100%;
    margin-top: 1%;
    background-color: #A9A9A9;
    color: white;
  }
</style>

<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid menu">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Iuran</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <?php if (empty($_SESSION['id_warga'])) { ?>
            <li><a href="login.php">Masuk</a></li>
            <li><a href="register3.php">Daftar</a></li>
          <?php } else { ?>
            <li></li>
          <?php } ?>
          <?php if (empty($_SESSION['id_warga'])) { ?>
            <li></li>
          <?php } else { ?>
            <li><a href="logout.php">Keluar</a></li>
          <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar-left">
          <?php if (empty($_SESSION['id_warga'])) { ?>
            <li></li>
          <?php } else { ?>
            <li><a href="profil.php">Profil</a></li>
          <?php } ?>
          <li><a href="bayariuran.php">Transaksi Iuran</a></li>

          </li>
          <?php if (empty($_SESSION['id_warga'])) { ?>
            <li></li>
          <?php } else { ?>
            <li><a href="pesan.php">Kirim Pesan</a></li>
          <?php } ?>
          <li><a href="faq.php">FAQ</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">

      <div class="col-md-9">