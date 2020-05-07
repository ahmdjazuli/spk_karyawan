<?php 
	require_once("../koneksi.php"); 
	require_once("header-admin.php");
	// error_reporting(0);
?>
	<div class="container">
	<h2>Penilaian Data &raquo; Tambah Data</h2><hr>
	<div class='alert alert-primary alert-dismissible fade show text-center' id="notif">
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<?php echo @$_POST['count_add'] ?>Data yang tersimpan dapat anda lihat di <b><a href="penilaian_data.php">SINI</a></b>!
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
			if($_GET['pesan']=="sudahada"){
				?>
					<script src="../js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Sudah Ada!", "Nama Karyawan & Kriteria Sudah ADA:)", "warning");
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
			<form action="aksiInputPenilaian.php" method="post">
				<input type="hidden" name="total" value="<?= @$_POST['count_add'] ?>">
				<table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>NO</th>
							<th>Nama Karyawan</th>
							<th>Kriteria</th>
							<th>Nilai</th>
						</tr>
					</thead>
					<?php 
						for($i=1; $i<=$_POST['count_add']; $i++){ ?>
							<tr class="text-center">
								<td><?= $i ?></td>
								<td>
									<select name="nik-<?= $i ?>" class="form-control" required>
										<option value="">-PILIH-</option>
											<?php
												$tb_karyawan = mysqli_query($koneksi, "SELECT nik,nama FROM karyawan ORDER BY nama ASC");
							    				while($baris = mysqli_fetch_array($tb_karyawan)) {
							    					?>
							    						<option value="<?= $baris[nik] ?>"><?= $baris['nama'] ?></option>
							    					<?php
							    				} 
							    			?>
							    	</select>
								</td>
								<td>
									<select name="idbotbot-<?= $i ?>" class="form-control" required>
										<option value="">-PILIH-</option>
											<?php
												$tb_kriteria = mysqli_query($koneksi, "SELECT * FROM bobotkriteria ORDER BY idbotbot ASC");
							    				while($baris = mysqli_fetch_array($tb_kriteria)) {
							    					?>
							    						<option value="<?= $baris[idbotbot] ?>"><?= $baris['kriteria'] ?></option>
							    					<?php
							    				} 
							    			?>
							    	</select>
								</td>
								<td>
									<input type="number" min="50" max="100" name="nilai-<?= $i ?>" class="form-control" required>
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