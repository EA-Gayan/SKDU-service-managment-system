<?php include('./partials-front/menu.php')?>

<?php
// check whether the service id is set or not
if(isset($_GET['service_id']))
{
    //get the service id and details of the selected service
    $service_id = $_GET['service_id'];

    //get the details of the selected service
    $sql = "SELECT * FROM tbl_service WHERE id = $service_id";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        //get data from database
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $image_name = $row['image_name'];

    }
    else
    {
        header('location:'.SITEURL);
    }

    }
    else
    {
        header('location:'.SITEURL);
    }

?>

    <!-- service sEARCH Section Starts Here -->
    <section class="service-search">
        <div class="container" >
            
            <h2 class="text-center text-black">Avoid the inconvenience of filling out this form.</h2>

            <form class="order" id="resForm" method="post" target="_self">
                <fieldset>
                    <legend>Selected service</legend>

                    <div class="service-menu-img">
                        <?php

                        //check whether the image is availble or not
                        if($image_name=="")
                        {
                            echo "<div class='error'>image Not Added.</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/service/<?php echo $image_name; ?>" alt="11" class="img-responsive img-curve" width="100px">
                            <?php
                        }

                        ?>
                    </div>
                    <div class="service-menu-desc">
                        <h3><?php echo $title ?></h3>
                        <input type="hidden" name="service" value="<?php echo $title ?>">
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Apponintment Details</legend>


                    <div class="order-label">Index number</div>
                    <input type="text" name="index" class="input-responsive" required>

                    <div class="order-label">KDU mail</div>
                    <input type="mail" name="email" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="tel" class="input-responsive" maxlength="10" required>


                    <?php
                    // @TODO - MINIMUM DATE (TODAY)
                    // $mindate = date("Y-m-d", strtotime("+2 days"));
                    $mindate = date("Y-m-d");
                    ?>
                    <div class="order-label">Reservation Date</div>
                    <input type="date" required id="res_date" name="date" class="input-responsive"
                            min="<?=$mindate?>">

                    <div class="order-label">Reservation Slot</div>
                    <input type="time" name="slot" class="input-responsive"  min="06:00" max="20:00">



                   <br><br> <input type="submit" name="submit" value="Confirm Apponintment" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
            // (A) PROCESS RESERVATION
            if (isset($_POST["date"])) {
            require "reserve.php";
            if ($_RSV->save(
                $_POST["service"], $_POST["date"], $_POST["slot"], $_POST["index"],
                $_POST["email"], $_POST["tel"])) {
                echo "<div class='ok'>Reservation saved.</div>";
            } else { echo "<div class='err'>".$_RSV->error."</div>"; }
            }
            ?>
        
        </div>
    </section>
    <!-- category sEARCH Section Ends Here -->

    
<!-- social Section Starts Here -->


    <?php include('./partials-front/footer.php')?>