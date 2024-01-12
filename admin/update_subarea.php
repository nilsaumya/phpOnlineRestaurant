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
        <li class="breadcrumb-item active">Update Area</li>
      </ol>
      <div class="row">
        <div class="col-12">
        <?php
             $sub_id=$_GET['sub_id'];
             $src="SELECT s.*, a.* FROM Subarea s INNER JOIN area a ON s.area_id=a.area_id WHERE s.sub_id=$sub_id";
             $rs=mysqli_query($con, $src)or die(mysqli_error($con));
             $rec=mysqli_fetch_assoc($rs);
            ?>
          <h1>Update subarea</h1>
          <?php
          $src="SELECT * FROM area ORDER BY a_name";
          $rs=mysqli_query($con,$src)or die(mysqli_error($con));
          ?>
          <div class="container">
            <div class="col-7">
                <form name ="frm" method="post">
                  <div class="form-group">
                        <label for="area_id">Select Area name</label>
                        <select name="area_id" class="form-control">
                        <option value="<?php echo $rec['area_id']?>"><?php echo ucfirst($rec['a_name']) ?></option>
                          <?php
                          while($arec=mysqli_fetch_assoc($rs)){
                            echo '<option value="'.$arec['area_id'].'">'.ucfirst($arec['a_name']).'</option>';
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="s_area">Enter subarea name</label>
                        <input type="text" name="s_area" class="form-control"  value="<?php echo $rec['s_area']?>">
                    </div>
                
                    <input type="submit" name="ok" value="Save changes" class="btn btn-primary">
                </form>
                <?php
                if(isset($_POST['ok'])){
                    $area_id=$_POST['area_id'];
                    $s_area=$_POST['s_area'];
                    $upd="UPDATE Subarea SET s_area='$s_area', area_id=$area_id WHERE sub_id=$sub_id";
                    $res=mysqli_query($con, $upd)or die(mysqli_error($con));
                    if($res==1){
                        header('location:subarea.php?msg=subarea data update successfully');
                }else{
                     header('location:subarea.php?msg=subarea data not update successfully');
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