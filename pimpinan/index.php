<?php 
  session_start(); 
  require_once('header-admin.php');
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
?>

<div class="container">
    <div class="jumbotron text-center">
      <img src="../img/welcome.jpg" width="180px" style="border-radius: 100%"> <br>
      Halo, <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b>pimpinan</b>. <h2>Selamat Datang! dan Sampai Jumpa:(</h2><hr>
      <div class="row">
      <div class="col text-center">
        <h6 class="text-left">1. Silahkan pilih <b>MENU</b> yang tersedia pada bagian atas Navigasi.</h6>
        <h6 class="text-left">2. Bosen? ingin Keluar sebagai <b>pimpinan</b>, klik tombol "LOGOUT".</h6>
      </div>
    </div>
    </div>
  </div>

<?php 
  require_once("footer-admin.php");
?>