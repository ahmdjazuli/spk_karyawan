<?php 
	require("../koneksi.php"); 
	require("header.php");
?>
  <body>
	<div class="container baru">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
				?>
					<script src="../js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Gagal Login!", "Username atau Password Tidak Sesuai!", "warning");
						} alert1();
					</script>
				<?php 
			}
		}
		?>
		<div class="jumbotron text-center" style="margin-top:40px;">
			<div class="row">
				<div class="col">
					<h4>LOGIN SEBAGAI ADMIN</h4>
					<h2>SPK PEGAWAI</h2>
					<img src="../img/logo-uniska-ok.png" width="150px"><br><br>
					<form action="cek_login.php" method="post">
						<div class="row" style="margin: 0 auto;">
							<div class="input-group input-group-mb" style="max-width: 350px; margin:0 auto;">
								<div class="input-group-prepend">
									<span class="input-group-text">Username</span>
								</div>
								<input type="text" name="username" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" maxlength="30" pattern="[A-Za-z]{5,30}" title="Hanya Karakter Huruf(5-30)" required autofocus>
							</div>
						</div>
						<div class="row" style="margin: 0 auto; margin-top: 10px;">
							<div class="input-group input-group-mb" style="max-width: 350px; margin:0 auto;">
								<div class="input-group-prepend">
									<span class="input-group-text">Password</span>
								</div>
								<input type="password" name="password" class="form-control" aria-label="Default" maxlength="30" pattern="[A-Za-z]{5,30}" title="Hanya Karakter Huruf(5-30)" aria-describedby="inputGroup-sizing-default" required>
							</div>
						</div>
						<input style="margin-top: 10px;" type="submit" class="btn btn-dark btn-md" value="LOGIN">
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
	require_once("footer.php");
?> 