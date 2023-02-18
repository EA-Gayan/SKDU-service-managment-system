<?php 
include('../config/constant.php');

//Check whether the id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
//Get the value and Delete
//echo "Get Value and Delete";
$id = $_GET['id'];
$image_name = $_GET['image_name'];

//Remove the physical image file is available
if($image_name != "")
{
//Image is Available. So remove it
$path = "../images/category/".$image_name;
//REmove the Image
$remove = unlink($path);

//IF failed to remove image then add an error message and stop the prod
if($remove==false)
        {
        $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
        //REdirect to Manage Category page
        header("location:".SITEURL.'admin/manage-category.php');
        //Stop the Process
        die();
        }
    }
    //Delete sql query
    $sql="DELETE FROM tbl_category WHERE id=$id";
    $res= mysqli_query($conn,$sql);

    if($res==true){
        $_SESSION["delete"] = "<div class='success'>Category successfully deleted. </div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else{
        $_SESSION["delete"] = "<div class='error'>Failed to delete Category. Try again later. </div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
}
else{

//redirect to Manage Category Page
header("location:".SITEURL.'admin/manage-category.php');
}
?>