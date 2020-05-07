<?php
	$koneksi = mysqli_connect('localhost', 'root', '', 'spk_pegawai') or die ("Koneksi Gagal");

	if(isset($_POST['add'])){
		$total = $_POST['total'];

		for($i=1; $i<=$total; $i++){
			$kriteria 	= $_REQUEST['kriteria-'.$i];
			$bobot 		= $_REQUEST['bobot-'.$i];
			$tes = mysqli_query($koneksi, "SELECT kriteria FROM bobotkriteria WHERE kriteria='$kriteria'");
			if(mysqli_num_rows($tes)>0){
				header("location:input_bobotkriteria.php?pesan=kriteriasama");
			}else{
				$tambah = "INSERT INTO bobotkriteria (kriteria, bobot) VALUES ('$kriteria','$bobot')";
				$hasil = mysqli_query($koneksi, $tambah);
				header("location:input_bobotkriteria.php?pesan=simpan");
			}
		}
	}
	
	mysqli_close($koneksi);
?>