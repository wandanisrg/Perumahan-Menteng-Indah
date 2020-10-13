<?php 
include 'head_user.php';


$result=tampilmustahiq();
?>
<link rel="stylesheet" type="text/css" href="admin/media/css/dataTables.bootstrap.css">
<div class="content-wrapper">


   <section class="content">
      <h3>Penyaluran Zakat</h3>
        <div class="well">  
          <table id="muzakki" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama penerima</th>
                            <th>Nama yayasan</th>
                            <th>Alamat</th>
                            <th>Jumlah Zakat</th>
                            <th>Tgl Penyaluran</th>
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
                        <td>Rp. <?php echo  rupiah($a['jumlah_zakat']); ?></td>
                        <td><?php echo  $a['tgl_penyaluran']; ?></td>
                        <td><?php echo  $a['nama_admin']; ?></td>
                    </tr>
                        <?php
                        $no++;
                        }
                        ?>

                    </tbody>
                </table>  
        </div>


   </section>


</div>

<?php 
include 'sidebar.php'; ?>
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


<?php

include 'foot_user.php'; ?>