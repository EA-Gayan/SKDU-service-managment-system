<?php

//include constant file
include('../config/constant.php');

//get the admin id to delete
$id = $_GET['id'];

//create sql query to delete admin
$sql = "DELETE FROM users WHERE id=$id";

//execute the qury
$res= mysqli_query($conn,$sql);

if($res==true){
    $_SESSION["delete"] = "<div class='success'>Admin successfully deleted. </div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    $_SESSION["delete"] = "<div class='error'>Failed to delete Admin. Try again later. </div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

}
?>

