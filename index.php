<?php 	
require 'function/function.php';
$film = query("SELECT * From film");

if( isset($_POST["cari"]) ) {
	$film = cari($_POST["keyword"]);
}
 ?>



<!DOCTYPE html>
  <html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
		.gambar {
			width: 100px;
			height: 150px;
		}

		@media print {
			.login1 {
				display: none;
			}
		}

	</style>
      <title>Daftar Film yang disarankan untuk ditonton</title>
    </head>
<div class="navbar-fixed">
    <body>
	  <nav>
    <div class="nav-wrapper black">
      <ul class="login1">
        <li class="right"><a href="login/login.php" class="waves-effect waves-light btn">Login Admin<i class="material-icons right">account_circle</i></a></li>
        <li class="right"><a href="login/login2.php" class="waves-effect waves-light btn">Login User<i class="material-icons right">account_circle</i></a></li>	
         <li class="right"><a href="cetak.php">Cetak PDF</a></li>
      </ul>

    </div>
  </nav>
</div>
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="img/jw3.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>John Wick Chapter 3</h3>
          <h5 class="light grey-text text-lighten-3">17 Mei 2019</h5>
        </div>
      </li>
      <li>
        <img src="img/mlm.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3>Malam Jumat The Movie</h3>
          <h5 class="light grey-text text-lighten-3">16 Mei 2019</h5>
        </div>
      </li>
      <li>
        <img src="img/gd1.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3>Godzilla King Of The Monsters 2019</h3>
          <h5 class="light grey-text text-lighten-3">29 Mei 2019</h5>
        </div>
      </li>
      <li>
        <img src="img/ff.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>Fast & Furious Presents: Hobbs & Shaw</h3>
          <h5 class="light grey-text text-lighten-3">1 Agustus 2019</h5>
        </div>
      </li>
    </ul>
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
				<?php $i = 1; ?>
				<?php foreach($film as $nama) : ?>
			<td align="center"><?= $nama["No"]; ?></td>
 			<td><?= $nama["Nama"]; ?></td>
 			<td><img class="gambar" src="img/<?= $nama["Gambar"]; ?>"></td>
 			<td><?= $nama["Pemeran"]; ?></td>
 			<td><?= $nama["Tahun"]; ?></td>
 			<td><?= $nama["Genre"]; ?></td>
 			<td><?= $nama["Sinopsis"]; ?></td>
 			 <td><?= $nama["Rating"]; ?></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
</table>
</div>




      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
      	        const slider = document.querySelectorAll('.slider');
        M.Slider.init(slider, {
        	indicators: false,
        	height : 750,
        	interval:2000
        });
      </script>
    </body>
  </html>
        