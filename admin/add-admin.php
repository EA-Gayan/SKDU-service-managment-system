<?php include('partials/menu.php');?>

<div class="main-content">
        <div class="wrapper">
       <h2>Add Admin</h2>
       <br><br>

       <form action="" method="POST" autocomplete="off">
               <table class="tbl-30">
                       <tr>
                               <td> Email :</td>
                               <td><input type="mail" name="mail" placeholder="Enter mail"></td>

                       </tr>
                       <tr>
                               <td> Username :</td>
                               <td><input type="text" name="username" placeholder="Enter Username"></td>

                       </tr>
                       <tr>
                               <td> Password :</td>
                               <td><input type="password" name="password" placeholder="Enter Password" maxlength="6"></td>

                       </tr>
                       <tr>
                               <td colspan="2"><br>
                               <input type="submit" name="submit" class="btn-secondary" value="Add Admin">
                               </td>
                       </tr>
               </table>
       </form>

        </div>
</div>
<?php include('partials/footer.php');?> 

<?php
// process the value from form and save it in database
        if(isset($_POST['submit'])){
        
        // get the data from form
           $mail = $_POST['mail'];
           $username = $_POST['username'];
           $password = md5($_POST['password']);

        // sql quey to save the data into database
        $sql="INSERT INTO users SET
           email = '$mail',
           username = '$username',
           password ='$password'
        ";

      $res = mysqli_query($conn,$sql);
      if($res==true){

        //create session variable to display message
        $_SESSION['add']="Admin Added Succesfully";
        header("location:".SITEURL.'admin/manage-admin.php');
      }
        }
?>


<!--css-->

