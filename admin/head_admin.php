<?php
session_start();

if (empty($_SESSION['id_admin'])) {
  echo "<script>document.location.href='login.php'</script>";
  //echo "<script>alert('kosong')</script>";
}
?>


<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Perumahan Menteng Indah</title>
  <link rel="shortcut icon" href="admin.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="font-awesome/ion/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/jQueryUI/jquery-ui.css">
  <script src="plugins/jQueryUI/jquery-ui.js"></script>
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">ADM</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Administrator</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">

        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
          </div>
          <div class="pull-left info">
            <!--<p>Alexander Pierce</p>
          <!-- Status -->
            <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
          </div>
        </div>

        <!-- search form (Optional) -->

        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

          <!-- Optionally, you can add icons to the links -->
          <li><a href="data_warga.php"><i class="fa fa-user"></i> <span>Data Warga</span></a></li>
          <li><a href="data_transaksi.php"><i class="fa fa-credit-card-alt"></i> <span>Data Transaksi</span></a></li>
          <li><a href="konfirmpesan.php"><i class="fa fa-inbox"></i> <span>Kirim Pesan</span></a></li>
          <li><a href="data_admin.php"><i class="fa fa-user"></i> <span>Data Admin </span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-file"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><i class="fa fa-file-text"></i><a href="laporan_pemasukan.php">Transaksi Iuran</a></li>
              <li><i class="fa fa-file-text"></i><a href="laporan_data_warga.php">Data Warga</a></li>
            </ul>
          </li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-off"> Keluar</a></li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>