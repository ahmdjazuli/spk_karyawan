<?php 
	require('../koneksi.php');

	$heyganteng = mysqli_query($koneksi,"SELECT * FROM penilaian INNER JOIN karyawan ON penilaian.nik = karyawan.nik INNER JOIN bobotkriteria ON penilaian.idbotbot = bobotkriteria.idbotbot");

	$json = [];
	while($baris=mysqli_fetch_array($heyganteng)){
		$json[] = [(string)$baris['nama'], (int)$baris['nilai']];
	}echo json_encode($json);
?>