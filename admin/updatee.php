<?php
require("config.php");
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
        <li class="breadcrumb-item active">Update Menu</li>
      </ol>
      <div class="row">
        <div class="col-12">
        <?php
             $menu_id=$_GET['menu_id'];
             $src="SELECT * FROM menu WHERE menu_id=$menu_id";
             $rs=mysqli_query($con, $src)or die(mysqli_error($con));
             $rec=mysqli_fetch_assoc($rs);
            ?>
          <h1>Update Menu</h1>
          <div class="container">
            <div class="col-7">
                <form name ="frm" method="post">
                    <div class="form-group">
                        <label for="m_name">Enter menu name</label>
                        <input type="text" name="m_name" class="form-control"  value="<?php echo $rec['m_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="type">Enter menu type</label>
                        <input type="text" class="form-control" name="type"  value="<?php echo $rec['type']?>">
                    </div>
                    <input type="submit" name="ok" value="Save changes" class="btn btn-primary">
                </form>
                <?php
                if(isset($_POST['ok'])){
                    $m_name=$_POST['m_name'];
                    $type=$_POST['type'];
                    $upd="UPDATE menu SET m_name='$m_name', type='$type' WHERE menu_id=$menu_id";
                    $res=mysqli_query($con, $upd)or die(mysqli_error($con));
                    if($res==1){
                        header('location:menu.php?msg=menu data update successfully');
                }else{
                     header('location:menu.php?msg=menu data not update successfully');
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