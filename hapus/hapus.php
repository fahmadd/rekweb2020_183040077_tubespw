<?php 
require '../function/function.php';

$No = $_GET["No"];

if( hapus($No) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = '../admin/admin.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = '../admin/admin.php';
		</script>
	";
}

?>