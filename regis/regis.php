<?php
require '../function/function.php';	
if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
				document.location.href = '../index.php';
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}
 ?>
<!DOCTYPE html>
<html>
<head>
	      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Latihan5e</title>
	<style type="">
		.img {
			width: 100px;
		}
	</style>
</head>
<body>
	<div class="container">
<form action="" method="post">	

<?php if( isset($error)) : ?>
	<p style="color: red"> Username/Password anda Salah</p>
	<?php endif; ?>

<h2>Halaman Registrasi</h2>
<br>	
<br>	
<label for="username">Username:</label>
<input type="text" name="username" id="username">
<br>
<label for="password">Password:</label>
<input type="password" name="password" id="password">
<label for="password2">Konfirmasi Password :</label>
<input type="password" name="password2" id="password2">
<br>
<br>
<button class="btn" type="submit" name="register">Daftar</button>

</form>

</div>

      <script type="text/javascript" src="../js/materialize.min.js"></script></body>
</html>