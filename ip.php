<?php
function IPnya() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP Tidak Dikenali';
 
    return $ipaddress;
}
$ipaddress = $_SERVER['REMOTE_ADDR'];
echo "IP anda adalah : ";
echo IPnya();
echo "<br>Browser ";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br> Sistem Operasi :";
echo php_uname();
?>

   <?php while ($row=mysqli_fetch_assoc($result_pemasukan)) { ?>
    <p>Pemasukan Zakat</p>
    <h2>Rp.<?php echo rupiah($row['total']); $a=$row['total']; ?></h2>
    <?php } ?>
    </center>
    </div>
    <div class="col-md-4">
    <center>
    <p>Penyaluran Zakat</p>
    <?php while ($row=mysqli_fetch_assoc($result_penyaluran)){?>
    <h2>Rp.<?php echo rupiah($row['jumlah']); $b=$row['jumlah']; ?></h2>
    <?php } ?>
    </center>
    </div>
    <div class="col-md-4">
    <center>
    <p>Total</p>
    <h2>Rp.<?php $c=$a-$b; echo rupiah($c); ?></h2>
    </center>
    </div>
  </div>
  </div>
</div> -->