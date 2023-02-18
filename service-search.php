<?php include('./partials-front/menu.php')?>

    <!-- Service sEARCH Section Starts Here -->
    <section class="service-search text-center">
        <div class="container">
            <?php
            $search=$_POST['search'];
            ?>
            
            <h2>Services on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- Service sEARCH Section Ends Here -->



    <!-- service MEnu Section Starts Here -->
    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Available Services</h2>

            <?php
            // get the search
            $search=$_POST['search'];

            //sql query based on search
            $sql = "SELECT * FROM tbl_service WHERE title LIKE '%$search%' ";
            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title=$row['title'];
                    $description= $row['description'];
                    $otime = $row['otime'];
                    $ctime = $row['ctime'];
                    $image_name = $row['image_name'];
                    ?>
                    
                <div class="service-menu-box">
                <div class="service-menu-img">
                    <?php
                    if($image_name=="")
                    {
                        echo "<div class='error'>Image Not Available.</div>";
                    }
                    else
                    {
                        ?>
                    <img src="<?php echo SITEURL; ?>images/service/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    <?php
                    }
                    ?>
                </div>

                <div class="service-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="opening-hours"><?php echo $otime;?>-<?php echo $ctime;?></p>
                    <p class="service-detail">
                    <?php echo $description;?>                    
                    </p>
                    <br>

                        <a href="appointment.php" class="btn btn-primary">Place Apponintment</a>
                </div>
                </div>

                    <?php
                }
            }
               
            else
            {
                echo "<div class='error'>Sevice Not Found.</div>";
            }
            
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('./partials-front/footer.php')?>
