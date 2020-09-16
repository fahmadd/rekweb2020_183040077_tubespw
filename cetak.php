<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'function/function.php';
$film = query("SELECT * From film_user");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html>
<head>
	<title>Daftar Film Rekomendasi</title>
</head>
<body>
<h1>Daftar Film Rekomendasi</h1>

<div class="">
	<table border="1" cellspacing="0" cellpadding="10">

	
	<form action="" method="post">
	</form>
			<tr class="card-panel teal lig">
				<th>No</th>
				<th>Judul Film</th>
				<th>Gambar</th>
				<th>Peran Utama</th>
				<th>Tahun Rilis</th>
				<th>Genre</th>
				<th>Sinopsis</th>
				<th>Rating</th>
			</tr>';
			$i = 1;
		foreach ($film as $nama) {
			$html .= '<tr>
				<td>'. $i++ .'</td>
				<td>'. $nama["Nama"] .'</td>
				<td><img src = "img/'. $nama["Gambar"] . '"></td>
				<td>'. $nama["Pemeran"] .'</td>
				<td>'. $nama["Tahun"] .'</td>
				<td>'. $nama["Genre"] .'</td>
				<td>'. $nama["Sinopsis"] .'</td>
				<td>'. $nama["Rating"] .'</td>
			</tr>';
		}
$html .=	'</table>
</body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output();

?>