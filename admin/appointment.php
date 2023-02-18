<?php include('partials/menu.php');?>

<div class="main-content">
        <div class="wrapper">
       <h2>Manage reservations</h2>
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

               if(isset($_SESSION['unauthorized'])){
                echo $_SESSION['unauthorized'];
                unset ($_SESSION['unauthorized']);
               }

        ?>
         <br>  
      <!--button to add admin-->


       <table class="tbl-full">
         <tr>
         <th>S.N.</th>
         <th>Service</th>
         <th>Index No.</th>
         <th>Mail</th>
         <th>Mobile No.</th>
         <th>Date</th>
         <th>Time Slot</th>
         <th>Action</th>
         </tr>
    <?php
        // to get all the services
        $sql = "SELECT * FROM reservations";
        $res= mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);

        $sn=1;
        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
              $id=$row['res_id'];
              $res_service = $row['res_service'];
              $res_index=$row['res_index'];
              $res_email=$row['res_email'];
              $res_tel = $row['res_tel'];
              $res_date = $row['res_date'];
              $res_slot = $row['res_slot'];
              ?>

            <tr>
                <td><?php echo $sn++ ; ?></td>
                <td><?php echo $res_service; ?></td>
                <td><?php echo $res_index; ?></td>
                <td><?php echo $res_email; ?></td>
                <td><?php echo $res_tel; ?></td>
                <td><?php echo $res_date; ?></td>
                <td><?php echo $res_slot; ?></td>
                <td>
                <a href="<?php echo SITEURL; ?>admin/delete-reservation.php? res_id=<?php echo $id; ?>" class="btn-danger"> Delete Reservation</a>
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