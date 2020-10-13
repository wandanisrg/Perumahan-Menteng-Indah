<?php
include 'head_user.php';
/*
if(empty($_SESSION['iduser'])){ ?>
  <script>document.location.href = 'index.php';</script>
<?php }else{
*/
?>

<style>
  .kosong {
    color: red;
  }

  .well {
    background: #eee;
    border-radius: 0px;
  }
</style>


<div class=container>


  <div class="col-md-9">
    <div class="well" style="background-color:white">


      <link rel="stylesheet" href="css/jquery-ui.css">
      <script src="js/jquery-ui.js"></script>

      <script>
        $(function() {
          $("#accordion").accordion();
        });
      </script>

      <div id="accordion">
        <h3>Kenapa Menggunakan Pembayaran Iuran Secara Online ?</h3>
        <div>
          <p>
            Karena merupakan website yang di rancang untuk kemudahan membayar iuran sehingga membuat warga perumahan lebih praktis membayar iuran
          </p>
        </div>
        <h3>Apa tujuan pembuatan sistem pembayaran iuran secara online ?</h3>
        <div>
          <p>
            Dengan segala kemudahan warga membayar iuran sehingga warga tidak lupa untuk membayar kewajibannya
          </p>
        </div>
        <h3>Apakah setiap transaksi zakat kena biaya lebih ?</h3>
        <div>
          <p>
            Tentu saja tidak, kalaupun anda mentransfer pembayaran iuran anda lebih dari yang seharusnya anda transfer kami kan tetap salurkan dana tersebut ke mustahiq yang membutuhkan
          </p>
        </div>
        <h3>Saya masih ada pertanyaan lain?</h3>
        <div>
          <p>
            Jika masih ada pertanyaan lain silahkan hubungi kami di mentengindah@gmail.com
          </p>
        </div>
      </div>


    </div>
  </div>
</div>


</div>
</div>
</div>
<?php
include 'foot_user.php'; ?>