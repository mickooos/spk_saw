<?php 
require 'config/koneksi.php';

$idalt=$_POST['id_alternatif'];
$idkrit=$_POST['id_kriteria'];
$nilai=$_POST['nilai'];

	$sql=mysqli_query($conn, "INSERT INTO matriks VALUES ('$idalt', '$idkrit', '$nilai')");
	if ($sql)
	{
		echo "<script>alert('Data Berhasil Tersimpan'); window.location = 'dashboard.php?url=mtrxkeputusan';</script>";
	}	

?>

