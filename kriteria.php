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
    <div class="card-header py-3" style="text-align: center; background-color: #167395; color: white; font-weight:bold">Data Kriteria</div>

    <div class="card-body">
        <a href="dashboard.php?url=tambahkriteria" class="btn btn-success btn-icon-split" style="background: #167395">
          <span class="icon text-white-50">
            <i class="fas fa-user-plus"></i>
          </span>
          <span class="text" style="font-weight: bold;">Tambah Data</span>
        </a>

        <br> 
        <br>

        <div>
            <p style="color: black; font-weight: bold">Tabel Berikut Ini Menampilkan Bobot Preferensi dari Setiap Kriteria.</p>
        <div>
        <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                 <tr>
                    <th scope="col" style="color: black">No</th>
                    <th scope="col" style="color: black">Simbol</th>
                    <th scope="col" style="color: black">Kriteria</th>
                    <th scope="col" style="color: black">Bobot</th>
                    <th scope="col" style="color: black">Atribut</th>
                    <th scope="col" style="color: black">Action</th>
                  </tr>
                </thead>

                  <?php
                    require 'config/koneksi.php';
                    $no=0;
                    $sql=mysqli_query($conn, "select * from kriteria");
                    while ($data=mysqli_fetch_array($sql)) {
                    $no++;
                   ?>

                    <tbody>
                    <tr>
                      <th scope="row" style="color: black"><?php echo "$no"; ?></th> 
                      <th scope="row" style="color: black">C<sub><?php echo "$no"; ?></sub></th> 
                      <td style="color: black"><?php echo $data['kriteria']; ?></td>
                      <td style="color: black"><?php echo $data['bobot']; ?></td>
                      <td style="color: black"><?php echo $data['atribut']; ?></td>
                      <td>
                            <a href="dashboard.php?url=editkriteria&id=<?php echo $data['id_kriteria']; ?>" class="btn btn-secondary btn-circle" style="background: #2b4280">
                              <i class="fa fa-edit"></i>
                            </a>

                            <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', 'hapuskriteria.php?id=<?php echo $data['id_kriteria']; ?>' )" class="btn btn-danger btn-circle" style="background: #c43939">
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