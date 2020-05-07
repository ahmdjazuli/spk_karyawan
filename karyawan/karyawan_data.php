<?php 
	require('header-karyawan.php'); 
	require("../koneksi.php");
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
		<form action="karyawan_data.php" method="POST">
			<h2 style="display: flex; float: left;">Data Karyawan</h2> 
			<div style="display: flex; float: right" id="pencarian1">
				<input type="text" placeholder="Cari.." name="cari" autofocus>
				<button type="submit" class="btn-sm btn-dark" style="border:none;"><i class="fas fa-search"></i></button>
		</form>
	</div>	
	<br>
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

			if(isset($_GET['pesan'])){
				if($_GET['pesan']=="gagal"){
					?>
						<script src="../js/sweetalert.min.js"></script>
						<script type="text/javascript">
							function alert1(){
								swal("Gagal Diubah!", "Klik OK!", "warning");
								} alert1();
							</script>
						<?php 
					}
				}
		?>
		
		<div class="table-responsive table-responsive-md table-responsive-sm table-responsive-lg">
			<table class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
				<tr>
					<th class="text-center">No</th>
					<th><a id="log" href="?urut=nik&pola=<?=$polabaru;?>">NIK</a></th>
					<th><a id="log" href="?urut=nama&pola=<?=$polabaru;?>">Nama</a></th>
					<th><a id="log" href="?urut=tempat_lahir&pola=<?=$polabaru;?>">Tempat Lahir</a></th>
					<th><a id="log" href="?urut=tanggal_lahir&pola=<?=$polabaru;?>">Tanggal Lahir</a></th>
					<th><a id="log" href="?urut=alamat&pola=<?=$polabaru;?>">Alamat</a></th>
					<th><a id="log" href="?urut=no_telepon&pola=<?=$polabaru;?>">No. Telp</a></th>
					<th><a id="log" href="?urut=jabatan&pola=<?=$polabaru;?>">Jabatan</a></th>
					<th><a id="log" href="?urut=status&pola=<?=$polabaru;?>">Status</a></th>
				</tr>
				<?php
					$halaman 	  = 10; //batasan halaman
					$page    	  = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
					$mulai        = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$sql     	  = mysqli_query($koneksi, 'SELECT * FROM karyawan');
					$total        = mysqli_num_rows($sql);
					$pages   	  = ceil($total/$halaman);

					if(isset($_POST['cari'])){
						$cari = $_POST['cari'];
						$dkaryawan = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nama LIKE '%".$cari."%' OR nik LIKE '%".$cari."%' OR tempat_lahir LIKE '%".$cari."%' OR alamat LIKE '%".$cari."%' OR no_telepon LIKE '%".$cari."%' OR jabatan LIKE '%".$cari."%' OR status LIKE '%".$cari."%' ");
					}else{
						if(isset($_GET['urut'])){
							$dkaryawan = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY $orderby $polabaru LIMIT $mulai, $halaman");
						}else{
							$dkaryawan = mysqli_query($koneksi, "SELECT * FROM karyawan LIMIT $mulai, $halaman");	
						}
					}

					$no = 1;

					if(mysqli_num_rows($dkaryawan)> 0){
						while($data = mysqli_fetch_array($dkaryawan)){ ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $data['nik'] ?></td>
								<td><?= $data['nama'] ?></td>
								<td><?= $data['tempat_lahir'] ?></td>
								<?php $waktunya = $data['tanggal_lahir']; ?>
								<td><?= date('d-m-Y',strtotime($waktunya)); ?></td>
								<td><?= $data['alamat'] ?></td>
								<td><?= $data['no_telepon'] ?></td>
								<td><?= $data['jabatan'] ?></td>
								<td><?= $data['status'] ?></td>
							</tr>
						<?php }
					}else{
						echo "<tr><td colspan=\"10\" align=\"center\"><b style='font-size:18px;'>DATA TIDAK DAPAT DITEMUKAN!</b></td></tr>";
					}?>
			</table>
		</div>
		<div class="form-group">
			<button class="btn btn-secondary">
					<a onclick="history.back()"><i class="fas fa-arrow-left"></i> KEMBALI</a>
			  	</button>
			<button type="button" onclick="window.print();" class="btn btn-info" id="cetak"><i class="fas fa-print"></i> CETAK</button>
			<div style="display: inline; float: right;">
				Halaman <?= $page ?> dari <b><?= $pages ?></b><br>
				Total Data : <b><?= $total; ?></b>
			</div>
		</div>
	</div>
	<br>
	<div class="row text-center">
		<div class="col-sm-12 col">
		<?php for($i=1; $i<=$pages; $i++){ ?>
			<a id="paging" class="btn btn-dark btn-md" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php } ?>
		</div>
	</div>
<?php require('footer-karyawan.php'); ?>