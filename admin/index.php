<?php 
  session_start(); 
  require_once('header-admin.php');
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
?>

<div class="container">
    <div class="jumbotron text-center">
      <img src="../img/boyoung.jpg" width="180px" style="border-radius: 100%"> <br>
      Halo, <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>. <h2>Selamat Datang kembali! Kangen kammuu :b</h2><hr>
      <div class="row">
      <div class="col text-center">
        <h6 class="text-left">1. Silahkan pilih <b>MENU</b> yang tersedia pada bagian atas Navigasi.</h6>
        <h6 class="text-left">2. Bosen? ingin Keluar sebagai <b>Admin</b>, klik tombol "LOGOUT".</h6>
      </div>
    </div>
    </div>
  </div>

<?php 
  require_once("footer-admin.php");
?>