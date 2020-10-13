<?php

include 'config/config.php';

if(isset($_GET['id'])){
	if(hapus_mustahiq($_GET['id'])){
		echo "<script>document.location.href='data_mustahiq.php';</script>";
	}else echo "gagal menghapus data";
}

?>
