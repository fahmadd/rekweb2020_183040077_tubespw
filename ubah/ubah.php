<?php
require '../function/function.php';

$no = $_GET["No"];
$film = query("SELECT * FROM film WHERE No = $no")[0];

if( isset($_POST["submit"]) ) {
	// var_dump($_POST); die;
	// var_dump($_FILES);
	// die;
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'ubah.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'ubah.php';
			</script>
		";
	}


}
if( isset($_POST["update"]) ) {

	if( update($_POST) > 0 ) {

		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = '../admin/admin.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'ubah.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<h1>Update film</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="No" value="<?= $film["No"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $film["Gambar"]; ?>">
		<ul>
			<li>
				<label for="Nama">Nama : </label>
				<input type="text" name="Nama" id="Nama" required value="<?= $film["Nama"]; ?>">
			</li>
			<li>
				<label for="Pemeran">Pemeran :</label>
				<input type="text" name="Pemeran" id="Pemeran" value="<?= $film["Pemeran"]; ?>">
			</li>
			<li>
				<label for="Tahun">Tahun :</label>
				<input type="text" name="Tahun" id="Tahun" value="<?= $film["Tahun"]; ?>">
			</li>
			<li>
				<label for="Genre">Genre :</label>
				<input type="text" name="Genre" id="Genre" value="<?= $film["Genre"]; ?>">
			</li>
				<li>
				<label for="Genre">Sinopsis :</label>
				<input type="text" name="Sinopsis" id="Sinopsis" value="<?= $film["Sinopsis"]; ?>">
			</li>
			<li>
			<label for="Rating">Rating :</label>
			<input type="text" name="Rating" id="Rating" value="<?= $film["Rating"]; ?>">
		    </li>
			<li>
				<label for="Gambar">Gambar : </label><br>
				<img src="../img/<?= $film['Gambar']; ?>" width = 150px> <br>
				<input type="file" name="Gambar" id="Gambar"><br>
			</li><br>
			<li>
				<button class="btn waves-effect waves-light" type="submit" name="submit">UBAH
    			<i class="material-icons right">all_inclusive</i>
  				</button>
  				<button class="btn blue waves-effect waves-light" type="update" name="update">UPDATE	
    			<i class="material-icons right">all_inclusive</i>
  				</button>
			</li>
		</ul>

	</form>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>