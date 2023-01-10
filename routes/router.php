<?php
if (isset($_GET['url']))
{
	$url=$_GET['url'];

	switch($url)
	{  
		case 'alternatif';
		include 'alternatif.php';
		break;

		case 'tambahalternatif';
		include 'tambahalternatif.php';
		break;

		case 'editalternatif';
		include 'editalternatif.php';
		break;

        case 'kriteria';
		include 'kriteria.php';
		break;

		case 'tambahkriteria';
		include 'tambahkriteria.php';
		break;

		case 'editkriteria';
		include 'editkriteria.php';
		break;

		case 'mtrxkeputusan';
		include 'mtrx_keputusan.php';
		break;

		case 'tambahnilai';
		include 'tambahnilai.php';
		break;

		case 'mtrxternormalisasi';
		include 'mtrx_ternormalisasi.php';
		break;

		case 'nilaipreferensi';
		include 'nilaipreferensi.php';
		break;
	}
}
else
{
	?>
    <br>
	<div class="h3 mb-0 font-weight-bold" style="color: black;">
		SISTEM PENDUKUNG KEPUTUSAN UNIVERSITAS TERBAIK <br>
		Metode SAW (Simple Additive Weighting) <br>
		<hr>
		Selamat Datang <?php echo $_SESSION['username']; ?> !
	</div>

<?php  
}
?>