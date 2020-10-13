<?php

include 'config/config.php';

if(isset($_GET['id'])){
	if(hapus_artikel($_GET['id'])){
		echo "<script>document.location.href='dataartikel.php';</script>";
	}else echo "gagal menghapus data";
}

?>
