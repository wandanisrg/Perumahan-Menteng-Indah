<?php

include 'config/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title></title>

  <!-- Bootstrap -->
  <script src="js/jquery.min.js"></script>
  <script src="admin/media/js/dataTables.responsive.min.js"></script>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">


  <style>
    .navbar-default {
      background-color: #7BA6F3;
      border-color: #7BA6F3;
      border-radius: 0px;
    }

    .navbar-default .navbar-nav>li>a {
      color: #00aeef;
    }

    .navbar-default .navbar-brand {
      color: #00aeef;
    }

    .well {
      background-color: #4EEFAA;
      border-radius: 0px;
    }

    footer {
      background-color: #7BA6F3;
      color: white;
      bottom: 0;
      position: relative;
      width: 100%;
    }
  </style>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">E-Zakat</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="user.php">Home</a></li>
          <li><a href="profil.php">Profil</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hitung Zakat<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="hitungzakatemas.php">Zakat Emas</a></li>
              <li><a href="hitungzakatemaspakai.php">Zakat Emas Yang di pakai</a></li>
              <li><a href="hitungzakatperak.php">Zakat Perak</a></li>
              <li><a href="hitungzakatpertanian.php">Zakat Pertanian</a></li>
              <li><a href="hitungzakattani_biaya.php"">Zakat Pertanian Dengan Pengairan</a></li>
            <li><a href=" hitungzakatperdagangan.php">Zakat Perdagangan</a></li>
              <li><a href="hitungzakathewanternak.php">Zakat Hewan Ternak</a></li>

            </ul>
          </li>

          <li><a href="bayarzakat.php">Bayar Zakat</a></li>
          <li><a href="konfirmasi.php">Pesan</a></li>
          <li><a href="logout.php">Keluar</a></li>
        </ul>


      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <h2>
    <center>E-zakat</center>
  </h2>

  <div class="container">
    <hr>
    <div class="row">
      <div class="col-md-4">
        <center>
          <h2>Aman</h2>
          <img width="50%" class="img-responsive" src="img/img_zakat/tameng.png" alt="">
          <p class="lead">Semua transaksi anda di proses dengan sangat aman oleh sistem kami</p>
        </center>
      </div>
      <div class="col-md-4">
        <center>
          <h2>Transparan</h2>
          <img width="50%" class="img-responsive" src="img/img_zakat/money.jpg" alt="">
          <p class="lead">Semua harta zakat yang masuk kami kelola dengan sangat transaparan</p>
        </center>
      </div>
      <div class="col-md-4">
        <center>
          <h2>Terpercaya</h2>
          <img width="50%" class="img-responsive" src="img/img_zakat/kurir.jpg" alt="">
          <p class="lead">Kami salurkan semua harta zakat 100% kepada yang berhak menerimanya</p>
        </center>
      </div>
    </div>
    <hr>
  </div>