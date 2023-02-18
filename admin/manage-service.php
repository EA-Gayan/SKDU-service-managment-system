<?php include('partials/menu.php');?>

<div class="main-content">
        <div class="wrapper">
       <h2>Manage Services</h2>
       <br>
       <?PHP
                if(isset($_SESSION['add'])){
                echo $_SESSION['add']; //display session
                unset ($_SESSION['add']); //remove session
                }
                
                if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
               }
               if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
               }
               if(isset($_SESSION['unauthorized'])){
                echo $_SESSION['unauthorized'];
                unset ($_SESSION['unauthorized']);
               }
               if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
               }
        ?>
         <br>  
      <!--button to add admin-->
      <a href="<?php echo SITEURL;?>admin/add-service.php" class="btn-primary">Add services</a> <br> <br> 


       <table class="tbl-full">
         <tr>
         <th>S.N.</th>
         <th>Title</th>
         <th>Open Time</th>
         <th>Closed Time</th>
         <th>Image</th>
         <th>Featured</th>
         <th>Active</th>
         <th>Action</th>
         </tr>
    <?php
        // to get all the services
        $sql = "SELECT * FROM tbl_service";
        $res= mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);

        $sn=1;
        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
              $id=$row['id'];
              $title = $row['title'];
              $otime=$row['otime'];
              $ctime=$row['ctime'];
              $image_name = $row['image_name'];
              $featured = $row['featured'];
              $active = $row['active'];
              ?>

            <tr>
                <td><?php echo $sn++ ; ?></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $otime; ?></td>
                <td><?php echo $ctime; ?></td>
                <td>
                <?php
                if($image_name!=""){
                  ?>
                  <img src="<?php echo SITEURL;?>images/service/<?php echo $image_name; ?>"width="100px">
                  <?php
                }
                else{
                  echo "<div class='error'>Image Not Added.</div>";
                }
              ?>
                </td>
                <td><?php echo $featured; ?></td>
                <td><?php echo $active; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-service.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Service</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-service.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Service </a>        
                </td>
            </tr>
              <?php
            }
        }   
        else
        {
            echo"<tr><td colspan='8' class='error'> No Service Addded.</td></tr>";
        }    
        ?>

       </table>

        </div>
      </div>
<?php include('partials/footer.php');?>

<style>
  .tbl-full{
    width: 100%;
}

table tr th{
    border-bottom: 1px solid black;
    padding: 1%;
    text-align: left;
}
table tr td{
    padding: 1%;
}

.btn-primary{
    background-color: #1e98ff;
    padding: 1%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.btn-primary:hover{
    background-color: #3742fa;

}
.btn-secondary{
    background-color: #7bed9f;
    padding: 1%;
    color: #2C3A47;
    text-decoration: none;
    font-weight: bold;
}
.btn-secondary:hover{
    background-color: #2ed573;
}
.btn-danger{
    background-color: #ff6b81;
    padding: 1%;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.btn-danger:hover{
    background-color: #ff4757;

}


</style>