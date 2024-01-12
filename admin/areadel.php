<?php
require_once('config.php');
$area_id=$_GET['area_id'];
$del="DELETE FROM area WHERE area_id=$area_id";
$res=mysqli_query($con,$del) or die(mysqli_error($con));
if($res==1){
    header('location:area.php?msg= data deleted');
}else{
    header('location:area.php?msg= data not deleted');

}
?>