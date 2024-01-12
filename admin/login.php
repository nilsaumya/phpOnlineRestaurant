<?php require_once('config.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Restaurant Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Login</div>
      <div class="card-body">
        <form name="log-frm" method="post">
          <div class="form-group">
            <label for="email">Email address</label>
            <input class="form-control" id="email" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="pass">Password</label>
            <input class="form-control" id="pass" type="password" name="pass" placeholder="Password">
          </div>
          
          <input type="submit" class="btn btn-primary btn-block mb-3" name="ok" value="Login">
        </form>
        <?php
            if(isset($_POST['ok'])){
                $email=$_POST['email'];
                $pass=$_POST['pass'];
                $src="SELECT * FROM admin WHERE email='$email' AND pass='$pass'";
                $rs=mysqli_query($con, $src)or die(mysqli_error($con));
                if(mysqli_num_rows($rs)>0){
                    $rec=mysqli_fetch_assoc($rs);
                    $_SESSION['info']=$rec;
                    header('location:index.php');
                }else{
                    ?>
                    <div class="alert alert-danger">
                        Invalid eamil or password
                    </div>
                    <?php
                }
            }
            ?>
        
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
