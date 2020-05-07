<?php 
session_start();
	require('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='' rel='icon' type='image/x-icon'/>
  <title>SPK Karyawan</title>
  <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.min.css.map">
  <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap-grid.min.css.map">
  <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap-reboot.min.css.map">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
     <a href="" class="navbar-brand">
      <img id="logoBrand" src="img/cinta.jpg" width="35px"></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./"><i class="fas fa-home"></i> <b>HOME</b><span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
     <a href="#" data-toggle="modal" data-target="#masuk"><b style="color: white">LOGIN</b></a>
    </form>
</nav>

    <div id="masuk" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">MASUK SEBAGAI...</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form action="loginuy.php" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" pattern="[A-Za-z0-9]{5,30}" title="Karakter Huruf/Angka(5-30)" name="username" placeholder="Username" class="form-control" required />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" pattern="[A-Za-z0-9]{5,30}" title="Karakter Huruf/Angka(5-30)" name="password" placeholder="Password" class="form-control" required/>
              </div>
              <div class="form-group">
                <label for="level2">level</label>
                <select name="pilihlogin" class="form-control" required>
                    <option value="">-PILIH-</option>
                    <option value="pimpinan">Pimpinan</option>
                    <option value="karyawan">Karyawan</option>
                </select>
              </div>
              <div class="text-left">
                <button class="btn btn-info" type="submit" name="login">LOGIN</button>
                <button class="btn btn-dark" type="reset">RESET</button>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<br><br><br><br>