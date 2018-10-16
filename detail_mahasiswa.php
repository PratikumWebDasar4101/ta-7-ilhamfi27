<?php
session_start();
if (isset($_SESSION['update_error'])) {
	echo $_SESSION['update_error'];
	unset($_SESSION['update_error']);
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
                    `id`,
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
                    `id` = '$id';
                ";
        $result = mysqli_query($conn, $query);
        $d = mysqli_fetch_array($result);
    ?>
	<table>
		<tr>
			<td valign="top">NIM</td>
			<td><?php echo $d['nim']; ?></td>
		</tr>
		<tr>
			<td valign="top">Nama</td>
			<td><?php echo $d['nama']; ?></td>
		</tr>
		<tr>
			<td valign="top">Jenis Kelamin</td>
			<td>
                <?php
                if ($d['jenis_kelamin'] == 'L') {
                    echo "Laki-Laki";
                } else {
                    echo "Perempuan";
                }
                ?>
            </td>
		</tr>
		<tr>
			<td valign="top">Program Studi</td>
			<td><?php echo $d['program_studi']; ?></td>
		</tr>
		<tr>
			<td valign="top">Fakultas</td>
			<td><?php echo $d['fakultas']; ?></td>
		</tr>
		<tr>
			<td valign="top">Asal</td>
			<td><?php echo $d['asal']; ?></td>
		</tr>
		<tr>
			<td valign="top">Motto Hidup</td>
			<td><?php echo $d['motto']; ?></td>
		</tr>
		<tr>
			<td></td>
			<td><a href="edit.php?id=<?php echo $d['id']; ?>">Edit</a></td>
		</tr>
	</table>
    <?php
    }
    ?>
	<a href="list_data.php">List Data Mahasiswa</a>
</body>
</html>
