<?php 
require 'config/koneksi.php';

$id=$_POST['id_kriteria'];
$kriteria=$_POST['kriteria'];
$bobot=$_POST['bobot'];
$atribut=$_POST['atribut'];

	$sql=mysqli_query($conn, "UPDATE kriteria SET kriteria='$kriteria', bobot='$bobot', atribut='$atribut' WHERE id_kriteria='$id' ");
	if ($sql)
	{
		echo "<script>alert('Data Berhasil Diubah'); window.location = 'dashboard.php?url=kriteria';</script>";
	}	

?>

