<?php
	require_once("../koneksi.php");
	$id = $_REQUEST['idbotbot'];

	mysqli_query($koneksi, "DELETE FROM bobotkriteria WHERE idbotbot='$id'") or die(mysqli_error());
?>

<?php 
	header("location:bobotkriteria_data.php?pesan=hapus");
?>