<?php 
	require('header-admin.php'); 
	require_once("../koneksi.php");
	$pola = 'ASC';
	$polabaru = 'ASC';
	if(isset($_GET['urut'])){
		$orderby = $_GET['urut'];
		$pola = $_GET['pola'];
		if($pola=='ASC'){
			$polabaru = 'DESC';
		}else{
			$polabaru = 'ASC';
		}
	}
?>
	<div class="container">
		<h2>Bobot & Kriteria</h2> <hr>
		<?php 
			if(isset($_GET['pesan'])){
				if($_GET['pesan']=="hapus"){
					?>
						<script src="../js/sweetalert.min.js"></script>
						<script type="text/javascript">
							function alert1(){
								swal("Data Berhasil Terhapus!", "Klik OK!", "warning");
							} alert1();
						</script>
					<?php 
				}
			}
			if(isset($_GET['pesan'])){
				if($_GET['pesan']=="ubah"){
					?>
						<script src="../js/sweetalert.min.js"></script>
						<script type="text/javascript">
							function alert1(){
								swal("Data Berhasil Diperbaharui!", "Klik OK!", "info");
							} alert1();
						</script>
					<?php 
				}
			}

			if(isset($_GET['pesan'])){
				if($_GET['pesan']=="udahada"){
					?>
						<script src="../js/sweetalert.min.js"></script>
						<script type="text/javascript">
							function alert1(){
								swal("Gagal Diubah!", "Nama Kriteria SUDAH ADA!", "warning");
								} alert1();
							</script>
						<?php 
					}
				}
		?>
		<div class="table-responsive table-responsive-md table-responsive-sm table-responsive-lg">
			<table class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
				<tr class="text-center">
					<th>No</th>
					<th><a id="log" href="?urut=kriteria&pola=<?=$polabaru;?>">Kriteria</a></th>
					<th><a id="log" href="?urut=bobot&pola=<?=$polabaru;?>">Bobot</a></th>
					<th>Tools</th>
				</tr>
				<?php
					if(isset($_GET['urut'])){
						$dbobotkriteria = mysqli_query($koneksi, "SELECT * FROM bobotkriteria ORDER BY $orderby $polabaru");
					}else{
						$dbobotkriteria = mysqli_query($koneksi, "SELECT * FROM bobotkriteria");	
					}

					$no = 1;

					while($kolomData = mysqli_fetch_array($dbobotkriteria)){
				?>
				<tr class="text-center">
					<td><?php echo $no++; ?></td>
					<td><?php echo $kolomData['kriteria'] ?></td>
					<td><?php echo $kolomData['bobot'] ?></td>
					<td>
						<a href="bobotkriteria_edit.php?idbotbot=<?php echo $kolomData['idbotbot']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
						<a href="bobotkriteria_delete.php?idbotbot=<?php echo $kolomData['idbotbot'] ?>" title="Hapus Data" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<div class="form-group">
			<button class="btn btn-secondary">
					<a onclick="history.back()"><i class="fas fa-arrow-left"></i></a>
			  	</button>
			<button type="button" onclick="window.print();" class="btn btn-info" id="cetak"><i class="fas fa-print"></i></button>
			<button type="button" class="btn btn-success"><a id="log" href="input_bobotkriteria.php"><i class="fas fa-plus"></i></a></button>
		</div>
	</div>
<?php require('footer-admin.php'); ?>