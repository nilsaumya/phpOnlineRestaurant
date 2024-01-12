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
        <li class="breadcrumb-item active">All subarea</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1 class="text-center">All subarea</h1>
          <a href="addsubarea.php" class="btn btn-info">Add New</a>

        <?php
        if(isset($_GET['msg'])){
            ?>
            <div class="alert alert-primary">
                <?php
                echo $_GET['msg'];
                ?>
            </div>   
            <?php 
        }
    
        $src="SELECT s.*, a.* FROM Subarea s INNER JOIN area a ON s.area_id=a.area_id";
        $rs=mysqli_query($con,$src)or die(mysqli_error($con));
        if(mysqli_num_rows($rs)>0){
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name of area</th>
                        <th>Name of their subarea</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>   
                </thead>
                <tbody>        
                <?php
                while($rec=mysqli_fetch_assoc($rs)){
                    ?>
                    <tr>
                        <td><?php echo $rec['a_name']?></td>
                        <td><?php echo $rec['s_area']?></td>
                        <td><a href="update_subarea.php?sub_id=<?php echo $rec['sub_id']?>"<i class="far fa-edit text-primary"></i></a></td>
                        <td><a href="delsubarea.php?sub_id=<?php echo $rec['sub_id']?>"<i class="fas fa-trash text-danger"></i></a></td>
                    </tr>
                    </tr>
                    <?php  
                }    
                ?>
                </tbody>

            </table>
            <?php
        }else{
            ?>
            <h4 class="text-center text-danger">Sorry no records found</h4>
            <?php
        }
        ?>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require('footer.php');
    ?>