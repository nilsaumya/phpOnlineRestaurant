<?php
require("config.php");
require("checksession.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php require('nav.php');
  ?>
  <div class="content-wrapper">
  <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">All Menu</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Add New Menu</h1>
          <div class="container">
            <div class="col-7">
                <form name ="frm" method="post">
                    <div class="form-group">
                        <label for="a_name">Enter Area name</label>
                        <input type="text" name="a_name" class="form-control">
                        
                    </div>
                    <input type="submit" name="ok" value="Add New" class="btn btn-primary">
                </form>
                <?php
                if(isset($_POST['ok'])){
                   $a_name=$_POST['a_name'];
                    $sql="INSERT INTO area (a_name)VALUES('$a_name')";
                    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
                    if($res==1){
                        ?>
                        <div class="alert alert-success">
                            New area add is successfully
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class= "alert alert-danger">
                            new area is not unsuccessful
                        </div>
                        <?php
                    }
                    }
                    ?> 
            </div>
          </div>
    </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require('footer.php');
    ?>