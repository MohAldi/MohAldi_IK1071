

<?php 
    session_start();
    require_once ('../Config/koneksi.php');
    require_once ('../Models/database.php');
    
    $koneksi = new Database($host, $user, $pass, $db);   

    include 'm_login.php';

    $username = new Login($koneksi);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../Assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../Assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login Admin </p>

      <form action="" method="POST" enctype="multipart/form-data">
       <div class="form-group">
         <label for="">Username</label>
         <input type="text" name="nama" id="nama" class="nama" class="form-control" >
       </div>     

       <div class="form-group">
         <label for="">Password</label>
         <input type="Password" name="kd_dosen" id="kd_dosen" class="form-control">
       </div>
          <div class="col-12">
            <button type="submit" name="login" value="login" class="btn btn-primary btn-block">Log In</button>
          </div>          
        </div>
      </form>  
      <?php 
        if(@$_POST['login']){
            $nama = $koneksi->conn->real_escape_string($_POST['nama']);
            $kd_dosen= ($koneksi->conn->real_escape_string($_POST['kd_dosen']));
            $oke = $username->LoginUser($nama,$kd_dosen); 
            if($oke->fetch_object()!= null){
              $_SESSION['loginadmin']=true;
              header('location:../');
            }                               
            
        }
      ?>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../Assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../Assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="../Assets/dist/js/adminlte.min.js"></script>
</body>
</html>
