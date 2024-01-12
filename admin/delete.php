<?php
require_once('config.php');
$menu_id=$_GET['menu_id'];
$del="DELETE FROM menu WHERE menu_id=$menu_id";
$res=mysqli_query($con,$del) or die(mysqli_error($con));
if($res==1){
    header('location:menu.php?msg= data deleted');
}else{
    header('location:menu.php?msg= data not deleted');

}
?>