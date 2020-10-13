<?php

// $nama_dokumen='Laporan Data Muzakki'.date('dFy'); //Beri nama file PDF hasil.
// define('_MPDF_PATH','mpdf/');
// include(_MPDF_PATH . "mpdf.php");
// $mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
// //Beginning Buffer to save PHP variables and HTML tags
// ob_start();

include 'config/config.php';


if (isset($_POST['lihat'])) {
	$tglawal = $_POST['dateawal'];
	$tglakhir = $_POST['dateakhir'];

	global $konek;

	$sql = "SELECT * FROM warga WHERE tgl_daftar BETWEEN '$tglawal' AND '$tglakhir'";
	$query = mysqli_query($konek, $sql);
	$cek = mysqli_fetch_array($query);

	if (mysqli_num_rows($query) > 0) { ?>

		<style>
			body {
				font-family: arial;
				font-size: 12px;
			}

			table#warga {
				width: 80%;
				font-size: 12px;
			}

			table,
			th {
				border: 1px solid black;
				border-collapse: collapse;
			}

			td {
				border: 1px solid black;
			}
		</style>
		<title>Laporan <?php echo $tglawal . "||" . $tglakhir;  ?></title>
		<h1>
			<center>Laporan Data Warga</center>
		</h1>
		<center>Periode <?php echo "<b>" . $tglawal . "</b>" ?> sampai <?php echo "<b>" . $tglakhir . "</b>" ?></center>

		<center>Perumahan Menteng Indah Kota Medan <br> Jl. Menteng VII No.41, Medan Tenggara, Kec. Medan Denai, Kota Medan, Sumatera Utara 20226
			<br>
			<hr>
			Dicetak oleh Admin | Tanggal <?= date('d-F-Y') ?>



			<div class="well">
				<center>
					<table style="border-spacing:0px;" id="warga" class="table table-bordered">
						<thead>
							<tr>
								<th>Nomor</th>
								<th>Nama Lengkap</th>
								<th>Email</th>
								<th>Blok</th>
								<th>No Tlp</th>
								<th>Tgl Daftar</th>
							</tr>
						</thead>

						<tbody>
							<?php

							$no = 1;
							while ($a = mysqli_fetch_assoc($query)) {

							?>

								<tr>
									<td><?php echo  $no; ?></td>

									<td><?php echo  $a['nama_warga']; ?></td>
									<td><?php echo  $a['email']; ?></td>
									<td><?php echo  $a['alamat']; ?></td>
									<td><?php echo  $a['no_telp']; ?></td>
									<td><?php echo  $a['tgl_daftar']; ?></td>
								</tr>
							<?php
								$no++;
							}
							?>

						</tbody>
					</table>
				</center>
			</div>



			</section>
	<?php }
}

// $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
// ob_end_clean();
// //Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just
// $mpdf->WriteHTML(utf8_encode($html));
// $mpdf->Output($nama_dokumen.".pdf" ,'I');
// exit; 
	?>