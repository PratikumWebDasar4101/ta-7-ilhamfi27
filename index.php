<?php
session_start();
if (isset($_SESSION['input_error'])) {
	echo $_SESSION['input_error'];
	unset($_SESSION['input_error']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Data Mahasiswa</title>
</head>
<body>
	<form action="proses_mahasiswa.php?aksi=input" method="post">
		<table>
			<tr>
				<td valign="top">NIM</td>
				<td><input type="text" name="nim"required></td>
			</tr>
			<tr>
				<td valign="top">Nama</td>
				<td><input type="text" name="nama"required></td>
			</tr>
			<tr>
				<td valign="top">Jenis Kelamin</td>
				<td>
					<input type="radio" name="jenis_kelamin" value="L"> Laki-Laki<br>
					<input type="radio" name="jenis_kelamin" value="P"> Perempuan
				</td>
			</tr>
			<tr>
				<td valign="top">Program Studi</td>
				<td>
					<select name="program_studi">
						<option value="">-- Program Studi --</option>
						<option value="Manajemen Informatika">Manajemen Informatika</option>
						<option value="Manajemen Pemasaran">Manajemen Pemasaran</option>
						<option value="Perhotelan">Perhotelan</option>
						<option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
						<option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Teknik Komputer">Teknik Komputer</option>
						<option value="Sistem Multimedia">Sistem Multimedia</option>
					</select>
				</td>
			</tr>
			<tr>
				<td valign="top">Fakultas</td>
				<td>
					<select name="fakultas">
						<option value="">-- Fakultas --</option>
						<option value="FIT">FIT</option>
						<option value="FKB">FKB</option>
						<option value="FEB">FEB</option>
						<option value="FIK">FIK</option>
						<option value="FTE">FTE</option>
						<option value="FRI">FRI</option>
						<option value="FIF">FIF</option>
					</select>
				</td>
			</tr>
			<tr>
				<td valign="top">Asal</td>
				<td><input type="text" name="asal" required></td>
			</tr>
			<tr>
				<td valign="top">Motto Hidup</td>
				<td><textarea name="motto" required></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit">
				</td>
			</tr>
		</table>
	</form>
	<a href="list_data.php">List Data Mahasiswa</a>
</body>
</html>
