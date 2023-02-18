<?php include('./partials-front/menu.php')?>
    <!-- PLACE SEARCH Section Starts Here -->
    <section class="service-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>service-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for availabilities.." required>
                <input type="submit" name="submit" value="search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- PLACE sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Services</h2>

            <?php
            //sql quert for display categories from database
            $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 4";
            //execute query
            $res = mysqli_query($conn,$sql);
            //count rows to check whether the category is available or not
            $count = mysqli_num_rows($res);

            if ($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title=$row['title'];
                    $image_name = $row['image_name'];
                    ?>


                    <a href="#">
                        <div class="box-3 float-container">
                            <?php
                            
                            //check whether the image available or not
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                            else
                            {
                                ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>"  class="img-responsive img-curve">
                                <?php
                            }
                            ?>

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>

            <?php        
                }
            }
            else
            {
                echo "<div class='error'>Category Not Added.</div>";
            }

            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- service  Section Starts Here -->
    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Available Services</h2>

            <?php
            //sql quert for display categories from database
            $sql2="SELECT * FROM tbl_service WHERE active='Yes' AND featured='Yes' LIMIT 6";
            //execute query
            $res2 = mysqli_query($conn,$sql2);
            //count rows to check whether the category is available or not
            $count2 = mysqli_num_rows($res2);

            if ($count2>0)
            {
                while($row=mysqli_fetch_assoc($res2))
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
                            //check whether the image available or not
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/service/<?php echo $image_name?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }                             
                            ?>
                        </div>

                        <div class="service-menu-desc">
                        <h4><?php echo $title?></h4>
                        <p class="opening-hours"><?php echo $otime?> - <?php echo $ctime?></p>
                        <p class="service-detail">
                            <?php echo $description?>
                        </p>
                        <br>
                        <a href="<?php echo SITEURL; ?>appointment.php?service_id=<?php echo $id; ?>" class="btn btn-primary">Place Apponintment</a>
                        </div>
                        </div>
                         

            <?php        
                }
            }
            else
            {
                echo "<div class='error'>Category Not Added.</div>";
            }

            ?>
     
            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="#">See All Services</a>
        </p>
    </section>
    <!-- service  Section Ends Here -->

    <?php include('./partials-front/footer.php')?>
