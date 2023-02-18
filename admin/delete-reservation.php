<?php

//include constant file
include('../config/constant.php');

//get the admin id to delete
$id = $_GET['res_id'];

//create sql query to delete admin
$sql = "DELETE FROM reservations WHERE res_id=$id";

//execute the qury
$res= mysqli_query($conn,$sql);

if($res==true){
    $_SESSION["delete"] = "<div class='success'>Reservation successfully deleted. </div>";
    header('location:'.SITEURL.'admin/appointment.php');
}
else{
    $_SESSION["delete"] = "<div class='error'>Failed to delete Reservation. Try again later. </div>";
    header('location:'.SITEURL.'admin/appointment.php');

}
?>

