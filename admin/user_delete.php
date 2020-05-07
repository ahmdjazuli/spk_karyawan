<?php
	require_once("../koneksi.php");
	$id = $_REQUEST['id'];

	mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'") or die(mysqli_error());
?>

<?php 
	header("location:user_data.php?pesan=hapus");
?>