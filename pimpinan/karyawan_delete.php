<?php
	require_once("../koneksi.php");
	$nik = $_REQUEST['nik'];

	mysqli_query($koneksi, "DELETE FROM karyawan WHERE nik='$nik'") or die(mysqli_error());
?>

<?php 
	header("location:karyawan_data.php?pesan=hapus");
?>