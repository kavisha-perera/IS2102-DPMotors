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
    <link rel="stylesheet" href="../../css/navbar.css">
	<title>DP MOTORS</title>
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

        .catelogueItems{
            min-height: 400px;
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
                <a href="./productsCatalogue.php"><img src="../../../images/productCatalogue/back-button.png" style="max-width:50px; padding:8px" align="left"></a>
                <h1 class="PromoTitle">PRODUCT CATALOGUE</h1>
            </div>
        </div>



                            <div class='row'>
                                <div class='col-3'></div>
                                <div class='col-6'>
                                    <!----------------------search container------------------------>
                                    <div class='search-container' style='border: 0px solid black'>
                                        <form action='./productsCatalogue-search.php' method='POST'>
                                        <input type='text' placeholder='what are you looking for?' name='search' required>
                                        <button type='submit' name='submit' style='background-color:white; border:0px solid black;'> <img src='../../../images/productCatalogue/s.png' style='max-width:27px;'></button>
                                        </form>
                                    </div>
                                    <!----------------------close search container------------------------> 
                                </div>
                            <div class='col-3'></div>
                        </div>

                        
                        <?php 

                    if (isset($_POST["submit"])){

                    $search = $_POST['search'];  // gets value sent over search form

                    $sql = "SELECT * FROM stock WHERE p_keywords LIKE '%$search%' OR p_desc LIKE '%$search%'";

                    $result = $conn->query($sql);
                    
                    if (mysqli_num_rows($result) > 0){
                        $no_of_results = mysqli_num_rows($result);

                    ?>

                        <div class='row'>
                            <div class='col-12'> <h6 align='center'> <?php echo "$no_of_results Results Found"; ?> </h6> </div>
                        </div>

                    <?php
                        while($row = $result->fetch_assoc() ){                          

                    ?>



                        <!--item container start-->
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
                        <!--item container end-->

                    <?php
                      
                        }
                    } 
                    else {

                    ?>                
                        <div class='row'>
                            <div class='col-3'>
                                <h3></h3>
                            </div>
                            <div class='col-6'>
                                <!----------------------search container------------------------>
                                <div class='search-container' style='border: 0px solid black'>
                                    <form action='./productsCatalogue-search.php' method='POST'>
                                    <input type='text' placeholder='what are you looking for?' name='search' required>
                                    <button type='submit' name='submit' style='background-color:white; border:0px solid black;'> <img src='../../../images/productCatalogue/s.png' style='max-width:27px;'></button>
                                    </form>
                                </div>
                                <!----------------------close search container------------------------> 
                            </div>
                        <div class='col-3'></div>
                    </div>
                    <div class='row'>
                        <div class='col-12'> <h6 align='center'> Sorry, no products matched your search. Try Again </h6>
                        <br>
                        <img src='../../../images/customer/no-results.png' style='max-width:300px; display: block; margin-left: auto; margin-right: auto;'> 
                    </div>
                    </div>
                
                <?php

                    }            

            }

            else{
                header("location: ./productsCatalogue");
                exit();
            } 
                
        ?>



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