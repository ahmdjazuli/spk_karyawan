<?php 
  require('../koneksi.php');
  error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='' rel='icon' type='image/x-icon'/>
  <title>SPK Karyawan</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap.min.css.map">
  <link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap-grid.min.css.map">
  <link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap-reboot.min.css.map">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
     <a href="" class="navbar-brand">
      <img id="logoBrand" src="../img/cinta.jpg" width="35px"></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./"><i class="fas fa-home"></i> HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a href="karyawan_data.php" class="nav-item nav-link"><i class="fas fa-user"></i><b> DATA KARYAWAN</b></a>
      </li>
      <li class="nav-item">
        <a href="bobotkriteria_data.php" class="nav-item nav-link"><i class="fas fa-cubes"></i><b> BOBOT & KRITERIA</b></a>
      </li>
      <li class="nav-item">
        <a href="penilaian_data.php" class="nav-item nav-link"><i class="fas fa-star"></i><b> PENILAIAN</b></a>
      </li>
      <li class="nav-item">
        <a href="hasil_analisa.php" class="nav-item nav-link"><i class="fas fa-info-circle"></i><b> HASIL ANALISA</b></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <ul class="nav nav-pills">
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria=expanded="false" style="color:white"><b>Halo, <?php echo $_SESSION['username']; ?></b></a>
        <div class="dropdown-menu">
          <a href="../logout.php" class="dropdown-item">LOGOUT</a>
        </div>
      </li>
     </ul>
    </form>
</nav>
<br><br><br><br>
    <div id="buatakun" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">DAFTAR AKUN BARU</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form action="buatakun.php" method="post">
              <div class="form-group">
                <label for="username">Nama Lengkap</label>
                <input type="text" name="nama" maxlength="50" pattern="[A-Za-z\s]{10,50}" title="Hanya Karakter Huruf(10-50)" placeholder="Nama Lengkap" class="form-control" required />
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" maxlength="30" pattern="[A-Za-z0-9]{5,30}" title="Karakter Huruf/Angka(5-30)" placeholder="Username" class="form-control" required />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" maxlength="30" pattern="[A-Za-z0-9]{5,30}" title="Karakter Huruf/Angka(5-30)" placeholder="Password" class="form-control" required />
              </div>
              <div class="form-group">
                <label for="level">Level</label>
                <select name="level" required class="form-control">
                  <option value=''>- PILIH -</option>
                  <option value='admin'>ADMIN</option>
                  <option value='pimpinan'>PIMPINAN</option>
                  <option value='karyawan'>KARYAWAN</option>
                </select>
              </div>
              <div class="text-right">
                <button class="btn btn-primary" type="submit" name="simpan">BUAT AKUN</button>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->