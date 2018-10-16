<?php
session_start();
if (isset($_SESSION['edit_error'])) {
	echo $_SESSION['edit_error'];
	unset($_SESSION['edit_error']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Data Mahasiswa</title>
</head>
<body>
    <?php
    include_once 'koneksi.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT
                    `nim`,
                    `nama`,
                    `jenis_kelamin`,
                    `program_studi`,
                    `fakultas`,
                    `asal`,
                    `motto`
                FROM
                    `mahasiswa`
                WHERE
                    `id` = $id;
                ";
        $result = mysqli_query($conn, $query);
        $d = mysqli_fetch_array($result);
    ?>
	<form action="proses_mahasiswa.php?aksi=update" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<table>
			<tr>
				<td valign="top">NIM</td>
				<td><input type="text" name="nim" value="<?php echo $d['nim']; ?>" required></td>
			</tr>
			<tr>
				<td valign="top">Nama</td>
				<td><input type="text" name="nama" value="<?php echo $d['nama']; ?>" required></td>
			</tr>
			<tr>
				<td valign="top">Jenis Kelamin</td>
				<td>
					<input type="radio" name="jenis_kelamin" value="L" <?php echo $d['jenis_kelamin'] == "L" ? "checked" : ""; ?>> Laki-Laki<br>
					<input type="radio" name="jenis_kelamin" value="P" <?php echo $d['jenis_kelamin'] == "P" ? "checked" : ""; ?>> Perempuan
				</td>
			</tr>
			<tr>
				<td valign="top">Program Studi</td>
				<td>
					<select name="program_studi">
						<option value="">-- Program Studi --</option>
						<option value="Manajemen Informatika" <?php echo $d['program_studi'] == "Manajemen Informatika" ? "selected=\"selected\"" : ""; ?>>Manajemem Informatika</option>
						<option value="Manajemen Pemasaran" <?php echo $d['program_studi'] == "Manajemen Pemasaran" ? "selected=\"selected\"" : ""; ?>>Manajemen Pemasaran</option>
						<option value="Perhotelan" <?php echo $d['program_studi'] == "Perhotelan" ? "selected=\"selected\"" : ""; ?>>Perhotelan</option>
						<option value="Komputerisasi Akuntansi" <?php echo $d['program_studi'] == "Komputerisasi Akuntansi" ? "selected=\"selected\"" : ""; ?>>Komputerisasi Akuntansi</option>
						<option value="Teknik Telekomunikasi" <?php echo $d['program_studi'] == "Teknik Telekomunikasi" ? "selected=\"selected\"" : ""; ?>>Teknik Telekomunikasi</option>
						<option value="Teknik Informatika" <?php echo $d['program_studi'] == "Teknik Informatika" ? "selected=\"selected\"" : ""; ?>>Teknik Informatika</option>
						<option value="Teknik Komputer" <?php echo $d['program_studi'] == "Teknik Komputer" ? "selected=\"selected\"" : ""; ?>>Teknik Komputer</option>
						<option value="Sistem Multimedia" <?php echo $d['program_studi'] == "Sistem Multimedia" ? "selected=\"selected\"" : ""; ?>>Sistem Multimedia</option>
					</select>
				</td>
			</tr>
			<tr>
				<td valign="top">Fakultas</td>
				<td>
					<select name="fakultas">
						<option value="">-- Fakultas --</option>
						<option value="FIT" <?php echo $d['fakultas'] == "FIT" ? "selected=\"selected\"" : ""; ?>>FIT</option>
						<option value="FKB" <?php echo $d['fakultas'] == "FKB" ? "selected=\"selected\"" : ""; ?>>FKB</option>
						<option value="FEB" <?php echo $d['fakultas'] == "FEB" ? "selected=\"selected\"" : ""; ?>>FEB</option>
						<option value="FIK" <?php echo $d['fakultas'] == "FIK" ? "selected=\"selected\"" : ""; ?>>FIK</option>
						<option value="FTE" <?php echo $d['fakultas'] == "FTE" ? "selected=\"selected\"" : ""; ?>>FTE</option>
						<option value="FRI" <?php echo $d['fakultas'] == "FRI" ? "selected=\"selected\"" : ""; ?>>FRI</option>
						<option value="FIF" <?php echo $d['fakultas'] == "FIF" ? "selected=\"selected\"" : ""; ?>>FIF</option>
					</select>
				</td>
			</tr>
			<tr>
				<td valign="top">Asal</td>
				<td><input type="text" name="asal" value="<?php echo $d['asal']; ?>" required></td>
			</tr>
			<tr>
				<td valign="top">Motto Hidup</td>
				<td><textarea name="motto" required><?php echo $d['motto']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit">
				</td>
			</tr>
		</table>
	</form>
    <?php } ?>
	<a href="list_data.php">List Data Mahasiswa</a>
</body>
</html>
