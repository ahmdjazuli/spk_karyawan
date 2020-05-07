<?php 
  session_start(); 
  require_once('header-karyawan.php');
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
?>

<div class="container">
    <div class="jumbotron text-center">
      <img src="../img/cinta2.jpg" width="180px" style="border-radius: 100%"> <br>
      Halo, <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>. <h2>Selamat Datang Mantan!</h2><hr>
      <div class="row">
      <div class="col text-center">
        <h6 class="text-left">1. Silahkan pilih <b>MENU</b> yang tersedia pada bagian atas Navigasi.</h6>
        <h6 class="text-left">2. Apabila ingin Keluar sebagai <b>User</b>, klik tombol "LOGOUT".</h6>
      </div>
    </div>
    </div>
  </div>

<?php 
  require_once("footer-karyawan.php");
?>