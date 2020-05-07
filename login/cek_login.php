<?php 
session_start();
require_once("../koneksi.php");

	$username 	= $_REQUEST['username'];
	$pass 		= $_REQUEST['password'];

	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
	$user  = mysqli_fetch_assoc($query);
	
	if(password_verify($pass, $user['password'])){
		if($user['level']=="admin"){
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
			header("location:../admin/index.php");
		}else if($user['level']=="karyawan"){
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "karyawan";
			header("location:../karyawan/index.php");
		}		
	}else{
		header("location:index.php?pesan=gagal");
	}				
?>