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
    <div class="card-header py-3" style="text-align: center; background-color: #167395; color: white; font-weight:bold">Data Alternatif</div>

    <div class="card-body">
        <a href="dashboard.php?url=tambahalternatif" class="btn btn-success btn-icon-split" style="background: #167395">
          <span class="icon text-white-50">
            <i class="fas fa-user-plus"></i>
          </span>
          <span class="text" style="font-weight: bold;">Tambah Data</span>
        </a>

        <br> 
        <br>

        <div>
            <p style="color: black; font-weight: bold">Tabel Berikut Ini Menampilkan Nama - Nama Universitas Yang Akan Dievaluasi.</p>
        <div>
        <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                 <tr>
                    <th scope="col" style="color: black">No</th>
                    <th scope="col" style="color: black">Nama Universitas</th>
                    <th scope="col" style="color: black">Action</th>
                  </tr>
                </thead>

                  <?php
                  require 'config/koneksi.php';
                  $no=0;
                  $sql=mysqli_query($conn, "select * from alternatif");
                  while ($data=mysqli_fetch_array($sql)) {
                  $no++;
                   ?>

                    <tbody>
                    <tr>
                      <th scope="row" style="color: black"><?php echo "$no"; ?></th> 
                      <td style="color: black"><?php echo $data['nama_alternatif']; ?></td>
                      <td>
                            <a href="dashboard.php?url=editalternatif&id=<?php echo $data['id_alternatif']; ?>" class="btn btn-secondary btn-circle" style="background: #2b4280">
                              <i class="fa fa-edit"></i>
                            </a>

                            <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', 'hapusalternatif.php?id=<?php echo $data['id_alternatif']; ?>' )" class="btn btn-danger btn-circle" style="background: #c43939">
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