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
    <div class="card-header py-3" style="text-align: center; background-color: #167395; color: white; font-weight:bold">Matriks Keputusan (X)</div>

    <div class="card-body">
        <a href="dashboard.php?url=tambahnilai" class="btn btn-success btn-icon-split" style="background: #167395">
          <span class="icon text-white-50">
            <i class="fas fa-user-plus"></i>
          </span>
          <span class="text" style="font-weight: bold;">Isi Nilai</span>
        </a>

        <br> 
        <br>

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
                    <th scope="col" style="color: black">Action</th>
                  </tr>
                </thead>

                  <?php
                    require 'config/koneksi.php';
                    $no=0;
                    $sql=mysqli_query($conn, "SELECT x.id_alternatif, y.nama_alternatif,
                                              SUM(IF(x.id_kriteria=1,x.nilai,0)) AS C1,
                                              SUM(IF(x.id_kriteria=2,x.nilai,0)) AS C2,
                                              SUM(IF(x.id_kriteria=3,x.nilai,0)) AS C3,
                                              SUM(IF(x.id_kriteria=4,x.nilai,0)) AS C4
                                              FROM matriks x JOIN alternatif y
                                              USING (id_alternatif)
                                              GROUP BY x.id_alternatif
                                              ORDER BY x.id_alternatif
                                    "); 
                    $X = array(1 => array(), 2 => array(), 3 => array(), 4 => array());
                    while ($data=mysqli_fetch_object($sql)) {
                        $no++;
                        array_push($X[1], round($data->C1, 2));
                        array_push($X[2], round($data->C2, 2));
                        array_push($X[3], round($data->C3, 2));
                        array_push($X[4], round($data->C4, 2));
                   ?>

                    <tbody>
                      <tr>
                        <th scope="row" style="color: black"><?php echo "$no"; ?></th> 
                        <th scope="row" style="color: black">A<sub><?php echo $data->id_alternatif; ?></sub>  <?php echo $data->nama_alternatif ?></th> 
                        <th style="color: black">
                          <table>
                              <tr>
                                  <td><?php echo round($data->C1, 2) ?></td>
                                  <td><?php echo round($data->C2, 2) ?></td>
                                  <td><?php echo round($data->C3, 2) ?></td>
                                  <td><?php echo round($data->C4, 2) ?></td>
                              </tr>
                          </table>
                        </th>
                        <td>
                            <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', 'hapusnilai.php?id=<?php echo $data->id_alternatif ?>' )" class="btn btn-danger btn-circle" style="background: #c43939">
                              <i class="fa fa-trash-alt"></i>
                            </a>
                        </td>
                      </tr>
                    </tbody>
                <?php } ?>
          </table>
    </div>
</div>
        
  <!-- Delete-->
  <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background: #c43939">
          <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; color: white;">Ingin Hapus Data Ini?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" style="color: white;">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formDelete" action="" method="POST">
            <button class="btn btn-danger" style="background: #c43939" type="submit" sty>Hapus</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>
  
</body>

</html>