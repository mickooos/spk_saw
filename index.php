<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LOGIN</title>

  <link rel="icon" href="assets/img/icon.png">
  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/main.css" rel="stylesheet">

</head>
<style>
    body
    {
        background: rgb(34,193,195);
        background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(21,74,110,1) 66%);
        margin-top: 100px;
    }
    .error 
    {
			  font-size: 11px;
        font-weight: bold;
        position: relative;
        left: 10px;
        margin-bottom: 6px;
			  color: firebrick;
		}
</style>

<?php
require 'config/koneksi.php';
  
function validate($data)
{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}

$usernameErr = $passwordErr = NULL;
$username = $password = NULL;
$flag = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (empty($_POST["username"])) 
    {
        $usernameErr = "*Username Belum Diisi";
        $flag = false;
    } 
    else 
    {
        $username=validate($_POST['username']);
    }

    if (empty($_POST["password"])) 
    {
        $passwordErr = "*Password Belum Diisi";
        $flag = false;
    } 
    else 
    {
        $password=validate($_POST['password']);
    }
    
    // login user
    if($flag)
    {
        $sql=mysqli_query($conn, "select * from users where username='$username' and password='$password' ");
        $cek=mysqli_num_rows($sql);
      
        if ($cek>0)
        {
          $data=mysqli_fetch_assoc($sql);
          session_start();
          
          $_SESSION['username']=$username;
          $_SESSION['password']=$password;
          $_SESSION['nama']=$data['nama'];
          
          header('location:dashboard.php');
        }
        else
        {
            echo "<script>alert('Username/Password Tidak Ditemukan'); window.location = 'index.php';</script>";
        }
    }	
}
?>

<body>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="col">
                <div class="p-5">
                  <div class="text-center">
                    <h1 style="font-weight: bold; color: black; font-size: 30px; margin-bottom: 15px;">Selamat Datang</h1>
                   
                  </div>
                  <form class="user" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" placeholder="Username" value="<?= $username; ?>">
                      <span class="error"> <?= $usernameErr; ?></span>
                    </div>

                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" placeholder="Password" value="<?= $password; ?>">
                      <span class="error"> <?= $passwordErr; ?></span>
                    </div>


                    <div class="form-group">
      
                    </div>
                    <input type="submit" class="btn btn-secondary btn-user btn-block" name="login" value="LOGIN" style="background: #154a6e; font-weight: bold;">
                
                  </form>  
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/main.js"></script>

</body>

</html>


