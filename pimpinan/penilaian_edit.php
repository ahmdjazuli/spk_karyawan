<?php 
	require('header-admin.php'); 
	require('../koneksi.php');

	$idpenilaian = $_GET['idpenilaian'];

	$dpenilaian = mysqli_query($koneksi, "SELECT * FROM penilaian
								INNER JOIN karyawan ON penilaian.nik = karyawan.nik
								INNER JOIN bobotkriteria ON penilaian.idbotbot = bobotkriteria.idbotbot WHERE idpenilaian='$idpenilaian'");
	$data = mysqli_fetch_array($dpenilaian);
?>
	<div class="container">
		<h2>Penilaian Data &raquo; Ubah Data</h2> <hr>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12 col-sm-12 col">
					<div class="input-group input-group-mb" style="max-width: 350px; margin:0 auto;">
						<div class="input-group-prepend">
							<span class="input-group-text">Nama Karyawan</span>
						</div>
							<select name="nik" class="form-control" required>
								<option value=""><?php echo $data['nama'] ?></option>
									<?php
										$karyawanny = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY nama ASC");
										while($bau = mysqli_fetch_array($karyawanny)) {
											?>
							    				<option value="<?= $bau[nik] ?>"><?= $bau['nama'] ?></option>
							    			<?php
										} 
									?>
							</select>
			  		</div>
			  		<div class="input-group input-group-mb" style="max-width: 350px; margin:20px auto;">
						<div class="input-group-prepend">
							<span class="input-group-text">Kriteria</span>
						</div>
							<select name="idbotbot" class="form-control" required>
								<option value=""><?php echo $data['kriteria'] ?></option>
									<?php
										$kriteriany = mysqli_query($koneksi, "SELECT * FROM bobotkriteria ORDER BY kriteria ASC");
										while($bau = mysqli_fetch_array($kriteriany)) {
											?>
							    				<option value="<?= $bau[idbotbot] ?>"><?= $bau['kriteria'] ?></option>
							    			<?php
										} 
									?>
							</select>
						</div>
			  		</div>
			  		<div class="input-group input-group-mb" style="max-width: 350px; margin:0px auto;">
						<div class="input-group-prepend">
							<span class="input-group-text">Nilai</span>
						</div>
							<input type="number" min="50" max="100" name="nilai" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['nilai']; ?>" required>
						</div>
			  		</div>
				</div>
			</div><br> <!-- penutup row -->
			<div class="form-group text-center">
			  	<button class="btn btn-secondary">
					<a href="penilaian_data.php" style="color:white; text-decoration: none"><i class="fas fa-arrow-left"></i> KEMBALI</a>
			  	</button>
			  	<input type="submit" name="editan" value="UBAH" class="btn btn-warning" style="color:white;">
			  </div>
		</form>
	</div> <!-- akhir container -->

	<?php 
		if (isset($_POST['editan'])) {
			$nik 		= $_POST['nik'];
			$idbotbot 	= $_POST['idbotbot'];
			$nilai 		= $_POST['nilai'];
				$update = mysqli_query($koneksi, "UPDATE penilaian SET nik = '$nik', idbotbot = '$idbotbot', nilai = '$nilai' WHERE idpenilaian = '$idpenilaian'");
				if($update){
					?>
						<script type="text/javascript">
							window.location.href="penilaian_data.php?pesan=ubah";
						</script>
					<?php 
				}else{
					?>
						<script type="text/javascript">
							window.location.href="penilaian_data.php?pesan=gagal";
						</script>
					<?php
				}
		}
	?>
	
<?php require('footer-admin.php'); ?>