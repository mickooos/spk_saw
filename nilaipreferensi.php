<?php
if(!isset($_SESSION['username']))
{
?>
<script type="text/javascript">
	alert ('Anda Belum Login');
	window.location='index.php';
</script>
<?php
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HOME PAGE</title>
  
</head>
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

body {
  font-family: "Verdana";
}

.navbar {
  width: 100%;
  background-color: royalblue;
  overflow: auto;
  color: white;
}

</style>

<?php
    ob_start();
    // Import Matriks Keputusan & Ternormalisasi
    require('mtrx_keputusan.php');
    require('mtrx_ternormalisasi.php');
    $data = ob_get_clean(); 

    // Fetch Kolom Bobot dari Tabel Kriteria
    $sql = mysqli_query($conn, "SELECT bobot FROM kriteria ORDER BY id_kriteria");
    $i = 0;
    $W = array();
    while ($data = mysqli_fetch_object($sql)) {
        $W[] = $data->bobot;
    }

?>

<body>
<br>
<div class="card shadow mb-5">
    <div class="card-header py-3" style="text-align: center; background-color: #167395; color: white; font-weight:bold">Nilai Preferensi (P)</div>
    
    <div class="card-body">
        <div>
            <p style="color: black;">
                Tabel Berikut Ini Menampilkan Nilai Preferensi (P) yang merupakan 
                Penjumlahan dari perkalian matriks Ternormalisasi (R) dengan vektor Bobot (W).  
            </p>
        <div>
        <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                 <tr>
                    <th scope="col" style="color: black;">No</th>
                    <th scope="col" style="color: black; text-align: center;">Alternatif</th>
                    <th scope="col" style="color: black; text-align: center;">Hasil</th>
                  </tr>
                </thead>

                  <?php
                      $P = array();
                      $m = count($W);
                      $no = 0;

                      foreach ($R as $i => $r) {
                         for ($j = 0; $j < $m; $j++) {
                            $P[$i] = (isset($P[$i]) ? $P[$i] : 0) + $r[$j] * $W[$j]; 
                         }
                        $no++;
                   ?>

                    <tbody>
                      <tr>
                        <th scope="row" style="color: black"><?php echo "$no"; ?></th> 
                        <th scope="row" style="color: black">A<sub><?php echo "$i"; ?></sub></th> 
                        <td style="color: black"><?php echo $P[$i]; ?></td>
                      </tr>
                    </tbody>
                <?php } ?>
          </table>
        </div>
    </div>
</div>

        
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>