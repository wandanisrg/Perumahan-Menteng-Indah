<?php 
include 'head_user.php';


if(empty($_SESSION['iduser'])){
  header('location:index.php');
}else{
$result=tampilartikel();
$result_pemasukan=totalpemasukan_zakat();
$result_penyaluran=tampilpenyaluran_jumlah();

function rupiah($angka){
$jadi =number_format($angka,0,',','.');
return $jadi;
}

while ($row=mysqli_fetch_assoc($result_pemasukan)) {
 ?>
<link rel="stylesheet" type="text/css" href="admin/media/css/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="admin/media/css/responsive.bootstrap.min.css">


<div class=container>
  <div class="page-header">
  <hr>
    <center>
      <p class="lead">Berikut ini adalah Tabel Perincian tentang penyaluran zakat di E-Zakat</p></center>
  </div>
</div>


<div class=container>
  <div class="row">
    <div class="col-md-4">

      <div class="well">
        <div class="row">
          <div class="col-lg-6">
            <p>Pemasukan Zakat</p>
            <p>Tanggal <?php echo date("d-m-Y"); ?></p>
            <h2>Rp.<?php echo rupiah($row['total']); $a=$row['total']; ?></h2>
          </div>
            <?php } ?>
        </div>
      </div>

      <div class="well">
        <div class="row">
          <div class="col-lg-6">
            <p>Penyaluran Zakat</p>
            <?php while ($row=mysqli_fetch_assoc($result_penyaluran)){?>
            <h2>Rp.<?php echo rupiah($row['jumlah']); $b=$row['jumlah']; ?></h2>
            <?php } ?>
            <a href="rincian.php" class="btn btn-info">Detail Rincian</a>
          </div>
        </div>
      </div>

      <div class="well">
        <div class="row">
          <div class="col-lg-6">
            <p>Total</p>
            <p><?php echo date("d-m-Y");?></p>
            <h2>Rp.<?php $c=$a-$b; echo rupiah($c); ?></h2>
          </div>
        </div>
      </div>

    </div>


<?php
$result=tampilmustahiq();
?>

    <div class="col-md-8">
          <table id="muzakki" class="table table-striped table-bordered table-responsive nowrap" >
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama penerima</th>
                            <th>Nama yayasan</th>
                            <th>Alamat</th>
                            <th>Jumlah Zakat Yang di Terima</th>
                            <th>Nama Amil</th>
                        </tr>
                    </thead>
                    
                     <tbody>
                      <?php

                      $no = 1;
                      while ($a = mysqli_fetch_assoc($result)) {
                      
                      ?>
     
                    <tr>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $a['nama_penerima']; ?></td>                       
                        <td><?php echo  $a['nama_yayasan']; ?></td>
                        <td><?php echo  $a['alamat']; ?></td>
                        <td>Rp. <?php echo rupiah($a['jumlah_zakat']); ?></td>
                        <td><?php echo  $a['nama_amil']; ?></td>
                    </tr>
                        <?php
                        $no++;
                        }
                        ?>

                    </tbody>
                </table>  
              </div>  


</div>

        <script src="admin/media/js/jquery.dataTables.min.js"></script>
        <script src="admin/media/js/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready( function () {
          $('#muzakki').DataTable({
            responsive:true
          });
      } );
        </script> 

    </div>
</div>

<?php } include 'foot_user.php';?>
