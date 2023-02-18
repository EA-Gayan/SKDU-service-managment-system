<?php include('partials/menu.php');?>

      <!--main contenet section start-->
      <div class="main-content">
        <div class="wrapper">
       <h2>DASHBOARD</h2>
       <br><br>
       <?php
                       if(isset($_SESSION['login'])){
                        echo $_SESSION['login']; //display session
                        unset ($_SESSION['login']); //remove session
                     }

                     if (!isset($_SESSION['username'])) {
                        header("Location: ../login/index.php");
                    }
               ?>
        <br><br>
        <div class="col-4 text-center">
            <?php
            $sql = "SELECT * FROM tbl_category";
            $res = mysqli_query($conn,$sql); 
            $count = mysqli_num_rows($res);
            ?>

            <br>
            <h1><?php echo $count;?></h1>
            Categories
        </div>
       
        <div class="col-4 text-center">
        <?php
            $sql1 = "SELECT * FROM tbl_service";
            $res1 = mysqli_query($conn,$sql1); 
            $count1 = mysqli_num_rows($res1);
            ?>
            <br>
            <h1><?php echo $count1;?></h1>
            availble services
        </div>

        <div class="col-4 text-center">
        <?php
            $sql2 = "SELECT * FROM reservations";
            $res2 = mysqli_query($conn,$sql2); 
            $count2 = mysqli_num_rows($res2);
            ?>
            <br>
            <h1><?php echo $count2;?></h1>
            reservations
        </div>

        <div class="col-4 text-center">
        <?php
            $sql4 = "SELECT * FROM review_table";
            $res4 = mysqli_query($conn,$sql4); 
            $count4 = mysqli_num_rows($res4);
            ?>
            <br>
            <h1><?php echo $count4;?></h1>
            User Reviews
        </div>
        <div class="clearfix"></div>

        </div>
      </div>
      <!--main contenet section end-->

<?php include('partials/footer.php');?>
   