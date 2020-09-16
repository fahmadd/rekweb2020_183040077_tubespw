<?php 	

require '../function/function.php';

if( isset($_POST["submit"]) ) {

	if( tambah($_POST) > 0 ) {

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
				document.location.href = '../admin/admin.php';
			</script>
		";
	}


}

 ?>



<!--  -->




<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data BARU</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	<ul>
		<li>
			<label for="Nama">Nama :</label>
			<input type="text" name="Nama" id="Nama" required>
		</li>
		<li>
			<label for="Pemeran">Pemeran :</label>
			<input type="text" name="Pemeran" id="Pemeran">
		</li>
		<li>
			<label for="Tahun">Tahun :</label>
			<input type="text" name="Tahun" id="Tahun">
		</li>
		<li>
			<label for="Genre">Genre :</label>
			<input type="text" name="Genre" id="Genre">
		</li>
		<li>
			<label for="Sinopsis">Sinopsis :</label>
			<input type="text" name="Sinopsis" id="Sinopsis">
		</li>
		<li>
			<label for="Rating">Rating :</label>
			<input type="text" name="Rating" id="Rating">
		</li>
		<li>
			<label for="Gambar">Gambar :</label>
			<input type="file" name="Gambar" id="Gambar">
		</li>
	</ul>

<button class="btn waves-effect waves-light" type="submit" name="submit">Submit
    <i class="material-icons right">send</i>
  </button>




</form>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>