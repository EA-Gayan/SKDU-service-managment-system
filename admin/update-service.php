<?php include('partials/menu.php'); ?>

<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql2="SELECT * FROM tbl_service where id=$id";

    $res2= mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($res2);

    $title=$row2['title'];
    $description=$row2['description'];
    $otime=$row2['otime'];
    $ctime=$row2['ctime'];
    $current_image=$row2['image_name'];
    $current_category=$row2['category_id'];
    $featured=$row2['featured'];
    $active=$row2['active'];

}
else
{
    header('location:'.SITEURL.'admin/manage-service.php');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Service</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
                       <tr>
                            <td>Title:</td>
                            <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td><textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Open Time:</td>
                            <td><input type="time" name="otime" value="<?php echo $otime; ?>"></td>
                        </tr>
                        <tr>
                            <td>Closed Time:</td>
                            <td><input type="time" name="ctime" value="<?php echo $ctime; ?>" ></td>
                        </tr>
                        <tr>
                            <td>Current Image:</td>
                            <td>
                                <?php
                                if($current_image == "")
                                {
                                echo "<div class='error'>Image not Available </div>";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/service/<?php echo $current_image; ?>"width="100px">
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>New Image:</td>
                            <td><input type="file" name="image" ></td>
                        </tr>
                        <tr>
                            <td>Category:</td>
                            <td>
                                <select name="category">
                                    <?php
                                    //create sql to get all active category
                                    $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                                    $res= mysqli_query($conn,$sql);
                                    $count=mysqli_num_rows($res);
                                    //if count is greater than 0 have categoty
                                    if($count>0){
                                        while($row=mysqli_fetch_assoc($res)){
                                            $category_id=$row['id'];
                                            $category_title=$row['title'];
                                            ?>

                                            <option <?php if($current_category=$category_id){echo "selected";}?>value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                        <option value="0">No category found</option>
                                        <?php
                                    }
                                    //display on dropdown
                                    ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> Featured:</td>
                            <td>
                                <input <?php if($featured=="Yes") {echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                                <input <?php if($featured=="No") {echo "checked";}?> type="radio" name="featured" value="No">No
                            </td>

                       </tr>
                       <tr>
                            <td> Active:</td>
                            <td>
                               <input <?php if($active=="Yes") {echo "checked";}?> type="radio" name="active" value="Yes">Yes
                               <input <?php if($active=="No") {echo "checked";}?> type="radio" name="active" value="No">No
                            </td>
                       </tr>
                       <tr>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <br><input type="submit" name="submit" value="Update Service" class="btn-secondary">
                            </td>
                       </tr>
       </table>
       </form>
       <?php
       if(isset($_POST['submit']))
       {
            $id=$_POST['id'];
            $title=$_POST['title'];
            $description=$_POST['description'];
            $otime=$_POST['otime'];
            $ctime=$_POST['ctime'];
            $current_image=$_POST['current_image'];
            $category=$_POST['category'];
            $featured=$_POST['featured'];
            $active=$_POST['active'];


            if(isset($_FILES['image']['name']))
            {
                $image_name=$_FILES['image']['name'];

                //check whether the file availble
                if($image_name!="")
                {
                    $ext = end(explode('.',$image_name));
                    $image_name="service_category".rand(000,999).'.'.$ext;

                    //get the sourse and destination path
                    $src_path = $_FILES['image']['tmp_name'];
                    $dest_path = "../images/service/".$image_name;

                    //upload the image
                    $upload= move_uploaded_file($src_path,$dest_path);

                    //check upload or not
                    if($upload==false)
                    {
                        $_SESSION['upload']="<div class='error'>Failed to upload new image.</div>";
                        header('location:'.SITEURL.'admin/manage-service.php');
                        die();                    
                    }
                    //remove the current image
                    if($current_image!="")
                    {
                        $remove_path = "../images/service/".$current_image;
                        $remove = unlink($remove_path);

                        if($remove==true)
                        {
                            $_SESSION['failed-remove']="<div class='error'>Failed to remove current image.</div>";
                            header('location:'.SITEURL.'admin/manage-service.php');
                            die();
                         }

                    } 
            }
            else
            {
                $image_name=$current_image;
            }
        }
        else{
            $image_name=$current_image;
   
        }

            $sql3 = "UPDATE tbl_service SET
            title= '$title',
            description = '$description',
            otime = '$otime',
            ctime = '$ctime',
            image_name= '$image_name',
            category_id= '$category',
            featured= '$featured',
            active='$active'
            WHERE id=$id
            ";
            $res3 = mysqli_query($conn, $sql3);

            if($res3==true)
            {
                $_SESSION['update']="<div class='success'>Service Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-service.php');           
            }
            else
            {
                $_SESSION['update']="<div class='error'>Failed to update Service.</div>";
                header('location:'.SITEURL.'admin/manage-service.php');               
            }
       }

       ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
