<?php
include_once 'koneksi.php';
if(isset($_GET['aksi'])){
	switch ($_GET['aksi']) {
		case 'input':
			$nim 			= isset($_POST['nim']) ? $_POST['nim'] : "";
			$nama 			= isset($_POST['nama']) ? $_POST['nama'] : "";
			$jenis_kelamin 	= isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : "";
			$program_studi 	= isset($_POST['program_studi']) ? $_POST['program_studi'] : "";
			$fakultas 		= isset($_POST['fakultas']) ? $_POST['fakultas'] : "";
			$asal 			= isset($_POST['asal']) ? $_POST['asal'] : "";
			$motto 			= isset($_POST['motto']) ? $_POST['motto'] : "";

			$query = "INSERT INTO `mahasiswa`(
						`nim`,
						`nama`,
						`jenis_kelamin`,
						`program_studi`,
						`fakultas`,
						`asal`,
						`motto`
					) VALUES (
						'$nim',
						'$nama',
						'$jenis_kelamin',
						'$program_studi',
						'$fakultas',
						'$asal',
						'$motto'
					)";
			$query_result = mysqli_query($conn,$query);
			if($query_result){
				header('location: list_data.php');
			} else {
				$_SESSION['input_error'] = "Data Gagal Dimasukkan";
				header('location: index.php');
			}
			break;

		case 'delete':
			$id = $_GET['id'];
			$query = "DELETE FROM `mahasiswa` WHERE `id`='$id'";
			$query_result = mysqli_query($conn,$query);
			if($query_result){
				header('location: list_data.php');
			} else {
				$_SESSION['hapus_error'] = "Data Gagal Dihapus";
				header('location: list_data.php');
			}
			break;

		case 'update':
			$id 			= isset($_POST['id']) ? $_POST['id'] : "";
			$nim 			= isset($_POST['nim']) ? $_POST['nim'] : "";
			$nama 			= isset($_POST['nama']) ? $_POST['nama'] : "";
			$jenis_kelamin 	= isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : "";
			$program_studi 	= isset($_POST['program_studi']) ? $_POST['program_studi'] : "";
			$fakultas 		= isset($_POST['fakultas']) ? $_POST['fakultas'] : "";
			$asal 			= isset($_POST['asal']) ? $_POST['asal'] : "";
			$motto 			= isset($_POST['motto']) ? $_POST['motto'] : "";

			$query = "UPDATE
					  `mahasiswa`
					SET
					  `id` 				= '$id',
					  `nim` 			= '$nim',
					  `nama` 			= '$nama',
					  `jenis_kelamin` 	= '$jenis_kelamin',
					  `program_studi` 	= '$program_studi',
					  `fakultas` 		= '$fakultas',
					  `asal` 			= '$asal',
					  `motto` 			= '$motto'
					WHERE `id` = '$id';
					";
			$query_result = mysqli_query($conn,$query);
			if($query_result){
				header('location: detail_mahasiswa.php?id='.$id);
			} else {
				$_SESSION['update_error'] = "Data Gagal DIubah";
				header('location: detail_mahasiswa.php?id='.$id);
			}
			break;

		default:
			break;
	}

}
?>
