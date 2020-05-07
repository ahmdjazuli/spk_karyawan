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
		<form action="penilaian_data.php" method="POST">
		<h2 style="display: flex; float: left">Penilaian Data</h2>
				<div style="display: flex; float: right;" id="pencarian1">
					<input type="text" placeholder="Cari.." name="cari" autofocus>
					<button type="submit" class="btn-sm btn-dark" style="border:none;"><i class="fas fa-search"></i></button>
		</div><br>
		<hr>
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
		<div class="table-responsive table-responsive-md table-responsive-sm table-responsive-lg">
			<table class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
				<tr class="text-center">
					<th><a id="log" href="?urut=idpenilaian&pola=<?=$polabaru;?>">No</a></th>
					<th><a id="log" href="?urut=nama&pola=<?=$polabaru;?>">Nama Karyawan</a></th>
					<th><a id="log" href="?urut=kriteria&pola=<?=$polabaru;?>">Kriteria</a></th>
					<th><a id="log" href="?urut=nilai&pola=<?=$polabaru;?>">Nilai</a></th>
					<th>Tools</th>
				</tr>
				<?php
					$halaman 	  = 10; //batasan halaman
					$page    	  = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
					$mulai        = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$sql     	  = mysqli_query($koneksi, 'SELECT * FROM penilaian');
					$total        = mysqli_num_rows($sql);
					$pages   	  = ceil($total/$halaman);

					if(isset($_POST['cari'])){
						$cari = $_POST['cari'];
						$dpenilaian = mysqli_query($koneksi, "SELECT * FROM penilaian INNER JOIN karyawan ON penilaian.nik = karyawan.nik INNER JOIN bobotkriteria ON penilaian.idbotbot = bobotkriteria.idbotbot WHERE nama LIKE '%".$cari."%' OR kriteria LIKE '%".$cari."%'");
					}else{
						if(isset($_GET['urut'])){
							$dpenilaian = mysqli_query($koneksi, "SELECT * FROM penilaian INNER JOIN karyawan ON penilaian.nik = karyawan.nik INNER JOIN bobotkriteria ON penilaian.idbotbot = bobotkriteria.idbotbot ORDER BY $orderby $polabaru LIMIT $mulai, $halaman");
						}else{
							$dpenilaian = mysqli_query($koneksi, "SELECT * FROM penilaian
								INNER JOIN karyawan ON penilaian.nik = karyawan.nik
								INNER JOIN bobotkriteria ON penilaian.idbotbot = bobotkriteria.idbotbot LIMIT $mulai, $halaman");	
						}
					}

					$no = 1;

					if(mysqli_num_rows($dpenilaian)> 0){
						while($data = mysqli_fetch_array($dpenilaian)){ ?>
							<tr class="text-center">
								<td><?= $no++; ?></td>
								<td><?= $data['nama'] ?></td>
								<td><?= $data['kriteria'] ?></td>
								<td><?= $data['nilai'] ?></td>
								<td>
									<a href="penilaian_edit.php?idpenilaian=<?php echo $data['idpenilaian']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
									<a href="penilaian_delete.php?idpenilaian=<?php echo $data['idpenilaian'] ?>" title="Hapus Data" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
								</td>
							</tr>
						<?php }
					}else{
						echo "<tr><td colspan=\"5\" align=\"center\"><b style='font-size:18px;'>DATA TIDAK DAPAT DITEMUKAN!</b></td></tr>";
					}?>
			</table>
		</div>
		<div class="form-group">
			<button class="btn btn-secondary">
					<a onclick="history.back()"><i class="fas fa-arrow-left"></i></a>
			  	</button>
			<button type="button" onclick="window.print();" class="btn btn-info" id="cetak"><i class="fas fa-print"></i></button>
			<button type="button" class="btn btn-success"><a id="log" href="input_penilaian.php"><i class="fas fa-plus"></i></a></button>
			<div style="display: inline; float: right;">
				Halaman <?= $page ?> dari <b><?= $pages ?></b><br>
				Total Data : <b><?= $total; ?></b>
			</div>
		</div>

		<div class="row text-center">
		<div class="col-sm-12 col">
		<?php for($i=1; $i<=$pages; $i++){ ?>
			<a id="paging" class="btn btn-dark btn-md" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php } ?>
		</div>
	</div>
	</div>
<?php require('footer-admin.php'); ?>