<?php 
include '../../../includes/dbh.inc.php';

session_start();
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>product catalogue</title>
    <style>
        input[type=text] {
        padding: 6px;
        width:90%;
        height:40px;
        border-radius;
        font-size: 13px;
        border: 2px solid red;
        }

        .search-container button {
        border: none;
        cursor: pointer;
        }


        

    </style>
</head>
<body>

    <div class="row r1">
        <?php include_once("../customerTopNav.php");?>
    </div>

     <div class="row r3">

        <div class="col-12 productsCatalogueContent">
            <!--main content here-->
                <div class="row">
                    <div class="col-12">
                        <h1 class="PromoTitle">PRODUCT CATALOGUE</h1>
                    </div>
                </div>

                <div class="row catalogueSection1">
                    <div class="col-6 catalogueVideo">
                        <video autoplay muted loop id="myVideo">
                            <source src="../../../video/products.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-6">
                        <br><br>
                        <p>Drop by DP Motors or simply call <span style = "font-size:x-large; color: #ED1F28;">077 307 2710</span> to get your spare-parts and lubricants delivered to your door step!!</p>
                        <br><br>
                        <div class="catalogueMenue">
                            <img src="../../../images/productCatalogue/category.png" style="width: 17px; height: 17px;">
                            &nbsp;&nbsp; <!--keeping horizontal space-->
                            <p><a href="#category1">CATEGORY 1</a> </p>
                        </div>

                        <br>

                        <div class="catalogueMenue">
                            <img src="../../../images/productCatalogue/category.png" style="width: 17px; height: 17px;">
                            &nbsp;&nbsp; <!--keeping horizontal space-->
                            <p><a href="#category2">CATEGORY 2</a> </p>
                        </div>

                        <br>

                        <div class="catalogueMenue">
                            <img src="../../../images/productCatalogue/category.png" style="width: 17px; height: 17px;">
                            &nbsp;&nbsp; <!--keeping horizontal space-->
                            <p><a href="#category3">CATEGORY 3</a> </p>
                        </div>

                        <br>
                    <!----------------------search container------------------------>
                    
                        <div class="search-container" style="border: 0px solid black">
                            <form action="./productsCatalogue-search.php" method="POST">
                            <input type="text" placeholder="what are you looking for? " name="search" required>
                            <button type="submit" name="submit" style="background-color:white; border:0px solid black;"> <img src="../../../images/productCatalogue/s.png" style="max-width:27px;"></button>
                            </form>
                        </div>

                    <!----------------------close search container------------------------>

                    </div>
                </div>

                <br><br><br>
                    <hr>
                <br><br><br>

                <!----------------------start of one product category------------------------->

                <div class="row catelogueAlt-1"><a id="category1"></a>

                    <br><br>
                    
                    <h3> &nbsp;&nbsp;  CATEGORY 1</h3>
                    <br><br>
                    <!--start getting details according to the category-->
                        <?php  $sql = "SELECT * FROM stock WHERE catergory='EO' ";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                    <!--item container-->
                    <div class="col-3 catelogueItems">
                        <img src="https://drive.google.com/uc?export=view&id=<?php echo $row['p_image']; ?>" class="promotionBanner">
                        <h4><?php echo $row['p_brand']; ?> <?php echo $row['p_name']; ?></h4>
                        <h5>LKR <?php echo $row['selling_price']; ?>/-</h5>
                        <h6><?php echo $row['p_desc']; ?></h6>
                        
                        <?php $avail_sql = "SELECT COUNT(*) AS stock_count FROM products WHERE stock_code='{$row['stock_code']}'";
                            $availability = mysqli_query($conn, $avail_sql);
                            $data=mysqli_fetch_assoc($availability);
                            if($data['stock_count'] > 0){    

                        ?>
                        <h6 style="color:green">Available Qty: <?php echo $data['stock_count']; ?></h6>
                        <?php
                            }
                            else{
                                echo " <h6 style='color:red'>Out of Stock</h6>";
                            }
                        ?>
                        
                    </div>

                     <?php
                         }
                    } ?>

                </div>


                <br><br><br>
                <!----------------------end of one product category------------------------->


               

 

        </div><!-----------main content container end div-------------->

        <br><br><br>
        <hr>
        <br><br><br> 

        <div class="row">
            <div class="col-12 catalogueBottomBanner">
                <br><br> <br><br> 
                <img src="../../../images/productCatalogue/banner.jpg" class="catalogueBottomBannerImage">
                <br><br> <br><br> 
            </div>
        </div>

    </div>

    



 <!--   <footer>
        <div class="row">
            <div class="col-12">
                <h4>CONTACT</h4><br>
                <p>1088, 1 Battaramulla, Pannipitiya Rd, Battaramulla 10120 </p>
                011 2XXXXXX | 07X XXXXXXX </p>
                dpmotors@gmail.com</p>
            </div>
        </div>
    </footer> -->

</body>
</html>