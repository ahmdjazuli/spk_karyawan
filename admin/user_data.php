<?php 
	require('header-admin.php'); 
	require('../koneksi.php');
?>
	<div class="container">
		<h2>Data User</h2> <hr>
		<br>
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
				if($_GET['pesan']=="udahterdaftar"){
					?>
						<script src="../js/sweetalert.min.js"></script>
						<script type="text/javascript">
							function alert1(){
								swal("Gagal Menyimpan!", "Username sudah dipakai!", "info");
							} alert1();
						</script>
					<?php 
				}
			}

			if(isset($_GET['pesan'])){
				if($_GET['pesan']=="berhasiltambah"){
					?>
						<script src="../js/sweetalert.min.js"></script>
						<script type="text/javascript">
							function alert1(){
								swal("Berhasil Disimpan!", "Klik OK!", "success");
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
								swal("Berhasil Diubah!", "Klik OK!", "success");
							} alert1();
						</script>
					<?php 
				}
			}
		?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<th>No</th>
					<th>Nama Lengkap</th>
					<th>Username</th>
					<th>Password</th>
					<th>Level</th>
					<th>Tools</th>
				</tr>
				<?php 
					$mysql = "SELECT * FROM user";
					$myQry = mysqli_query($koneksi, $mysql) or die ("Query Salah : ".mysqli_error($koneksi));
					$no = 1;
					while($kolomData = mysqli_fetch_array($myQry)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $kolomData['nama'] ?></td>
					<td><?php echo $kolomData['username'] ?></td>
					<td><?php echo $kolomData['password'] ?></td>
					<td><?php echo $kolomData['level'] ?></td>
					<td>
						<a href="user_edit.php?id=<?php echo $kolomData['id']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
						<a href="user_delete.php?id=<?php echo $kolomData['id'] ?>" title="Hapus Data" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
<?php require('footer-admin.php'); ?>