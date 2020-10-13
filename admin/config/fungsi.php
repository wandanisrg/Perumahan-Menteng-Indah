<?php
date_default_timezone_set("Asia/Jakarta");

function pengkodean($table, $inisial)
{
	include "konek.php";
	$query = mysqli_query($konek, "SELECT * from $table");
	$properties = 	mysqli_fetch_field($query);
	$field = $properties->name;
	if ($table == 'transaksi') {
		$thn = date("y");
		$bln = date("m");
		$w   = "Where id_transaksi like '$inisial" . $thn . $bln . "%'";
	} else {
		$thn = "";
		$bln = "";
		$w   = "";
	}

	$hasil = mysqli_query($konek, "SELECT max(" . $field . ") from $table $w ");
	$data = mysqli_fetch_array($hasil);
	$panjang = $properties->length;
	$panjang -= 1;
	$no = $data[0];

	$panjanghuruf = strlen($inisial) + strlen($thn) + strlen($bln);
	$panjangnol = $panjang - $panjanghuruf;
	$nol = "";
	if (empty($no)) {
		for ($i = 2; $i <= $panjangnol; $i++) {
			$nol .= "0";
		}
		$no = $inisial . $thn . $bln . $nol . "1";
	} else {
		$noterakhir = substr($no, $panjanghuruf); // dimulai dari digit ke dua dan diambil 3 digit
		$nourut = $noterakhir + 1;
		$no = $inisial . $thn . $bln . sprintf('%0' . $panjangnol . 's', $nourut);
	}
	return $no;
}
function lihatlaporanpertgl($tglawal, $tglakhir)
{
	global $konek;
	$sql = "SELECT * FROM warga WHERE tgl_daftar BETWEEN '$tglawal' AND '$tglakhir'";
	$query = mysqli_query($konek, $sql);
	$cek = mysqli_fetch_array($query);

	if (mysqli_num_rows($query) > 0) {
		return true;
	} else {
		return false;
	}
}


function editdataadmin($username, $nama_admin, $level, $id)
{
	$query = "UPDATE
  `iuran`.`admin`
SET
  
  `nama_admin` = '$nama_admin',
  `username` = '$username',
  
  `level` = '$level'
WHERE `id_admin` = '$id';

";
	return run($query);
}
function editpassword($passwordnew, $id)
{
	$query = "UPDATE admin SET password='$passwordnew' WHERE id_admin='$id'";
	return run($query);
}

function simpandataadmin($id_admin, $nama, $username, $password, $level)
{
	global $konek;

	$query1 = "INSERT INTO `iuran`.`admin` (
  `id_admin`,
  `nama_admin`,
  `username`,
  `password`,
  `level`
)
VALUES
  (
    '$id_admin',
    '$nama',
    '$username',
    '$password',
    '$level'
  );

";
	if (mysqli_query($konek, $query1)) {
		return true;
	} else {
		return false;
	}
}


function simpanbanner($link, $ket, $lokasi)
{
	global $konek;

	$query = "INSERT INTO banner(id_banner,link,keterangan,banner) VALUES (null,'$link','$ket','$lokasi')";
	if (mysqli_query($konek, $query)) {
		return true;
	} else {
		return false;
	}
}

function tampilbanner()
{
	global $konek;
	$sql = "SELECT * FROM banner";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilartikel()
{
	global $konek;
	$sql = "SELECT * FROM artikel";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilartikellperid($id)
{
	global $konek;
	$sql = "SELECT * FROM artikel WHERE id_artikel='$id'";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilwarga()
{
	global $konek;
	$sql = "SELECT * FROM warga";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampiladminperid($id)
{
	global $konek;
	$sql = "SELECT * FROM admin WHERE id_admin='$id'";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilmustahiqperid($id)
{
	global $konek;
	$sql = "SELECT * FROM mustahiq WHERE id_mustahiq='$id'";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampiladmin()
{
	global $konek;
	$sql = "SELECT * FROM admin";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilmustahiq()
{
	global $konek;
	$sql = "SELECT * FROM mustahiq";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampildatatransaksi()
{
	global $konek;
	$sql = "SELECT * FROM transaksi WHERE status IN(1,2,3)";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampiltransaksiperid($id)
{

	global $konek;
	$sql = "SELECT * FROM transaksi WHERE id_transaksi='$id'";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampiljumlahtransaksiperid()
{

	global $konek;
	$sql = "SELECT SUM(jumlah_bayar) AS jumlah FROM transaksi";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilpesan()
{
	global $konek;
	$sql = "SELECT * FROM pesan";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilpesanperid($id)
{
	global $konek;
	$sql = "SELECT * FROM pesan WHERE id_pesan='$id'";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function hapuswarga($id)
{
	global $konek;
	$query = "DELETE FROM warga WHERE id_warga='$id'";
	if (mysqli_query($konek, $query)) return true;
	else return false;
}


function hapus_banner($id)
{
	global $konek;
	$query = "DELETE FROM banner WHERE id_banner='$id'";
	if (mysqli_query($konek, $query)) return true;
	else return false;
}

function hapus_mustahiq($id)
{
	global $konek;
	$query = "DELETE FROM mustahiq WHERE id_mustahiq='$id'";
	if (mysqli_query($konek, $query)) return true;
	else return false;
}

function hapus_dataadmin($id)
{
	global $konek;
	$query = "DELETE FROM admin WHERE id_admin='$id'";
	if (mysqli_query($konek, $query)) return true;
	else return false;
}

function cekloginadmin($username, $password)
{
	global $konek;

	$sql = "SELECT * FROM admin WHERE username ='$username' AND password='$password'";
	$query = mysqli_query($konek, $sql);

	$cek = mysqli_fetch_array($query);
	$_SESSION['id_admin'] = $cek['id_admin'];
	$_SESSION['username'] = $cek['username'];
	$_SESSION['nama_admin'] = $cek['nama_admin'];

	if (mysqli_num_rows($query) > 0) {
		return true;
	} else {
		return false;
	}
}


function updatepesan($id, $id_warga, $balasan, $status)
{
	global $konek;

	$query = "UPDATE pesan SET balasan='$balasan',status='$status' WHERE id_pesan='$id'";
	return run($query);
}

function updatetransaksi($status, $id)
{
	global $konek;

	$query = "UPDATE transaksi SET status='$status' WHERE id_transaksi='$id'";
	return run($query);
}

function rupiah($angka)
{
	$jadi = number_format($angka, 0, ',', '.');
	return $jadi;
}

function run($query)
{
	global $konek;

	if (mysqli_query($konek, $query)) return true;
	else return false;
}
