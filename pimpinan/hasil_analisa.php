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
		<h2>Hasil Analisa</h2> <hr>
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
		?>
		<h3>1. Tabel Nilai Kriteria</h3>
		<div class="table-responsive table-responsive-md table-responsive-sm table-responsive-lg">
			<table class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
				<tr class="text-center">
					<th>No</th>
					<th>Nama Karyawan</th>
					<?php 
						$kriteria = mysqli_query($koneksi, "SELECT kriteria FROM bobotkriteria");
						while($baris = mysqli_fetch_array($kriteria)){
					?>
					<th><?php echo $baris['kriteria'] ?></th>
				<?php } ?>
				</tr>
				
				<?php
					$karyawan = mysqli_query($koneksi, "SELECT nama FROM karyawan");	
					$no = 1;
					while($kolomData = mysqli_fetch_array($karyawan)){
				?>
				<tr class="text-center">
					<td><?php echo $no++; ?></td>
					<td><?php echo $kolomData['nama'] ?></td>
					<?php
						$kol1 = mysqli_query($koneksi, "SELECT * FROM penilaian
								INNER JOIN karyawan ON penilaian.nik = karyawan.nik WHERE nama='$kolomData[nama]'");	
						while($kolomData = mysqli_fetch_array($kol1)){
							?>
							<td><?php echo $kolomData['nilai'] ?></td>
					<?php } ?>
				</tr>
			<?php } ?>
			</table>
		</div> <!-- akhir nilai kriteria -->

		<h3>2. Bobot Evaluasi</h3>
		<div class="table-responsive table-responsive-md table-responsive-sm table-responsive-lg">
			<table class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
				<tr class="text-center">
					<th>No</th>
					<th>Nama Karyawan</th>
					<th>Nilai Bobot</th>
					<th>Nilai</th>
					<th>Bobot Evaluasi</th>
				</tr>			
				<?php
					$bobotevaluasi = mysqli_query($koneksi, "SELECT * FROM penilaian
								INNER JOIN karyawan ON penilaian.nik = karyawan.nik
								INNER JOIN bobotkriteria ON penilaian.idbotbot = bobotkriteria.idbotbot");	
					$no = 1;
					while($nakal = mysqli_fetch_array($bobotevaluasi)){
				?>
				<tr class="text-center">
					<td><?php echo $no++; ?></td>
					<td><?php echo $nakal['nama'] ?></td>
					<td><?php echo $nakal['bobot'] ?></td>
					<td><?php echo $nakal['nilai'] ?></td>
					<td><?php echo number_format($nakal['nilai']*$nakal['bobot'],2); ?></td>
				</tr>
			<?php } ?>
			</table>
		</div>

		<h3>3. Total Evaluasi</h3>
		<div class="table-responsive table-responsive-md table-responsive-sm table-responsive-lg">
			<table class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
				<tr class="text-center">
					<th>No</th>
					<th>Nama Karyawan</th>
					<th>Jabatan</th>
					<th>Total Evaluasi</th>
					<th>Keterangan</th>
				</tr>			
				<?php
					$karkar = mysqli_query($koneksi, "SELECT nama,jabatan FROM karyawan");	
					$no = 1;
					while($emosi = mysqli_fetch_array($karkar)){
				?>
				<tr class="text-center">
					<td><?php echo $no++; ?></td>
					<td><?php echo $emosi['nama'] ?></td>
					<td><?php echo $emosi['jabatan'] ?></td>
					<?php
						$total = 0;
						$totalpie = mysqli_query($koneksi, "SELECT nilai,bobot FROM penilaian
								INNER JOIN karyawan ON penilaian.nik = karyawan.nik
								INNER JOIN bobotkriteria ON penilaian.idbotbot = bobotkriteria.idbotbot WHERE nama='$emosi[nama]'");	
						while($emosi = mysqli_fetch_array($totalpie) ){
							$dia = $emosi['nilai']*$emosi['bobot'];
							$total += $dia;
					?>
					<?php } ?>
					<td><?php echo number_format($total,2) ?></td>
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
<?php 
	$heynama = mysqli_query($koneksi,"SELECT nama,jabatan FROM karyawan ORDER BY nama");
	$karyawan = [];
	$jabatan = [];
	while($baris=mysqli_fetch_array($heynama)){
		$karyawan[] = (string)$baris['nama'];
		$jabatan[] = (string)$baris['jabatan'];

		$total = 0;
		$totalpie = mysqli_query($koneksi, "SELECT * FROM penilaian	INNER JOIN karyawan ON penilaian.nik = karyawan.nik INNER JOIN bobotkriteria ON penilaian.idbotbot = bobotkriteria.idbotbot WHERE nama='$baris[nama]'");

		while($baris = mysqli_fetch_array($totalpie)){
			$dia = $baris['nilai']*$baris['bobot'];
			$total += $dia;
		}$totalnya[] = (float)$total;
	} //penutup while	
?>
		<h3>4. Bentuk Grafik</h3>
		<script src="../js/jquery.js"></script>
		<script src="../js/highcharts.js"></script>
		<script src="../js/exporting.js"></script>
		<div id="container" style="width: 100%; height: 400px"></div>	
<script>
	Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Total Evaluasi'
    },
    subtitle: {
        text: 'Source: Tim Peneliti 3'
    },
    xAxis: {
        categories: <?=json_encode($karyawan)?>,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Nilai'
        },
        labels: {
            formatter: function () {
                return this.value / 1;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ''
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Karyawan Terbaik',
        data: <?= json_encode($totalnya) ?>
    }]
});
</script>

		

		<div class="form-group">
			<button class="btn btn-secondary">
					<a onclick="history.back()"><i class="fas fa-arrow-left"></i> KEMBALI</a>
			  	</button>
			<button type="button" onclick="window.print();" class="btn btn-info" id="cetak"><i class="fas fa-print"></i> CETAK</button>
		</div>
	</div>
<?php require('footer-admin.php'); ?>