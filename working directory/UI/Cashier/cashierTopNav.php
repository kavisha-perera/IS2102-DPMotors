<div class="row r1">
    <div class="col-13">
    <img src="../../../images/logo.png" class="navLogo">
</div>
<div class="col-nav">
    <h4 class="navSlogan">Dealers in all kinds of motor vehicle spare parts & accessories</h4>
</div>
<div class="col-14 navbar"> 

<a href="../../Customer/customer gerneral/productsCatalogue.php">Products</a>
       
       <?php 
            if (isset($_SESSION['id'])){
                echo "
                <form action='../../../includes/logout.inc.php'>
                <button class='navButton'> Log Out </button>
                </form> 
                &nbsp;&nbsp; 
                ";   
             }

             else {
                echo "<form action='../../Auth-UI/login.php'>
                <button class='navButton'> Log In </button>
                </form>
                <form action='#contact'>
                <button class='navButton contact'> Contact Us </button>
                </form>";
                 
             }

             ?>

</div>
    </div>