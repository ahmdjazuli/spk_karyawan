<?php 
	require('header-admin.php'); 
	require('../koneksi.php');

	$nik = $_GET['nik'];
	$datakaryawan = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");
	$data = mysqli_fetch_array($datakaryawan);
?>
	<div class="container">
		<h2>Data Karyawan &raquo; Ubah Data</h2> <hr>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-2 col-sm-6 col">
					<div class="form-group">
						<label>NIK</label>
			  		</div>
					<div class="form-group">
						<label>NAMA</label>
					</div>
					<div class="form-group">
						<label>TEMPAT LAHIR</label>
					</div>
					<div class="form-group">
						<label>TANGGAL LAHIR</label>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col">
					<div class="form-group">
			    		<input type="text" class="form-control" maxlength="16" pattern="[0-9]{16}" name="nik" title="Hanya Karakter Angka(16)" value="<?php echo $data['nik']; ?>" required disabled>
			  		</div>
			  		<div class="form-group">
			    		<input type="text" class="form-control" maxlength="100" pattern="[A-Za-z\s]{8,100}" title="Hanya Karakter Huruf(8-100)" name="nama" value="<?php echo $data['nama']; ?>" required>
			  		</div>
			  		<div class="form-group">
			    		<input type="text" maxlength="100" pattern="[A-Za-z\s]{8,100}" title="Hanya Karakter Huruf(8-100)" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" required>
			  		</div>
			  		<div class="form-group">
			    		<input type="date" min="1990-01-01" max="2000-01-01" class="form-control" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required>
			  		</div>
				</div>

				<div class="col-md-1"></div>

				<div class="col-md-2 col-sm-6 col">
					<div class="form-group">
						<label>ALAMAT</label>
			  		</div>
					<div class="form-group">
						<label>NO. TELP</label>
					</div>
					<div class="form-group">
						<label>JABATAN</label>
					</div>
					<div class="form-group">
						<label>STATUS</label>
			  		</div>
				</div>

				<div class="col-md-3 col-sm-6 col">
					<div class="form-group">
			  			<input type="text" class="form-control" pattern="[A-Za-z0-9\s]{8,100}" title="Angka/Huruf(8-100)" name="alamat" value="<?php echo $data['alamat']; ?>" required>
			  		</div>
			  		<div class="form-group">
			  			<input type="text" class="form-control" maxlength="15" pattern="[0-9]{11,15}" title="Angka tanpa +62" name="no_telepon" value="<?php echo $data['no_telepon']; ?>" required>
			  		</div>
			  		<div class="form-group">
						<select name="jabatan" class="form-control" required>
						<?php 
							if($data['jabatan'] == ""){
								echo "<option value=''>-PILIH-</option>";
								echo "<option value='Content Writer'>Content Writer</option>";
								echo "<option value='Interior Design'>Interior Design</option>";
								echo "<option value='Product Specialis'>Product Specialis</option>";
								echo "<option value='Chanel Management Staff'>Chanel Management Staff</option>";
								echo "<option value='Project Officer'>Project Officer</option>";
								echo "<option value='Public Communication'>Public Communication</option>";
								echo "<option value='Front End Developer'>Front End Developer</option>";
								echo "<option value='Digital Marketing'>Digital Marketing</option>";
								echo "<option value='Translator Mandarin'>Translator Mandarin</option>";
								echo "<option value='Sales Support'>Sales Support</option>";
								echo "<option value='Sales Promotion'>Sales Promotion</option>";
							}else if($data['jabatan'] == "Content Writer"){
								echo "<option value='Interior Design'>Interior Design</option>";
								echo "<option value='Product Specialis'>Product Specialis</option>";
								echo "<option value='Chanel Management Staff'>Chanel Management Staff</option>";
								echo "<option value='Project Officer'>Project Officer</option>";
								echo "<option value='Public Communication'>Public Communication</option>";
								echo "<option value='Front End Developer'>Front End Developer</option>";
								echo "<option value='Digital Marketing'>Digital Marketing</option>";
								echo "<option value='Translator Mandarin'>Translator Mandarin</option>";
								echo "<option value='Sales Support'>Sales Support</option>";
								echo "<option value='Sales Promotion'>Sales Promotion</option>";
							}else if($data['jabatan'] == "Interior Design"){
								echo "<option value='Content Writer'>Content Writer</option>";
								echo "<option value='Product Specialis'>Product Specialis</option>";
								echo "<option value='Chanel Management Staff'>Chanel Management Staff</option>";
								echo "<option value='Project Officer'>Project Officer</option>";
								echo "<option value='Public Communication'>Public Communication</option>";
								echo "<option value='Front End Developer'>Front End Developer</option>";
								echo "<option value='Digital Marketing'>Digital Marketing</option>";
								echo "<option value='Translator Mandarin'>Translator Mandarin</option>";
								echo "<option value='Sales Support'>Sales Support</option>";
								echo "<option value='Sales Promotion'>Sales Promotion</option>";
							}else if($data['jabatan'] == "Product Specialis"){
								echo "<option value='Chanel Management Staff'>Chanel Management Staff</option>";
								echo "<option value='Content Writer'>Content Writer</option>";
								echo "<option value='Interior Design'>Interior Design</option>";
								echo "<option value='Project Officer'>Project Officer</option>";
								echo "<option value='Public Communication'>Public Communication</option>";
								echo "<option value='Front End Developer'>Front End Developer</option>";
								echo "<option value='Digital Marketing'>Digital Marketing</option>";
								echo "<option value='Translator Mandarin'>Translator Mandarin</option>";
								echo "<option value='Sales Support'>Sales Support</option>";
								echo "<option value='Sales Promotion'>Sales Promotion</option>";
							}else if($data['jabatan'] == "Chanel Management Staff"){
								echo "<option value='Product Specialis'>Product Specialis</option>";
								echo "<option value='Content Writer'>Content Writer</option>";
								echo "<option value='Interior Design'>Interior Design</option>";
								echo "<option value='Project Officer'>Project Officer</option>";
								echo "<option value='Public Communication'>Public Communication</option>";
								echo "<option value='Front End Developer'>Front End Developer</option>";
								echo "<option value='Digital Marketing'>Digital Marketing</option>";
								echo "<option value='Translator Mandarin'>Translator Mandarin</option>";
								echo "<option value='Sales Support'>Sales Support</option>";
								echo "<option value='Sales Promotion'>Sales Promotion</option>";
							}else if($data['jabatan'] == "Project Officer"){
								echo "<option value='Product Specialis'>Product Specialis</option>";
								echo "<option value='Content Writer'>Content Writer</option>";
								echo "<option value='Interior Design'>Interior Design</option>";
								echo "<option value='Chanel Management Staff'>Chanel Management Staff</option>";
								echo "<option value='Public Communication'>Public Communication</option>";
								echo "<option value='Front End Developer'>Front End Developer</option>";
								echo "<option value='Digital Marketing'>Digital Marketing</option>";
								echo "<option value='Translator Mandarin'>Translator Mandarin</option>";
								echo "<option value='Sales Support'>Sales Support</option>";
								echo "<option value='Sales Promotion'>Sales Promotion</option>";
							}else if($data['jabatan'] == "Public Communication"){
								echo "<option value='Product Specialis'>Product Specialis</option>";
								echo "<option value='Content Writer'>Content Writer</option>";
								echo "<option value='Interior Design'>Interior Design</option>";
								echo "<option value='Chanel Management Staff'>Chanel Management Staff</option>";
								echo "<option value='Project Officer'>Project Officer</option>";
								echo "<option value='Front End Developer'>Front End Developer</option>";
								echo "<option value='Digital Marketing'>Digital Marketing</option>";
								echo "<option value='Translator Mandarin'>Translator Mandarin</option>";
								echo "<option value='Sales Support'>Sales Support</option>";
								echo "<option value='Sales Promotion'>Sales Promotion</option>";
							}else if($data['jabatan'] == "Front End Developer"){
								echo "<option value='Product Specialis'>Product Specialis</option>";
								echo "<option value='Content Writer'>Content Writer</option>";
								echo "<option value='Interior Design'>Interior Design</option>";
								echo "<option value='Chanel Management Staff'>Chanel Management Staff</option>";
								echo "<option value='Project Officer'>Project Officer</option>";
								echo "<option value='Public Communication'>Public Communication</option>";
								echo "<option value='Digital Marketing'>Digital Marketing</option>";
								echo "<option value='Translator Mandarin'>Translator Mandarin</option>";
								echo "<option value='Sales Support'>Sales Support</option>";
								echo "<option value='Sales Promotion'>Sales Promotion</option>";
							}else if($data['jabatan'] == "Digital Marketing"){
								echo "<option value='Product Specialis'>Product Specialis</option>";
								echo "<option value='Content Writer'>Content Writer</option>";
								echo "<option value='Interior Design'>Interior Design</option>";
								echo "<option value='Chanel Management Staff'>Chanel Management Staff</option>";
								echo "<option value='Project Officer'>Project Officer</option>";
								echo "<option value='Public Communication'>Public Communication</option>";
								echo "<option value='Front End Developer'>Front End Developer</option>";
								echo "<option value='Translator Mandarin'>Translator Mandarin</option>";
								echo "<option value='Sales Support'>Sales Support</option>";
								echo "<option value='Sales Promotion'>Sales Promotion</option>";
							}else if($data['jabatan'] == "Translator Mandarin"){
								echo "<option value='Product Specialis'>Product Specialis</option>";
								echo "<option value='Content Writer'>Content Writer</option>";
								echo "<option value='Interior Design'>Interior Design</option>";
								echo "<option value='Chanel Management Staff'>Chanel Management Staff</option>";
								echo "<option value='Project Officer'>Project Officer</option>";
								echo "<option value='Public Communication'>Public Communication</option>";
								echo "<option value='Front End Developer'>Front End Developer</option>";
								echo "<option value='Digital Marketing'>Digital Marketing</option>";
								echo "<option value='Sales Support'>Sales Support</option>";
								echo "<option value='Sales Promotion'>Sales Promotion</option>";
							}else if($data['jabatan'] == "Sales Support"){
								echo "<option value='Product Specialis'>Product Specialis</option>";
								echo "<option value='Content Writer'>Content Writer</option>";
								echo "<option value='Interior Design'>Interior Design</option>";
								echo "<option value='Chanel Management Staff'>Chanel Management Staff</option>";
								echo "<option value='Project Officer'>Project Officer</option>";
								echo "<option value='Public Communication'>Public Communication</option>";
								echo "<option value='Front End Developer'>Front End Developer</option>";
								echo "<option value='Digital Marketing'>Digital Marketing</option>";
								echo "<option value='Translator Mandarin'>Translator Mandarin</option>";
								echo "<option value='Sales Promotion'>Sales Promotion</option>";
							}else if($data['jabatan'] == "Sales Promotion"){
								echo "<option value='Product Specialis'>Product Specialis</option>";
								echo "<option value='Content Writer'>Content Writer</option>";
								echo "<option value='Interior Design'>Interior Design</option>";
								echo "<option value='Chanel Management Staff'>Chanel Management Staff</option>";
								echo "<option value='Project Officer'>Project Officer</option>";
								echo "<option value='Public Communication'>Public Communication</option>";
								echo "<option value='Front End Developer'>Front End Developer</option>";
								echo "<option value='Digital Marketing'>Digital Marketing</option>";
								echo "<option value='Translator Mandarin'>Translator Mandarin</option>";
								echo "<option value='Sales Support'>Sales Support</option>";
							}
						?>
			    		</select>
					</div>
					<div class="form-group">
						<select name="status" class="form-control" required>
						<?php 
							if($data['status'] == ""){
								echo "<option value=''>-PILIH-</option>";
								echo "<option value='Outsourcing'>Outsourcing</option>";
								echo "<option value='Kontrak'>Kontrak</option>";
								echo "<option value='Tetap'>Tetap</option>";
							}else if($data['status'] == "Outsourcing"){
								echo "<option value='Outsourcing'>Outsourcing</option>";
								echo "<option value='Kontrak'>Kontrak</option>";
								echo "<option value='Tetap'>Tetap</option>";
							}else if($data['status'] == "Kontrak"){
								echo "<option value='Kontrak'>Kontrak</option>";
								echo "<option value='Outsourcing'>Outsourcing</option>";
								echo "<option value='Tetap'>Tetap</option>";
							}else if($data['status'] == "Tetap"){
								echo "<option value='Tetap'>Tetap</option>";
								echo "<option value='Outsourcing'>Outsourcing</option>";
								echo "<option value='Kontrak'>Kontrak</option>";
							}
						?>
			    		</select>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div> <!-- penutup row -->
			<div class="form-group">
			  	<button class="btn btn-secondary">
					<a href="karyawan_data.php" style="color:white; text-decoration: none"><i class="fas fa-arrow-left"></i> KEMBALI</a>
			  	</button>
			  	<input type="submit" name="editan" value="UBAH" class="btn btn-warning" style="color:white;">
			  </div>
		</form>
	</div> <!-- akhir container -->

	<?php 
		if (isset($_POST['editan'])) {
			$nama 			= $_POST['nama'];
			$tempat_lahir 	= $_POST['tempat_lahir'];
			$tanggal_lahir 	= $_POST['tanggal_lahir'];
			$alamat 		= $_POST['alamat'];
			$no_telepon		= $_POST['no_telepon'];
			$jabatan 		= $_POST['jabatan'];
			$status 		= $_POST['status'];

			$edit = mysqli_query($koneksi, "UPDATE karyawan SET nama = '$nama', tempat_lahir = '$tempat_lahir',  tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', no_telepon ='$no_telepon', jabatan = '$jabatan', status = '$status' WHERE nik = '$nik'");

			if($edit){
				?>
					<script type="text/javascript">
						window.location.href="karyawan_data.php?pesan=ubah";
					</script>
				<?php
			}else{
				?>
					<script type="text/javascript">
						window.location.href="karyawan_data.php?pesan=gagal";
					</script>
				<?php 
			}	
		}
	?>
	
<?php require('footer-admin.php'); ?>