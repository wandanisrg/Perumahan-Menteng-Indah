<?php

include 'config/config.php';

if (isset($_GET['id'])) {
	if (hapuswarga($_GET['id'])) {
		echo "<script>document.location.href = 'data_warga.php';</script>";
	} else echo "gagal menghapus data";
}
