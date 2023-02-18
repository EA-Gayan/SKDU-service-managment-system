<?php include("../admin/partials/menu.php")?>

<!--main contenet section start-->
<div class="main-content">
  <div class="wrapper">
    <h2>Update Admin</h2>
<br><br>

<?php
//get the id of selected admin
$id=$_GET['id'];

//create sql query to get details
$sql = "SELECT * FROM users";

//execute the query
$res=mysqli_query($conn,$sql);

//check whether the data is availble or not
$count=mysqli_num_rows($res);
if($count==1){
    $row=mysqli_fetch_assoc($res);

    $mail=$row['email'];
    $username=$row['username'];
}
?>



<form action="" method="POST">
<table class="tbl-30">
    <tr>
        <td> Email Address :</td>
        <td><input type="text" name="mail" placeholder="Enter Email" value="<?php echo $mail; ?>"></td>
    </tr>
        <tr>
        <td> Username :</td>
        <td><input type="text" name="username" placeholder="Enter Username"value="<?php echo $username; ?>"></td>
        </tr>

        <tr>
        <td colspan="2"><br>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="submit" name="submit" class="btn-secondary" value="Update Admin">
        </td>
        </tr>

    </table>


</form>

</div>
</div>
<?php
    //check whether the submit button click or not
    if(isset($_POST['submit'])){
    //get all the values from form
    $id=$_POST['id'];
    $mail = $_POST['mail'];
    $username=$_POST['username'];

    $sql = "UPDATE users SET
    email='$mail',
    username='$username'
    WHERE id='$id'";

    $res=mysqli_query($conn,$sql);
    if($res==true){
        $_SESSION['update']="<div class ='success'>Admin update seuccessfully.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['update']="<div class ='error'>Admin update Failed.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

 <?php include("../admin/partials/footer.php")?>
