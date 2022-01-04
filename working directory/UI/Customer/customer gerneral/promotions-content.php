<!--main content here-->

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
            <div class="col-6 promoDeets">
                <a href="#"><img src="../../../images/promotions/sample1.jpg" class="promotionBanner"></a>
                <h4>PROMO NAME</h4>
                <h5>PROMO CODE</h5>
                <p>promotion description</p>
            </div>
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
        </div>