<!--customer topnav bar -->

<div class="col-13">
    <img src="../../images/logo.png" class="navLogo">
</div>
<div class="col-nav">
    <h4 class="navSlogan">Dealers in all kinds of motor vehicle spare parts & accessories</h4>
</div>
<div class="col-14 navbar"> 
        <a href="../Auth-UI/index.php#home">Home</a> 
        <a href="../Auth-UI/index.php#about">About</a>
        <a href="../Auth-UI/index.php#services">Services</a>
        <a href="../Customer/customer gerneral/productsCatalogue.php">Products</a>

        <?php 
            if (isset($_SESSION['id'])){
                echo "
                <form action='../../includes/logout.inc.php'>
                <button class='navButton'> Log Out </button>
                </form> 
                <form action='../Auth-UI/index.php#contact'>
                <button class='navButton contact'> Contact Us </button>
                </form>
                &nbsp;&nbsp; 
                <form action='./adminDash.php'>
                <button style='border:0px;cursor:pointer;'> <img src='../../images/profile-login.png' style='max-width:35px;'></button>
                </form>
                ";   
             }

             else {
                echo "<form action='../Auth-UI/login.php'>
                <button class='navButton'> Log In </button>
                </form>
                <form action='#contact'>
                <button class='navButton contact'> Contact Us </button>
                </form>";
                 
             }

             ?>

</div>
