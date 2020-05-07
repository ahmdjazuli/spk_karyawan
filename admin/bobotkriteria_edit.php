<?php 
	require('header-admin.php'); 
	require('../koneksi.php');

	$idbotbot = $_GET['idbotbot'];
	$datakaryawan = mysqli_query($koneksi, "SELECT * FROM bobotkriteria WHERE idbotbot='$idbotbot'");
	$data = mysqli_fetch_array($datakaryawan);
?>
	<div class="container">
		<h2>Bobot & Kriteria &raquo; Ubah Data</h2> <hr>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12 col-sm-12 col">
					<div class="input-group input-group-mb" style="max-width: 350px; margin:0 auto;">
						<div class="input-group-prepend">
							<span class="input-group-text">Kriteria</span>
						</div>
							<input type="text" name="kriteria" maxlength="30" pattern="[A-Za-z\s]{8,30}" title="Hanya Karakter Huruf(8-30)" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['kriteria']; ?>" required>
						</div>
			  		</div>
			  		<div class="input-group input-group-mb" style="max-width: 350px; margin:20px auto;">
						<div class="input-group-prepend">
							<span class="input-group-text">Bobot</span>
						</div>
							<input type="number" max="1" step="0.1" name="bobot" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['bobot']; ?>" required>
						</div>
			  		</div>
				</div>
			</div> <!-- penutup row -->
			<div class="form-group text-center">
			  	<button class="btn btn-secondary">
					<a href="bobotkriteria_data.php" style="color:white; text-decoration: none"><i class="fas fa-arrow-left"></i> KEMBALI</a>
			  	</button>
			  	<input type="submit" name="editan" value="UBAH" class="btn btn-warning" style="color:white;">
			  </div>
		</form>
	</div> <!-- akhir container -->

	<?php 
		if (isset($_POST['editan'])) {
			$kriteria 	= $_POST['kriteria'];
			$bobot 		= $_POST['bobot'];

			$cek = mysqli_query($koneksi, "SELECT * FROM bobotkriteria WHERE kriteria='$kriteria'");
			if(mysqli_num_rows($cek)>0){
				?>
					<script type="text/javascript">
						window.location.href="bobotkriteria_data.php?pesan=udahada";
					</script>
				<?php
			}else{
				$update = mysqli_query($koneksi, "UPDATE bobotkriteria SET kriteria = '$kriteria', bobot = '$bobot' WHERE idbotbot = '$idbotbot'");
				?>
					<script type="text/javascript">
						window.location.href="bobotkriteria_data.php?pesan=ubah";
					</script>
				<?php 
			}	
		}
	?>
	
<?php require('footer-admin.php'); ?>