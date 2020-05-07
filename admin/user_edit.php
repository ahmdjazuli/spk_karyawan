<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
	$id = $_GET['id'];
	$user = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
	$data = mysqli_fetch_array($user);
		
?>
	<div class="container">
		<h2>Data User &raquo; Ubah Data</h2> <hr>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12 col-sm-12 col">
					<div class="input-group input-group-mb" style="max-width: 350px; margin:0 auto;">
						<div class="input-group-prepend">
							<span class="input-group-text">Nama Lengkap</span>
						</div>
							<input type="text" name="nama" maxlength="50" pattern="[A-Za-z\s]{10,50}" title="Hanya Karakter Huruf(10-50)" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['nama']; ?>" required>
						</div>
			  		</div>
			  		<div class="input-group input-group-mb" style="max-width: 350px; margin:20px auto;">
						<div class="input-group-prepend">
							<span class="input-group-text">Username</span>
						</div>
							<input type="text"  pattern="[A-Za-z0-9]{5,30}" title="Karakter Huruf/Angka(5-30)" name="username" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['username']; ?>" required>
						</div>
			  		</div>
			  		<div class="input-group input-group-mb" style="max-width: 350px; margin:0px auto;">
			  			<div class="input-group-prepend">
							<span class="input-group-text">Level</span>
						</div>
			  			<select name="level" class="form-control" required>
			  				<?php 
			  					if($data['level']==''){
			  						echo "<option value=''>-PILIH-</option>";
									echo "<option value='admin'>Admin</option>";
									echo "<option value='pimpinan'>Pimpinan</option>";
									echo "<option value='karyawan'>Karyawan</option>";
			  					}else if($data['level']=='admin'){
			  						echo "<option value='admin'>Admin</option>";
									echo "<option value='pimpinan'>Pimpinan</option>";
									echo "<option value='karyawan'>Karyawan</option>";
			  					}else if($data['level']=='pimpinan'){
									echo "<option value='pimpinan'>Pimpinan</option>";
			  						echo "<option value='admin'>Admin</option>";
									echo "<option value='karyawan'>Karyawan</option>";
			  					}else if($data['level']=='karyawan'){
									echo "<option value='karyawan'>Karyawan</option>";
									echo "<option value='pimpinan'>Pimpinan</option>";
			  						echo "<option value='admin'>Admin</option>";
			  					}
			  				?>
			  			</select>
			  		</div>
				</div>
			</div> <!-- penutup row -->
			<br>
			<div class="form-group text-center">
			  	<button class="btn btn-secondary">
					<a href="user_data.php" style="color:white; text-decoration: none"><i class="fas fa-arrow-left"></i> KEMBALI</a>
			  	</button>
			  	<input type="submit" name="editan" value="UBAH" class="btn btn-warning" style="color:white;">
			  </div>
		</form>
	</div> <!-- akhir container -->

<?php 
	if(isset($_POST['editan'])) {
		$nama 			= $_POST['nama'];
		$username 		= $_POST['username'];
		$level 			= $_POST['level'];
		$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND level='$level'");

		if(mysqli_num_rows($cek)>0){
			 ?>
				<script type="text/javascript">
					window.location.href="user_data.php?pesan=udahterdaftar";
				</script>
			<?php 
		}else{
			$update = mysqli_query($koneksi, "UPDATE user SET nama = '$nama', username = '$username', level = '$level' WHERE id = '$id'");
			?>
				<script type="text/javascript">
					window.location.href="user_data.php?pesan=ubah";
				</script>
			<?php
		}
	}
	require('footer-admin.php'); 
?>