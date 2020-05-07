<?php
	$koneksi = mysqli_connect('localhost', 'root', '', 'spk_pegawai') or die ("Koneksi Gagal");

	if(isset($_POST['add'])){
		$total = $_POST['total'];

		for($i=1; $i<=$total; $i++){
			$nik 	= $_REQUEST['nik-'.$i];
			$nm 	= $_REQUEST['nama-'.$i];
			$tl 	= $_REQUEST['tempatlahir-'.$i];
			$ttl 	= $_REQUEST['tanggallahir-'.$i];
			$al 	= $_REQUEST['alamat-'.$i];
			$nt     = $_REQUEST['notelp-'.$i];
			$jb     = $_REQUEST['jabatan-'.$i];
			$st     = $_REQUEST['status-'.$i];

			$cek = mysqli_query($koneksi, "SELECT nik FROM karyawan WHERE nik='$nik'");
			if(mysqli_num_rows($cek)>0){
				header("location:input_datakaryawan.php?pesan=datanik");
			}else{
				$tambah = "INSERT INTO karyawan (nik,nama,tempat_lahir,tanggal_lahir,alamat,no_telepon,jabatan,status) VALUES ('$nik','$nm','$tl','$ttl','$al','$nt','$jb','$st')";
				$hasil = mysqli_query($koneksi, $tambah);
				header("location:input_datakaryawan.php?pesan=simpan");
			}
		}
	}
	
	mysqli_close($koneksi);
?>