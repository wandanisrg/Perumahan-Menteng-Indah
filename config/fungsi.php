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

function cekloginwarga($email, $password)
{
	global $konek;

	$sql = "SELECT * FROM warga WHERE email ='$email' AND password='$password'";
	$query = mysqli_query($konek, $sql);

	$cek = mysqli_fetch_array($query);
	$_SESSION['id_warga'] = $cek['id_warga'];
	$_SESSION['email'] = $cek['email'];
	$_SESSION['nama_warga'] = $cek['nama_warga'];
	if (mysqli_num_rows($query) > 0) {
		return true;
	} else {
		return false;
	}
}

function rupiah($angka)
{
	$jadi = number_format($angka, 0, ',', '.');
	return $jadi;
}


function simpankonfirmasi($id, $nama, $confirm, $status)
{
	global $konek;

	$query = "INSERT INTO `iuran`.`pesan` (
  `id_pesan`,
  `id_warga`,
  `nama_warga`,
  `pesan`,
  `balasan`,
  `status`
)
VALUES
  (
    null,
    '$id',
    '$nama',
    '$confirm',
    '$balasan',
    '$status'
  );

";
	if (mysqli_query($konek, $query)) {
		return true;
	} else {
		return false;
	}
}

function simpankomentar($komentar, $idartikel, $namawarga)
{
	global $konek;

	$query = "INSERT INTO komentar_artikel (id_artikel,nama_warga,isi_komentar) VALUES ('$idartikel','$namawarga','$komentar')";
	if (mysqli_query($konek, $query)) {
		return true;
	} else {
		return false;
	}
}


function simpanpendaftaranwarga($id_warga, $nama, $email, $password, $alamat, $tgl_daftar, $no_telp)
{
	global $konek;

	$query = "INSERT INTO `iuran`.`warga` (
  `id_warga`,
  `foto_profil`,
  `nama_warga`,
  `email`,
  `password`,
  `alamat`,
  `no_telp`,
  `tgl_daftar`
)
VALUES
  (
    '$id_warga',
    '$foto_profil',
    '$nama',
    '$email',
    '$password',
    '$alamat',
    '$no_telp',
    '$tgl_daftar'
  );

";
	if (mysqli_query($konek, $query)) {
		return true;
	} else {
		return false;
	}
}

function simpantransaksi($id_transaksi, $id_warga, $notransaksi, $nama_warga, $jeniszakat, $jumlahbayar, $status)
{

	global $konek;

	$query = "INSERT INTO `iuran`.`transaksi` (
  `id_transaksi`,
  `id_warga`,
  `nama_warga`,
  `no_transaksi`,
  `jenis_zakat`,
  `bukti_transfer`,
  `jumlah_bayar`,
  `nama_bank`,
  `atas_nama`,
  `rekening_bank_tujuan`,
  `jumlah_bayar_konfirmasi`,
  `tgl_bayar`,
  `keterangan`,
  `status`
)
VALUES
  (
    '$id_transaksi',
    '$id_warga',
    '$nama_warga',
    '$notransaksi',
    '$jeniszakat',
    '$bukti_transfer',
    '$jumlahbayar',
    '$nama_bank',
    '$atas_nama',
    '$rekening_bank_tujuan',
    '$jumlah_bayar_konfirmasi',
    '$tgl_bayar',
    '$keterangan',
    '$status'
  );

";

	if (mysqli_query($konek, $query)) {
		return true;
	} else {
		return false;
	}
}

function totalpenyaluran_zakat()
{
	global $konek;
	$sql = "SELECT SUM(jumlah_zakat) as jumlah FROM mustahiq";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilkomentarperid($idartikel)
{
	global $konek;
	$sql = "SELECT * FROM komentar_artikel WHERE id_artikel='$idartikel' ORDER BY isi_komentar ASC";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilkonfirmasi($id)
{

	global $konek;
	$sql = "SELECT * FROM pesan WHERE id_warga='$id' AND status=1";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampiljumlahbayarperid($id)
{

	global $konek;
	$sql = "SELECT SUM(jumlah_bayar) AS jumlah FROM transaksi WHERE id_warga= '$id' AND status='2'";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampiltransaksiperid($id)
{

	global $konek;
	$sql = "SELECT * FROM transaksi WHERE id_warga= '$id' AND status=2";
	//$sql="SELECT *FROM transaksi WHERE id_muzakki= '$id' AND status IN(1,2)";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampiltransaksikonfirmasi($id)
{
	global $konek;
	$sql = "SELECT * FROM transaksi WHERE id_warga= '$id' AND status=0";
	//$sql="SELECT *FROM transaksi WHERE id_muzakki= '$id' AND status IN(1,2)";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilpernotransaksi($no)
{
	global $konek;
	$sql = "SELECT * FROM transaksi WHERE no_transaksi= '$no'";
	//$sql="SELECT *FROM transaksi WHERE id_muzakki= '$id' AND status IN(1,2)";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampiltransaksigagal($id)
{
	global $konek;
	$sql = "SELECT * FROM transaksi WHERE id_warga= '$id' AND status=3";
	//$sql="SELECT *FROM transaksi WHERE id_muzakki= '$id' AND status IN(1,2)";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilbanner()
{
	global $konek;
	$sql = "SELECT * FROM banner";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}


function tampiltransaksiperstatus($id)
{

	global $konek;
	$sql = "SELECT * FROM transaksi WHERE id_warga= '$id' AND status=0";
	//$sql="SELECT *FROM transaksi WHERE id_muzakki= '$id' AND status IN(1,2)";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampiltransaksi_moderasi()
{

	global $konek;
	$sql = "SELECT * FROM transaksi";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

/*
function tampilpenyaluran(){

	global $konek;
	$sql="SELECT * FROM penyaluran";
	$result=mysqli_query($konek,$sql) or die('gagal menampilkan data');
	return $result;
}
*/

function tampilprofil($id)
{
	global $konek;
	$query = "SELECT * FROM warga WHERE id_warga= '$id'";
	$result = mysqli_query($konek, $query) or die('gagal menampilkan data');
	return $result;
}

function tampilartikelfull()
{

	global $konek;
	$sql = "SELECT * FROM artikel";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function tampilartikellimit($posisi, $batas)
{
	global $konek;
	$query = "SELECT * FROM artikel LIMIT $posisi,$batas";
	$result = mysqli_query($konek, $query) or die('gagal menampilkan data');
	return $result;
}

function tampilgambar()
{
	global $konek;
	$query = "SELECT * FROM artikel";
	$result = mysqli_query($konek, $query) or die('gagal menampilkan data');
	return $result;
}

function tampilartikelperid($id)
{
	global $konek;
	$query = "SELECT * FROM artikel WHERE id_artikel='$id'";
	$result = mysqli_query($konek, $query) or die('gagal menampilkan data');
	return $result;
}
/*
function tampilkonfirmadmin($id){
	global $konek;
	$query="SELECT * FROM konfirmasi_admin WHERE id_muzakki='$id'";
	$result=mysqli_query($konek,$query) or die('gagal menampilkan data');
	return $result;
}
*/

function tampilwarga()
{
	global $konek;
	$sql = "SELECT * FROM warga";
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


function editprofil_image($lokasi, $id)
{
	$query = "UPDATE warga SET foto_profil='$lokasi' WHERE id_warga='$id'";
	return run($query);
}

function editprofil($namalengkap, $email, $alamat, $notlp, $id_warga)
{

	$query = "UPDATE warga SET nama_warga='$namalengkap', email='$email', alamat='$alamat' , no_telp='$notlp' 
	WHERE id_warga='$id_warga' ";
	return run($query);

	//UPDATE muzakki SET id_muzakki=[value-1],foto_profil=[value-2],namalengkap=[value-3],email=[value-4],password=[value-5],alamat=[value-6],no_tlp=[value-7] WHERE 1
}

function updatetransaksi($no_transaksi, $namabank, $norekwarga, $atasnama, $rek_tujuan, $jumlahbayar_warga, $tgl_bayar, $lokasi, $ket)
{
	$query = "UPDATE transaksi SET nama_bank='$namabank',atas_nama='$atasnama',rekening_bank_tujuan='$rek_tujuan',jumlah_bayar_konfirmasi='$jumlahbayar_warga',tgl_bayar='$tgl_bayar',bukti_transfer='$lokasi',keterangan='$ket', status=1 WHERE no_transaksi='$no_transaksi'";
	return run($query);
}

function totalpemasukan_zakat()
{
	global $konek;
	$sql = "SELECT SUM(jumlah_bayar) AS totalpemasukan FROM transaksi";
	$result = mysqli_query($konek, $sql) or die('gagal menampilkan data');
	return $result;
}

function inputkonfirmasi($id_warga, $nama, $isi_pesan, $lokasi)
{
	global $konek;

	$query = "INSERT INTO pesan (id_warga,nama_warga,pesan,file_upload) VALUES ('$id_warga','$nama','$isi_pesan','$lokasi')";
	if (mysqli_query($konek, $query)) {
		return true;
	} else {
		return false;
	}
}

function run($query)
{
	global $konek;

	if (mysqli_query($konek, $query)) return true;
	else return false;
}

function excerpt($string)
{
	$string = substr($string, 0, 200);
	return $string;
}
