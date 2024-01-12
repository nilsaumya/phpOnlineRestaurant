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
          <?php
           $src="SELECT * FROM menu ORDER BY m_name";
           $rs=mysqli_query($con,$src)or die(mysqli_error($con));
          ?>
          <div class="container">
            <div class="col-7">
                <form name ="frm" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="i_name">Enter item name</label>
                        <input type="text" name="i_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="i_price">Enter item price</label>
                        <input type="text" name="i_price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="spicy">Select spicy</label>
                        <select name="spicy" class="form-control">
                          <option>-Select-</option>
                          <option value="Low">Low</option>
                          <option value="Medium">Medium</option>
                          <option value="High">High</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="i_image">Select item image</label>
                        <input type="file" name="i_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">Select menu</label>
                        <select name="menu_id" class="form-control">
                          <option>-Select-</option>
                          <?php
                          while($mrec=mysqli_fetch_assoc($rs)){
                            echo '<option value="'.$mrec['menu_id'].'">'.ucfirst($mrec['m_name']).'['.ucfirst($mrec['type']).']</option>';
                          }
                          ?>
                        </select>
                    </div>
                    <input type="submit" name="ok" value="Add New" class="btn btn-primary">
                </form>
                <?php
                if(isset($_POST['ok'])){
                    $fname=$_FILES['i_image']['name'];
                    $i_name=$_POST['i_name'];
                    $i_price=$_POST['i_price'];
                    $spicy=$_POST['spicy'];
                    $menu_id=$_POST['menu_id'];
                    $ftypeArr=array('jpg','JPG','jpeg','JPEG','png','PNG','webp','WEBP');
                    $fileArr=explode(".",$fname);
                    $fext=end($fileArr);
                    if(in_array($fext, $ftypeArr)){
                        $ct=str_replace(".","_",microtime(true));
                        $i_image="../item_img/".rand(000000,999999)."_".$ct."_".$fname;
                        if(move_uploaded_file($_FILES['i_image']['tmp_name'], $i_image)){
                            $sql="INSERT INTO items (i_name, i_price, spicy, i_image, menu_id) VALUES ('$i_name','$i_price', '$spicy', '$i_image', '$menu_id')";
                            $res=mysqli_query($con, $sql)or die(mysqli_error($con));
                            if($res==1){
                                echo "Item add successfully";
                            }else{
                                echo "Item not add successfully";
                            }
                        }else{
                            echo "Item not add successfully";
                        }
                    }else{
                        echo "Please select only jpg, jpeg or png file";
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