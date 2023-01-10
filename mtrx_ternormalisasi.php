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


<body>
<br>
<div class="card shadow mb-5">
    <div class="card-header py-3" style="text-align: center; background-color: #167395; color: white; font-weight:bold">Matriks Ternormalisasi (R)</div>

    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                 <tr>
                    <th scope="col" style="color: black">No</th>
                    <th scope="col" style="color: black">Alternatif</th>
                    <th scope="col" style="color: black; text-align: center;">Kriteria
                        <table style="margin-top: 10px;">
                            <tr>
                                <td>C<sub>1</sub></td>
                                <td>C<sub>2</sub></td>
                                <td>C<sub>3</sub></td>
                                <td>C<sub>4</sub></td>
                            </tr>
                        </table>    
                    </th>
                  </tr>
                </thead>

                  <?php
                    require 'config/koneksi.php';
                    ob_start();
                    require('mtrx_keputusan.php');
                    $data = ob_get_clean();

                    $no=0;
                    $sql=mysqli_query($conn, "SELECT x.id_alternatif,
                                                SUM(
                                                    IF(
                                                    x.id_kriteria=1,
                                                    IF(
                                                        y.atribut='biaya',
                                                        x.nilai/" . max($X[1]) . ",
                                                        " . min($X[1]) . "/x.nilai)
                                                    ,0)
                                                    ) AS C1,
                                                SUM(
                                                    IF(
                                                    x.id_kriteria=2,
                                                    IF(
                                                        y.atribut='keuntungan',
                                                        x.nilai/" . max($X[2]) . ",
                                                        " . min($X[2]) . "/x.nilai)
                                                    ,0)
                                                    ) AS C2,
                                                SUM(
                                                    IF(
                                                    x.id_kriteria=3,
                                                    IF(
                                                        y.atribut='keuntungan',
                                                        x.nilai/" . max($X[3]) . ",
                                                        " . min($X[3]) . "/x.nilai)
                                                    ,0)
                                                    ) AS C3,
                                                SUM(
                                                    IF(
                                                    x.id_kriteria=4,
                                                    IF(
                                                        y.atribut='keuntungan',
                                                        x.nilai/" . max($X[4]) . ",
                                                        " . min($X[4]) . "/x.nilai)
                                                    ,0)
                                                    ) AS C4
                                              FROM matriks x JOIN kriteria y USING (id_kriteria)
                                              GROUP BY x.id_alternatif
                                              ORDER BY x.id_alternatif
                                     ");        
                    $R = array();
                    while ($data=mysqli_fetch_object($sql)) {
                        $no++;
                        $R[$data->id_alternatif] = array($data->C1, $data->C2, $data->C3, $data->C4);
                   ?>

                    <tbody>
                      <tr>
                        <th scope="row" style="color: black"><?php echo "$no"; ?></th> 
                        <th scope="row" style="color: black">A<sub><?php echo $data->id_alternatif; ?></sub></th> 
                        <th style="color: black;">
                          <table>
                              <tr>
                                  <td style="width: 250px"><?php echo round($data->C1, 2) ?></td>
                                  <td style="width: 250px"><?php echo round($data->C2, 2) ?></td>
                                  <td style="width: 250px"><?php echo round($data->C3, 2) ?></td>
                                  <td style="width: 250px"><?php echo round($data->C4, 2) ?></td>
                              </tr>
                          </table>
                        </th>
                      </tr>
                    </tbody>
                <?php } ?>
          </table>
    </div>
</div>

</body>

</html>