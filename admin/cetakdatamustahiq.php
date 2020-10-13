<?php

include 'config/config.php';
// $nama_dokumen='Laporan Data Mustahiq'.date('d-f-y'); //Beri nama file PDF hasil.
// define('_MPDF_PATH','mpdf/');
// include(_MPDF_PATH . "mpdf.php");
// $mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
// ob_start();


if (isset($_POST['lihat'])) {
	$tglawal = $_POST['dateawal'];
	$tglakhir = $_POST['dateakhir'];
	// echo 	$tglawal='2018-07-01';
	// echo 	$tglakhir='2018-07-31';

	global $konek;

	$sql = "SELECT * FROM `mustahiq` WHERE `tgl_penyaluran` BETWEEN '$tglawal' AND '$tglakhir' ";
	$query = mysqli_query($konek, $sql) or die(mysqli_error($konek));

	// print_r($query);

	// $cek=mysqli_fetch_array($query);

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
			<center>Laporan Data Mustahiq</center>
		</h1>
		<center>Periode <?php echo "<b>" . $tglawal . "</b>" ?> sampai <?php echo "<b>" . $tglakhir . "</b>" ?></center>

		<center>PT Izakat Indonesia <br> Jl Kemang Raya Lantai 20 - Jakarta Selatan
			<br>
			<hr>
			Dicetak oleh Admin | Tanggal <?= date('d-F-Y') ?>



			<div class="well">
				<center>
					<table style="border-spacing:0px;" id="warga" class="table table-bordered">
						<thead>
							<tr>
								<th>Nomor</th>
								<th>Nama Mustahiq</th>
								<th>Nama Yayasan</th>
								<th>Alamat</th>
								<th>Jumlah Penyaluran Zakat</th>
								<th>Tgl Penyaluran</th>
								<th>Nama Amil</th>
							</tr>
						</thead>

						<tbody>
							<?php

							$no = 1;
							while ($a = mysqli_fetch_assoc($query)) {

							?>

								<tr>
									<td><?php echo  $no; ?></td>

									<td><?php echo  $a['nama_penerima']; ?></td>
									<td><?php echo  $a['nama_yayasan']; ?></td>
									<td><?php echo  $a['alamat']; ?></td>
									<td><?php echo  rupiah($a['jumlah_zakat']); ?></td>
									<td><?php echo  $a['tgl_penyaluran']; ?></td>
									<td><?php echo  $a['nama_admin']; ?></td>
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