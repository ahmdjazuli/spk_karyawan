<?php
	$koneksi = mysqli_connect('localhost', 'root', '', 'spk_pegawai') or die ("Koneksi Gagal");

	if(isset($_POST['add'])){
		$total = $_POST['total'];

		for($i=1; $i<=$total; $i++){
			$nik 		= $_REQUEST['nik-'.$i];
			$idbotbot 	= $_REQUEST['idbotbot-'.$i];
			$nilai 		= $_REQUEST['nilai-'.$i];
			$cek = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE nik='$nik' && idbotbot='$idbotbot'");
			if(mysqli_num_rows($cek)>0){
				header("location:input_penilaian.php?pesan=sudahada");
			}else{
				$tambah = "INSERT INTO penilaian (nik, idbotbot, nilai) VALUES ('$nik','$idbotbot', $nilai)";
				$hasil = mysqli_query($koneksi, $tambah);
				header("location:input_penilaian.php?pesan=simpan");
			}
		}
	}
	
	mysqli_close($koneksi);
?>