<?php
$conn = mysqli_connect("localhost", "root", "", "daftar_film");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $nama = mysqli_fetch_assoc($result) ) {
		$rows[] = $nama;
	}
	return $rows;
}
function tambah($data) {
	global $conn;
	
	$Nama = htmlspecialchars($data["Nama"]);
	$Gambar = upload();
	if( !$Gambar ) {
		return false;
	}
	$Pemeran = htmlspecialchars($data["Pemeran"]);
	$Tahun = htmlspecialchars($data["Tahun"]);
	$Genre = htmlspecialchars($data["Genre"]);
	$Sinopsis = htmlspecialchars($data["Sinopsis"]);
	$Rating = htmlspecialchars($data["Rating"]);


	$query = "INSERT INTO film
				VALUES
			  ('', '$Nama', '$Gambar', '$Pemeran', '$Tahun', '$Genre', '$Sinopsis', '$Rating')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['Gambar']['name'];
	$ukuranFile = $_FILES['Gambar']['size'];
	$error = $_FILES['Gambar']['error'];
	$tmpName = $_FILES['Gambar']['tmp_name'];


	if ($error === 4) {
	echo "<script>
			alert('pilih gambar terlebih dahulu!');
			</script>";
			return false;
	}

	$ekstensi = ['jpg', 'jpeg' , 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensi) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;


	move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

	return $namaFileBaru;


}

function hapus($No) {
	global $conn;
	mysqli_query($conn, "DELETE FROM film WHERE No = $No");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;
	$No = $data["No"];
	$Nama = htmlspecialchars($data["Nama"]);
	$gambarLama=htmlspecialchars($data["gambarLama"]);
	if ($_FILES['Gambar']['error'] === 4) {
		$Gambar = $gambarLama;
	} else {
		$Gambar = upload();
	}
	$Pemeran = htmlspecialchars($data["Pemeran"]);
	$Tahun = htmlspecialchars($data["Tahun"]);
	$Genre = htmlspecialchars($data["Genre"]);
	$Sinopsis = htmlspecialchars($data["Sinopsis"]);
	$Rating = htmlspecialchars($data["Rating"]);
	$query = "UPDATE film SET
				Nama = '$Nama',
				Gambar = '$Gambar',
				Pemeran = '$Pemeran',
				Tahun = '$Tahun',
				Genre = '$Genre',
				Sinopsis = '$Sinopsis',
				Rating = '$Rating'
			  WHERE No = $No
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function update($data) {
	global $conn;
	$No = $data["No"];
	$Nama = htmlspecialchars($data["Nama"]);
	$gambarLama=htmlspecialchars($data["gambarLama"]);
	if ($_FILES['Gambar']['error'] === 4) {
		$Gambar = $gambarLama;
	} else {
		$Gambar = upload();
	}
	$Pemeran = htmlspecialchars($data["Pemeran"]);
	$Tahun = htmlspecialchars($data["Tahun"]);
	$Genre = htmlspecialchars($data["Genre"]);
	$Sinopsis = htmlspecialchars($data["Sinopsis"]);
	$Rating = htmlspecialchars($data["Rating"]);
	$query = "INSERT INTO film_user
				VALUES
			  ('', '$Nama', '$Gambar', '$Pemeran', '$Tahun', '$Genre', '$Sinopsis', '$Rating')
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function cari($keyword) {
	$query = "SELECT * FROM film
				WHERE
			  Nama LIKE '%$keyword%' OR
			  Pemeran LIKE '%$keyword%' OR
			  Tahun LIKE '%$keyword%' OR
			  Genre LIKE '%$keyword%'
			";
	return query($query);
}
function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}

	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}
	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);
}
?>