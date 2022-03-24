<?php

include '../../../includes/dbh.inc.php';

?>
<!--main promotions content here-->

        <div class="row">
            <div class="col-9 promotionsNull"></div>
            <div class="col-3 promoAlign">

            <?php 
            if (isset($_SESSION['id'])){
                echo "
                <form action='../customer appointments/bookAppointment.php'>
                <button type='submit' class='navButton' style='width: fit-content;background-color: #EE1E2B;'> BOOK APPOINTMENT</button>
                </form>
                ";   
             }

             else {
                echo "
                <form action='../../Auth-UI/login.php'>
                <button type='submit' class='navButton' style='width: fit-content;background-color: #EE1E2B;'> BOOK APPOINTMENT</button>
                </form>
                ";   
             }

             ?>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h1 class="PromoTitle">PROMOTIONS</h1>
            </div>
        </div>

        
        <div class="row r3-1">
            <!--php/sql query for promotions-->
        
        <?php 
            $sql = "SELECT * FROM promotions WHERE promoState='active'";

            $result = $conn->query($sql);
            if (mysqli_num_rows($result) > 0){
                while($row = $result->fetch_assoc() ){
                    $no_of_results = mysqli_num_rows($result);
        ?>

            <div class="col-3 promoDeets">
                <img src="<?php echo $row['image']; ?>" class="promotionBanner">
                <h5>PROMO CODE: <?php echo $row['code'];?></h5>
                <h5><?php echo $row['description'];?></h5>
                <h5>VALID TILL: <?php echo $row['validtill'];?></h5>
            </div>
            
        <?php 
                }
            }
        ?>


            <!--
            <div class="col-6 promoDeets">
                <a href="#"><img src="../../../images/promotions/sample2.jpg" class="promotionBanner"></a>
                <h4>PROMO NAME</h4>
                <h5>PROMO CODE</h5>
                <p>promotion description</p>
            </div>
            <div class="col-6 promoDeets">
                <a href="#"><img src="../../../images/promotions/sample3.png" class="promotionBanner"></a>
                <h4>PROMO NAME</h4>
                <h5>PROMO CODE</h5>
                <p>promotion description</p>
            </div>
            -->

        </div>