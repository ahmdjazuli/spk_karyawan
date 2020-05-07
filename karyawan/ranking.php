<?php 
	require('header-karyawan.php'); 
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
		<h2>Hasil Analisa</h2> <hr>
		<h3>Ranking Karyawan Terbaik</h3>
		<div class="table-responsive table-responsive-md table-responsive-sm table-responsive-lg">
			<table class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
				<tr class="text-center">
					<th>No</th>
					<th>NIK</th>
					<th>Nama Karyawan</th>
					<th>Jabatan</th>
					<th>Keterangan</th>
				</tr>			
				<?php
					$karkar = mysqli_query($koneksi, "SELECT nama,jabatan,nik FROM karyawan");	
					$no = 1;
					while($emosi = mysqli_fetch_array($karkar)){
				?>
				<tr class="text-center">
					<td style="font-weight: bold"><?php echo $no++; ?></td>
					<td><?php echo $emosi['nik'] ?></td>
					<td><?php echo $emosi['nama'] ?></td>
					<td><?php echo $emosi['jabatan'] ?></td>
					<?php
						$total = 0;
						$totalpie = mysqli_query($koneksi, "SELECT * FROM penilaian
								INNER JOIN karyawan ON penilaian.nik = karyawan.nik
								INNER JOIN bobotkriteria ON penilaian.idbotbot = bobotkriteria.idbotbot WHERE nama='$emosi[nama]'");	
						while($emosi = mysqli_fetch_array($totalpie)){
							$dia = $emosi['nilai']*$emosi['bobot'];
							$total += $dia;
					?>
					<?php } ?>
					<?php 
						if($total>80){
							echo "<td style='font-weight:bold; background-color:#30bf50;'>Terus Dipertahankan!</td>";
						}else{
							echo "<td style='font-weight:bold; background-color:red;'>Berusaha Lebih Keras!</td>";
						}
					?>
				</tr>
				<?php } ?>
			</table>
		</div>

		<div class="form-group">
			<button type="button" onclick="window.print();" class="btn btn-info" id="cetak"><i class="fas fa-print"></i> CETAK</button>
		</div>
	</div>
<?php require('footer-karyawan.php'); ?>