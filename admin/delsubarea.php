<?php
require_once('config.php');
$sub_id=$_GET['sub_id'];
$del="DELETE FROM Subarea WHERE sub_id=$sub_id";
$res=mysqli_query($con,$del) or die(mysqli_error($con));
if($res==1){
    header('location:subarea.php?msg= data deleted');
}else{
    header('location:subarea.php?msg= data not deleted');

}
?>