<?php
  require_once("../koneksi.php");
  
  if(isset($_POST['simpan']) ){
  $username  = $_REQUEST['username'];
  $nama     = $_REQUEST['nama'];
  $level     = $_REQUEST['level'];
  $pass      = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);

  $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND level='$level'");

    if(mysqli_num_rows($cek)>0){
        header("location:user_data.php?pesan=udahterdaftar");
    }else{
        $tambah = mysqli_query($koneksi,"INSERT INTO user(nama,username,password,level) VALUES ('$nama','$username','$pass','$level')");
        header("location:user_data.php?pesan=berhasiltambah");
    }
  } //akhir if post 
?>