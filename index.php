<body style="background-color: #6faae4;"><br><br>
<?php require('header.php'); ?>
		<?php 
			if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
				?>
					<script src="js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Gagal Login!", "Username atau Password Anda Tidak Sesuai!", "warning");
						} alert1();
					</script>
				<?php 
			}
		}

		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="tidaksesuai"){
				?>
					<script src="js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Gagal Login!", "Anda login sebagai Karyawan atau Pimpinan sih-_-", "warning");
						} alert1();
					</script>
				<?php 
			}
		}
		?>
<div class="container-fluix" style="margin-top: -50px;">
	<div class="text-center">
		<h1>SEMI SKRIPSI</h1>
		<p>Sistem Pendukung Keputusan <i>Karyawan Terbaik</i> pada <b>PT. Tedmond Groups</b> menggunakan Metode MFEP(<i>Multifactor Evaluation Process</i>) yang dibuat oleh Tim 3 Peneliti yaitu</p>
		<div class="bebelak">
			<div class="card">
				<img src="img/profil3.png" width="96" height="96">
				<span class="nama">Adrian Mukhtar</span>
				<span class="telp">16.71.0000</span>
				<span class="tutup">x</span>
			</div>

			<div class="card">
				<img src="img/profil1.png" width="96" height="96">
				<span class="nama">Ahmad Jazuli</span>
				<span class="telp">16.71.0084</span>
				<span class="tutup">x</span>
			</div>

			<div class="card">
				<img src="img/profil2.png" width="96" height="96">
				<span class="nama">Muhammad Adji</span>
				<span class="telp">16.71.0041</span>
				<span class="tutup">x</span>
			</div>

			<div id="posisi-tombol">
				<a target="_blank" href="http://julikoding.blogspot.com" class="btn btn-primary btn-lg tombolnya" role="button"> Lihat Blog</a>
				<a href="#galeri" class="btn btn-success btn-lg tombolnya" role="button">Lihat Galeri</a>
			</div>
		</div>
	</div> <!-- akhir jumbotron -->
	<br>
		<div class="container" id="galeri">
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<img src="img/pict1.jpg" class="img-fluid" style="border-radius: 20px; box-shadow: 2px 2px 2px 2px #343a40; margin-bottom: 20px; ">
			</div>
			<div class="col-md-6 col-sm-6">
				<img src="img/pict2.jpg" class="img-fluid" style="border-radius: 20px; box-shadow: 2px 2px 2px 2px #343a40; margin-bottom: 20px;">
			</div>
			<div class="col-md-6 col-sm-6">
				<img src="img/pict3.jpg" class="img-fluid" style="border-radius: 20px; box-shadow: 2px 2px 2px 2px #343a40; margin-bottom: 20px; ">
			</div>
			<div class="col-md-6 col-sm-6">
				<img src="img/pict4.jpg" class="img-fluid" style="border-radius: 20px; box-shadow: 2px 2px 2px 2px #343a40">
			</div>
		</div>
		</div>
</div>

<?php require('footer.php'); ?>
</body>