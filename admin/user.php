<?php 	
require '../function/function.php';
$film = query("SELECT * From film");

if( isset($_POST["cari"]) ) {
	$film = cari($_POST["keyword"]);
}
 ?>



<!DOCTYPE html>
  <html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
		.gambar {
			width: 100px;
			height: 150px;
		}


	</style>
      <title>Welcome Back</title>
    </head>
<div>
    <body>
	  <nav>
    <div class="nav-wrapper black">
      <ul class="">
      	<li class="right"><a href = "../index.php" class="waves-effect waves-light btn red">Logout</a></li>
      	<li class="right"><a href= "../tambah/tambah_user.php" class="waves-effect waves-light btn">Saran Film?</a></li>
      	<li class="right"><a href="cetak.php">Cetak PDF</a></li>
      </ul>
    </div>
  </nav>
</div>
<div class="">
	<ul>
	    <form action="" method="post">
        <li><input class="white-text" type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off"></li>
		<li><button type="submit" name="cari" class="btn">Cari!</button></li>
		</form>
	</ul>
</div>

<div class="">
	<table border="1" cellspacing="0" cellpadding="10">

			<tr class="card-panel teal lig">
				<th>No</th>
				<th>Judul Film</th>
				<th>Gambar</th>
				<th>Peran Utama</th>
				<th>Tahun Rilis</th>
				<th>Genre</th>
				<th>Sinopsis</th>
				<th>Rating</th>
			</tr>
						<tr>
				<?php if(empty($film)) : ?>
					<tr>
						<td>
							<h1 class="center">Data Tidak Ditemukan</h1>
						</td>
					</tr>
				<?php 	endif; ?>
			</tr>
			<tr>
				<?php foreach($film as $nama) : ?>
			<td align="center"><?= $nama["No"]; ?></td>
 			<td><?= $nama["Nama"]; ?></td>
 			<td><img class="gambar" src="../img/<?= $nama["Gambar"]; ?>"></td>
 			<td><?= $nama["Pemeran"]; ?></td>
 			<td><?= $nama["Tahun"]; ?></td>
 			<td><?= $nama["Genre"]; ?></td>
 			<td><?= $nama["Sinopsis"]; ?></td>
 			<td><?= $nama["Rating"]; ?></td>
			</tr>
		<?php endforeach; ?>
</table>
</div>




      <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
  </html>
        