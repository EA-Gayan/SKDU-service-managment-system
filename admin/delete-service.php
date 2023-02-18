<?php 
include('../config/constant.php');

//Check whether the id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //get ID AND IMAGE NAME
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];
    //remove the image
    if($image_name !="")
    {
        $path="../images/service/".$image_name;

        $remove=unlink($path);

        if($remove==false)
        {
            $_SESSION['upload'] = "<div class='error'>Failed to remove image.</div>";
            header('location:'.SITEURL.'admin/manage-service.php');
            die();
        }
    }
    //delete service from database
    $sql="DELETE FROM tbl_service WHERE id=$id";
    $res= mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>Service Removed Succefully.</div>";
        header('location:'.SITEURL.'admin/manage-service.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to remove service</div>";
        header('location:'.SITEURL.'admin/manage-service.php');
    }
    
}
else
{
    $_SESSION['unauthorized'] = "<div class='error'>Unauthorized Access.</div>";
    header('location:'.SITEURL.'admin/manage-service.php');

}
//Get the value and Delete
//echo "Get Value and Delete";

//redirect to Manage service Page

?>