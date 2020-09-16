<?php
require '../function/function.php';

if( isset($_POST["Login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if( mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			header("Location: ../admin/user.php");
			exit;
		}
			
	}
	$error = true;
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

<img src="../img/user.png" class="img">
<br>	
<br>	
<label for="username">Username:</label>
<input type="text" name="username" id="username">
<br>
<label for="password">Password:</label>
<input type="password" name="password" id="password">
<a href="../regis/regis.php">Register Here</a>
<br>
<br>
<button class="btn" type="submit" id = "Login" name="Login">Login</button>

</form>

</div>

      <script type="text/javascript" src="../js/materialize.min.js"></script></body>
</html>