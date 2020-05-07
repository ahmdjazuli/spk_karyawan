<?php
  session_start();
  require_once("koneksi.php");
  
  if(isset($_POST['login']) ){
  $username       = $_REQUEST['username'];
  $pilihlogin     = $_REQUEST['pilihlogin'];
  $pass           = $_REQUEST['password'];

  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

  $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND level='$pilihlogin'");

    if(mysqli_num_rows($cek)==1){
        $user  = mysqli_fetch_assoc($query);
        if($pilihlogin == 'pimpinan'){
            if(password_verify($pass, $user['password'])){
                $_SESSION['username'] = $username;
                $_SESSION['pilihlogin'] = "pimpinan";
                header("location:pimpinan/index.php");
            }else{
                header("location:index.php?pesan=gagal");
            }
        }if($pilihlogin == 'karyawan'){
            if(password_verify($pass, $user['password'])){
                $_SESSION['username'] = $username;
                $_SESSION['pilihlogin'] = "karyawan";
                header("location:karyawan/index.php");
            }else{
                header("location:index.php?pesan=gagal");
            }
        }
    }else{
        header("location:index.php?pesan=tidaksesuai");
    }
  } //akhir if post 
?>