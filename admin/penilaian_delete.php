<?php
	require_once("../koneksi.php");
	$id = $_REQUEST['idpenilaian'];

	mysqli_query($koneksi, "DELETE FROM penilaian WHERE idpenilaian='$id'") or die(mysqli_error());
?>

<?php 
	header("location:penilaian_data.php?pesan=hapus");
?>