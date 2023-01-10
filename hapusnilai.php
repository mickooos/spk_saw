<?php 
require 'config/koneksi.php';
$id=$_GET['id'];

$sql=mysqli_query($conn, "delete from matriks where id_alternatif='$id' ");
if($sql)
{
	echo "<script>alert('Data Berhasil Dihapus'); window.location = 'dashboard.php?url=mtrx_keputusan';</script>";
}

?>