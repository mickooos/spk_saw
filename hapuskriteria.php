<?php 
require 'config/koneksi.php';
$id=$_GET['id'];

$sql=mysqli_query($conn, "delete from kriteria where id_kriteria='$id' ");
if($sql)
{
	echo "<script>alert('Data Berhasil Dihapus'); window.location = 'dashboard.php?url=kriteria';</script>";
}

?>