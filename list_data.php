<?php
include_once 'koneksi.php';
session_start();
if (isset($_SESSION['hapus_error'])) {
	echo $_SESSION['hapus_error'];
	unset($_SESSION['hapus_error']);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<table>
			<tr>
				<td></td>
				<td colspan="2">
					<form action="list_data.php" method="get">
						<input type="hidden" name="aksi" value="search">
						<input type="text" name="data_mahasiswa">
						<input type="submit">
					</form>
				</td>
			</tr>
		<?php
		if(isset($_GET['aksi']) && $_GET['aksi'] == 'search' && isset($_GET['data_mahasiswa'])){
			$data_mahasiswa = $_GET['data_mahasiswa'];
			$query ="SELECT `id`, `nim`, `nama` FROM `mahasiswa` WHERE `nim` LIKE '%$data_mahasiswa%' OR `nama` LIKE '%$data_mahasiswa%'";
		} else {
			$query ="SELECT `id`, `nim`, `nama` FROM `mahasiswa`";
		}
		$result = mysqli_query($conn,$query);
		if (mysqli_num_rows($result)>0) {
		?>
			<tr>
				<th>NIM</th>
				<th>Nama</th>
				<th>Aksi</th>
			</tr>
			<tbody>
			<?php
			while ($d = mysqli_fetch_array($result)){
			 ?>
			 	<tr>
			 		<td><?php echo $d['nim']; ?></td>
			 		<td><?php echo $d['nama']; ?></td>
			 		<td><a href="proses_mahasiswa.php?aksi=delete&id=<?php echo $d['id']; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')">Hapus</a> | <a href="detail_mahasiswa.php?id=<?php echo $d['id']; ?>">Detail</a></td>
			 	</tr>
			 	<?php
		 		}
	 		?>
			 </tbody>
		</table>
		<?php
	 	}else{
	 		echo "Tidak Ada Data!";
	 	}
		?>
		<br>
		<a href="index.php">Tambah Data</a>
	</body>
</html>
