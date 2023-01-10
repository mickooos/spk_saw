<?php 
require 'config/koneksi.php';

$id=$_POST['id_alternatif'];
$nama=$_POST['nama'];

	$sql=mysqli_query($conn, "UPDATE alternatif SET nama_alternatif='$nama' WHERE id_alternatif='$id' ");
	if ($sql)
	{
		echo "<script>alert('Data Berhasil Diubah'); window.location = 'dashboard.php?url=alternatif';</script>";
	}	

?>

