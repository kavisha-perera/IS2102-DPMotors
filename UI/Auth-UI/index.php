<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
    <script type="text/javascript" src="../../javascript/servicesSlideshow.js"></script>
	<title>customer profile page</title>
</head>
<body>

    <div class="row r1"><a id="home"></a>
        <div class="col-13">
            <img src="../../images/logo.png" class="navLogo">
        </div>
        <div class="col-nav">
            <h4 class="navSlogan">Dealers in all kinds of motor vehicle spare parts & accessories</h4>
        </div>
        <div class="col-14 navbar"> 
            <a href="#home">Home</a> 
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="../customer gerneral/productsCatalogue.html">Products</a>
            <form action="../Auth-UI/customerLogin.php">
                <button class="navButton"> Log In </button>
            </form>
            <form action="#contact">
                <button class="navButton contact"> Contact Us </button>
            </form>
        </div>
    </div>
   
    <div class="row section1">
        <div class="col-12 openingVideo">
            <!-- The video -->
            <video autoplay muted loop id="myVideo">
                <source src="../../video/opening.mp4" type="video/mp4">
            </video>
        </div>
    </div>

    <div class="row section2"><a id="about"></a>
        <div class="col-7 AboutUs">
            <h1> ABOUT US</h1> 
            <br>
            <p  style="text-align: justify;">
                DP Motors is a business operating in the automotive aftermarket industry. We focus on the provision of vehicle services, sale of spare parts and vehicle repairs. <br> We aim to become a remarkable, leading company in the aftermarket industry by providing quality service & great customer value. 
            </p>   
        </div>
        <div class="col-5 LandingAppButton">
            <br><br>
            <a href="#"><img src="../../images/customer/book.png" class="bookButton"></a>
        </div>

    </div>
    <div class="row section3"><a id="services"></a>
        <div class="col-12 servicesTitle">
            <h1> OUR SERVICES</h1> 
            <br>
        </div>
        <div class="col-12 ">
            <!--services slide show starts here-->
            
            <div class="servicesSlideshow-container">

                <div class="row mySlides fade">
                    <div class="col-6" align="middle">
                        <img src="../../images/landing page/services/maintainance2.png" class="servicesImages">
                    </div>
                    <div class="col-6 servicesDescription">
                        <h2>YOUR CAR DESERVES THE BEST CARE</h2>
                        <br>
                        <p>Maintain your car like you maintain everything else in your life.</p>
                    </div>
                </div>

                <div class="row mySlides fade"  id="displayNone">
                    <div class="col-6" align="middle">
                        <img src="../../images/landing page/services/maintainance.png" class="servicesImages">
                    </div>
                    <div class="col-6 servicesDescription">
                        <h2>ENGINE TUNE-UP</h2>
                        <br>
                        <p>Engine too noicy? Let us shut your engine up so that you can simply enjoy your music and a long ride</p>
                        <br>
                        <p>On the other hand, a tune-up for your engine will ensure that your car has better pick up, high performace, efficient use of fuel and seemlessly smooth driving.</p>
                    </div>
                </div>

                <div class="row mySlides fade" id="displayNone">
                    <div class="col-6" align="middle">
                        <img src="../../images/customer/book.png" class="servicesImages">
                    </div>
                    <div class="col-6 servicesDescription">
                        <h2>Interior Detailing</h2>
                        <br>
                        <p>small description on what happens?</p>
                    </div>
                </div>
            
                <div class="row mySlides fade" id="displayNone">
                    <div class="col-6" align="middle">
                        <img src="../../images/landing page/services/service.jpg" class="servicesImages">
                    </div>
                    <div class="col-6 servicesDescription">
                        <h2>FULL SERVICE</h2>
                        <br>
                        <p>It is never too late for a check-up.</p>
                        <p>Listen to your car. Maintenance is highly critical for a motor vehicle.</p>
                    </div>
                </div>

                <div class="row mySlides fade" id="displayNone">
                    <div class="col-6" align="middle">
                        <img src="../../images/customer/book.png" class="servicesImages">
                    </div>
                    <div class="col-6 servicesDescription">
                        <h2>Cut & Polish</h2>
                        <br>
                        <p>small description on what happens?</p>
                    </div>
                </div>   
                
                <div class="row mySlides fade" id="displayNone">
                    <div class="col-6" align="middle">
                        <img src="../../images/landing page/services/shop.jpg" class="servicesImages">
                    </div>
                    <div class="col-6 servicesDescription">
                        <h2>Car Spare Parts & Lubricants</h2>
                        <br>
                        <p>You deserve the best version of your car. Your car deserves the best spare parts & lubricants.</p>
                        <br>
                        <p>DP Motors is your one-stop-shop for every car-problems.</p>
                    </div>
                </div>


                <!--next & prev buttons inside "servicesSlideshow-container" -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <br>
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
            <br><br><br>
        </div>

    </div>

    <div class="row section4"><a id="contact"></a>
        <div class="col-12">
            <br>
            <h1 style="font-size: 3vw;">CONTACT US</h1>
        </div>
        <div class="col-12">
            <br>
            <h1 style="font-size: 7vw;">011 2XXXXXX</h1>
        </div>
        <div class="col-12">
            <hr>
        </div>
    </div>

    <div class="row section5">
        <div class="col-1 sec5-0">
            <img src="../../images/dplogo.png" style="max-width: 100%;">
        </div>
        <div class="col-2 sec5-1">
            <h3>DP MOTORS</h3>
            <br>
            <h5>Dealers in all kinds of motor vehicle spare parts & accessories</h5>
        </div>
        <div class="col-3 sec5-2">
            <h3>EXPLORE</h3>
            <br>
            <div class="sec5-text">
                <p><a href="#about">About Us</a> </p>
                <br>
                <p><a href="#services">Our Services</a></p>
                <br>
                <p><a href="../customer gerneral/productsCatalogue.html">Products</a></p>
                <br>
                <p><a href="../customer gerneral/general promotions.html">Promotions</a></p>
            </div>
        </div>
        <div class="col-3 sec5-3">
            <h3>FOLLOW</h3>
            <br>
            <div class="sec5-text followFB">
                <img src="../../images/landing page/facebook.png" style="width: 17px; height: 17px;">
                &nbsp;&nbsp; <!--keeping horizontal space-->
                <p><a href="https://www.facebook.com/dpmotorsSL/">Facebook</a> </p>
            </div>
            
        </div>
        <div class="col-3 sec5-4">
            <h3>CONTACT</h3>
            <br>
            <div class="sec5-text">
                <div class="contact-deets">
                    <img src="../../images/landing page/location.png" style="width: 17px; height: 17px;">
                    &nbsp;&nbsp; <!--keeping horizontal space-->
                    <p>1088, 1 Battaramulla, Pannipitiya Rd, Battaramulla 10120</p>
                </div>
                <br>
                <div class="contact-deets">
                    <img src="../../images/landing page/call.png" style="width: 17px; height: 17px;">
                    &nbsp;&nbsp; <!--keeping horizontal space-->
                    <p> 011 2XXXXXX | 07X XXXXXXX</p>
                    <br>
                </div>
                <br>
                <div class="contact-deets">
                    <img src="../../images/landing page/email.png" style="width: 17px; height: 17px;">
                    &nbsp;&nbsp; <!--keeping horizontal space-->
                    <p> dpmotors@gmail.com</p>
                    <br>
                </div>
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