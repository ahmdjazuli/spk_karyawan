<?php 
	require_once("../koneksi.php"); 
	require_once("header-admin.php");
	// error_reporting(0);
?>
	<div class="container">
	<h2>Bobot & Kriteria &raquo; Tambah Data</h2><hr>
	<div class='alert alert-primary alert-dismissible fade show text-center' id="notif">
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<?php echo @$_POST['count_add'] ?>Data yang tersimpan dapat anda lihat di <b><a href="bobotkriteria_data.php">SINI</a></b>!
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
			if($_GET['pesan']=="kriteriasama"){
				?>
					<script src="../js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Kriteria Sudah Ada!", "Coba isi dengan Kriteria yang lain:)", "warning");
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
					<input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]+" placeholder="Banyak Kolom yang akan ditambahkan" class="form-control" aria-label="" aria-describedby="basic-addon1" required autofocus>
					<div class="input-group-prepend">
						<button class="btn btn-success" type="submit" name="generate">LANJUT</button>
					</div>
				</div>
			</form>
			</div>
		</div>
		<div class="table-responsive-md table-responsive-sm table-responsive-lg">
			<form action="aksiInputBobot.php" method="post">
				<input type="hidden" name="total" value="<?= @$_POST['count_add'] ?>">
				<table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
					<thead class="thead-dark">
						<tr class="text-center">
							<th>NO</th>
							<th>Kriteria</th>
							<th>Bobot</th>
						</tr>
					</thead>
					<?php 
						for($i=1; $i<=$_POST['count_add']; $i++){ ?>
							<tr class="text-center">
								<td><?= $i ?></td>
								<td>
									<input type="text" maxlength="30" pattern="[A-Za-z\s]{8,30}" title="Hanya Karakter Huruf(8-30)" name="kriteria-<?= $i ?>" class="form-control" autofocus required>
								</td>
								<td>
									<input type="number" max="1" step="0.1" name="bobot-<?= $i ?>" class="form-control" required>
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