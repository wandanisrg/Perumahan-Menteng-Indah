<?php
require_once "Excel.class.php";

$excel = new Excel();
// Send Header
$excel->setHeader('contoh-1.xls');
$excel->BOF();

$excel->writeLabel(0, 0, "NIM :");
$excel->writeLabel(0, 1, "1111500200");
$excel->writeLabel(1, 0, "NAMA :");
$excel->writeLabel(1, 1, "ACHMAD SOLICHIN");
$excel->writeLabel(2, 0, "NILAI :");
$excel->writeNumber(2, 1, 85);

$excel->EOF();
exit();
?>
