<?php include('./partials/menu.php')?>
<div class="main-content">
        <div class="wrapper">
       <h2>Add Category</h2>
       <br><br>

       <?php
               if(isset($_SESSION['add'])){
                echo $_SESSION['add']; //display session
                unset ($_SESSION['add']); //remove session
             }
             if(isset($_SESSION['upload'])){
                echo $_SESSION['upload']; //display session
                unset ($_SESSION['upload']); //remove session
             }
       ?>
       <br><br>

       <!--Add category from form-->
       <form action="" method="POST" enctype="multipart/form-data">
       <table class="tbl-30">
                       <tr>
                            <td>Title:</td>
                            <td><input type="text" name="title" placeholder="Category Title"></td>
                       </tr>
                       <tr>
                           <td>Select image</td>
                           <td><input type="file" name="image"> </td>
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
                                <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                            </td>
                       </tr>
               </table>
       </form>
       <!--add data to database-->
       <?php
       if(isset($_POST['submit'])){
           $title=$_POST['title'];
        
        //for radio input
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

        //for image
        //print_r($_FILES['image']);
        //die();//break the code here
        if(isset($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];

            if($image_name!="")
            {

            //auto rename image
            $ext = end(explode('.',$image_name));

            $image_name="service_category_".rand(000,999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path="../images/category/".$image_name;

            $upload = move_uploaded_file( $source_path, $destination_path);
        
            if($upload==false){
            $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
            header('location:'.SITEURL.'admin/add-category.php');
            die();
            }

            }
        }
        else{
            $image_name="";
        }

        //sql query
        $sql = "INSERT INTO tbl_category SET
        title = '$title',
        image_name='$image_name',
        featured = '$featured',
        active =  '$active'
        ";

        $res = mysqli_query($conn,$sql);
        if($res==true){
            $_SESSION['add']="<div class='success'>Category Added Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else{
            $_SESSION['add']="<div class='error'>Failed To Add Category.</div>";
            header('location:'.SITEURL.'admin/add-category.php');
        }
       }
       ?>





<?php include('./partials/footer.php')?>