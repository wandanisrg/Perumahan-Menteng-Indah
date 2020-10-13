<?php

include 'phpexcel/Excel_class.php';
include 'config/config.php';

$excel = new Excel();
// Send Header
$excel->setHeader('contoh-1.xls');
$excel->BOF();
global $konek;
$query = "SELECT namalengkap,email,alamat,no_tlp,tgl_daftar FROM warga";
$sql = mysqli_query($konek, $query);
$arrmhs = array();
while ($row = $sql->fetch_assoc()) {
	array_push($arrmhs, $row);
}
#akhir data

$excel = new Excel();
#Send Header
$excel->setHeader('contoh-2.xls');
$excel->BOF();

#header tabel
$excel->writeLabel(0, 0, "Nama Lengkap");
$excel->writeLabel(0, 1, "Email");
$excel->writeLabel(0, 2, "Blok");
$excel->writeLabel(0, 3, "No Tlp");
$excel->writeLabel(0, 4, "Tgl Daftar");

#isi data
$i = 0;
foreach ($arrmhs as $baris) {
	$j = 1;
	foreach ($baris as $value) {
		$excel->writeLabel($i, $j, $value);
		$j++;
	}
	$i++;
}

$excel->EOF();

exit();
