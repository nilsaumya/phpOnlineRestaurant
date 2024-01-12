<?php
require_once('config.php');
$items_id=$_GET['items_id'];
$del="DELETE FROM items WHERE items_id=$items_id";
$res=mysqli_query($con,$del) or die(mysqli_error($con));
if($res==1){
    header('location:items.php?msg= data deleted');
}else{
    header('location:items.php?msg= data not deleted');

}
?>