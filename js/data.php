<?php 
	
	$dbhost = 'localhost';
	$dbname = 'spk_pegawai';
	$dbuser = 'root';
	$dbpass = '';

	try{
		$dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $ex){
		die($ex->getMessage());
	}

	$stmt=$dbcon->prepare("SELECT * FROM bobotkriteria");
	$stmt->execute();
	$json = [];
	while($baris=$stmt->fetch(PDO::FETCH_ASSOC)){
		extract($baris);
		$json[]= [(string)$kriteria, (float)$bobot];
	}
	echo json_encode($json);
?>