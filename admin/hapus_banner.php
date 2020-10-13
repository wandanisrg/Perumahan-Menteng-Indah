<?php

include 'config/config.php';

if(isset($_GET['id'])){
	if(hapus_banner($_GET['id'])){
		echo "<script>document.location.href='index.php';</script>";
	}else echo "gagal menghapus data";
}

?>
