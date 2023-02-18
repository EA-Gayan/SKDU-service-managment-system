<?php include('./partials/menu.php')?>
<div class="main-content">
    <div class="wrapper">
       <h2>Add Services</h2>
       <br><br>

       <?php
             if(isset($_SESSION['upload'])){
                echo $_SESSION['upload']; //display session
                unset ($_SESSION['upload']); //remove session
             }
             if(isset($_SESSION['add'])){
                echo $_SESSION['add']; //display session
                unset ($_SESSION['add']); //remove session
             }
       ?>       
       
       <form action="" method="POST" enctype="multipart/form-data">
       <table class="tbl-30">
                       <tr>
                            <td>Title:</td>
                            <td><input type="text" name="title" placeholder="Service Title"></td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td><textarea name="description" cols="30" rows="5" placeholder="Description of the service"></textarea></td>
                        </tr>
                        <tr>
                            <td>Open Time:</td>
                            <td><input type="time" name="otime" ></td>
                        </tr>
                        <tr>
                            <td>Closed Time:</td>
                            <td><input type="time" name="ctime" ></td>
                        </tr>
                        <tr>
                            <td>Select Image:</td>
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
                                            $id=$row['id'];
                                            $title=$row['title'];
                                            ?>
                                        <option value="<?php echo $id;?>"><?php echo $title;?></option>
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
                                <input type="radio" name="featured" value="Yes">Yes
                                <input type="radio" name="featured" value="No">No
                            </td>

                       </tr>
                       <tr>
                            <td> Active:</td>
                            <td>
                               <input type="radio" name="active" value="Yes">Yes
                               <input type="radio" name="active" value="No">No
                            </td>
                       </tr>
                       <tr>
                            <td colspan="2">
                            <br><input type="submit" name="submit" value="Add Service" class="btn-secondary">
                            </td>
                       </tr>
       </table>
       </form>

       <?php
       if(isset($_POST['submit']))
       {
           $title=$_POST['title'];
           $description=$_POST['description'];
           $otime=$_POST['otime'];
           $ctime=$_POST['ctime'];
           $category=$_POST['category'];
           
        if(isset($_POST['featured'])){
            $featured=$_POST['featured'];
        }
        else{
            $featured="No";
        }
        if(isset($_POST['active'])){
            $active=$_POST['active'];
        }
        else{
            $active="No";
        }

        //check whether the select image is clicked
        if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];
            if($image_name!="")
            {
                $ext = end(explode('.',$image_name));
                $image_name="service_category_".rand(000,999).'.'.$ext;
                $src = $_FILES['image']['tmp_name'];
                $dst="../images/service/".$image_name;
                $upload = move_uploaded_file( $src, $dst);
                if($upload==false)
                {
                    $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
                    header('location:'.SITEURL.'admin/add-service.php');
                    die();
                }
            }

        }
        else
        {
            $image_name="";
        }

        //sql query
        $sql2 = "INSERT INTO tbl_service SET
        title = '$title',
        description ='$description',
        otime = '$otime',
        ctime =  '$ctime',
        image_name='$image_name',
        category_id='$category',
        featured = '$featured',
        active =  '$active'
        ";

        $res2 = mysqli_query($conn,$sql2);
        if($res2==true)
        {
            $_SESSION['add']="<div class='success'>Service Added Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-service.php');
        }
        else
        {
            $_SESSION['add']="<div class='error'>Failed To Add Service.</div>";
            header('location:'.SITEURL.'admin/add-service.php');

        }       
    }
       ?>

    </div>
</div>                      
<?php include('./partials/footer.php')?>
