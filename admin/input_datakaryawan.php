<?php 
	require_once("../koneksi.php"); 
	require_once("header-admin.php");
	error_reporting(0);
?>
	<div class="container">
	<h2>Data Karyawan &raquo; Tambah Data</h2><hr>
	<div class='alert alert-primary alert-dismissible fade show text-center' id="notif">
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<?php echo @$_POST['count_add'] ?>Data yang tersimpan dapat anda lihat di <b><a href="karyawan_data.php">SINI</a></b>!
			</div>
	<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="isidulu"){
				?>
					<script src="../js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("JANGAN NGEGASS!", "Isi Dulu Kolom yang ingin dibuat :)", "warning");
						} alert1();
					</script>
				<?php 
			}
		}

		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="datanik"){
				?>
					<script src="../js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Nik Sudah Ada!", "Coba isi dengan Nik yang lain:)", "warning");
						} alert1();
					</script>
				<?php 
			}
		}

		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="simpan"){
				?>
					<script src="../js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Data Berhasil Disimpan!", "Klik OK", "success");
						} alert1();
						document.getElementById('notif').style.display = 'block';
					</script>
				<?php 
			}
		}
		?>

		<div class="row">
			<div class="col-md-6 col-sm-12 col" style="margin: 0 auto;">
			<form action="" method="post">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button class="btn btn-secondary"><a onclick="history.back()"><i class="fas fa-arrow-left"></i> KEMBALI</a></button>
					</div>
					<input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]+" placeholder="Banyak Kolom yang akan ditambahkan" class="form-control" aria-label="" aria-describedby="basic-addon1" required>
					<div class="input-group-prepend">
						<button class="btn btn-success" type="submit" name="generate">LANJUT</button>
					</div>
				</div>
			</form>
			</div>
		</div>
		<div class="table-responsive-md table-responsive-sm table-responsive-lg">
			<form action="aksiInputKaryawan.php" method="post">
				<input type="hidden" name="total" value="<?= @$_POST['count_add'] ?>">
				<table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>NO</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>Alamat</th>
							<th>No. Telp</th>
							<th>Jabatan</th>
							<th>Status</th>
						</tr>
					</thead>
					<?php 
						for($i=1; $i<=$_POST['count_add']; $i++){ ?>
							<tr class="text-center">
								<td><?= $i ?></td>
								<td>
									<input type="text" maxlength="16" pattern="[0-9]{16}" name="nik-<?= $i ?>" title="Hanya Karakter Angka(16)" class="form-control" autofocus required>
								</td>
								<td>
									<input type="text" maxlength="100" pattern="[A-Za-z\s]{8,100}" title="Hanya Karakter Huruf(8-100)" name="nama-<?= $i ?>" class="form-control" required>
								</td>
								<td>
									<input type="text" maxlength="100" pattern="[A-Za-z\s]{8,100}" title="Hanya Karakter Huruf(8-100)" name="tempatlahir-<?= $i ?>" class="form-control" required>
								</td>
								<td>
									<input type="date" min="1990-01-01" max="2000-01-01" name="tanggallahir-<?= $i ?>" class="form-control" required>
								</td>
								<td>
									<input type="text" pattern="[A-Za-z0-9\s]{8,100}" title="Angka/Huruf(8-100)" name="alamat-<?= $i ?>" class="form-control" required>
								</td>
								<td>
									<input type="text" maxlength="15" pattern="[0-9]{11,15}" title="Angka tanpa +62" name="notelp-<?= $i ?>" class="form-control" required>
								</td>
								<td>
									<select name="jabatan-<?= $i ?>" class="form-control" required>
										<option value="">-PILIH-</option>
										<option value="Content Writer">Content Writer</option>
										<option value="Interior Design">Interior Design</option>
										<option value="Product Specialis">Product Specialis</option>
										<option value="Chanel Management Staff">Chanel Management Staff</option>
										<option value="Project Officer">Project Officer</option>
										<option value="Public Communication">Public Communication</option>
										<option value="Front End Developer">Front End Developer</option>
										<option value="Digital Marketing">Digital Marketing</option>
										<option value="Translator Mandarin">Translator Mandarin</option>
										<option value="Sales Support">Sales Support</option>
										<option value="Sales Promotion">Sales Promotion</option>
						    		</select>
								</td>
								<td>
									<select name="status-<?= $i ?>" class="form-control" required>
										<option value="">-PILIH-</option>
										<option value="Outsourcing">Outsourcing</option>
										<option value="Kontrak">Kontrak</option>
										<option value="Tetap">Tetap</option>
						    		</select>
								</td>
							</tr>
					<?php } ?>
				</table>
				<div class="form-group" style="text-align: center; margin-top: 10px;">
					<button type="submit" name="add" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN SEMUA</button>
				</div>
			</form>
		</div>
	
	</div> <!-- akhir container -->

<?php
	include("../footer.php");
?> 