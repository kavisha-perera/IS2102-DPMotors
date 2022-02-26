<!--customer topnav bar -->

<div class="col-13">
    <img src="../../../images/logo.png" class="navLogo">
</div>
<div class="col-nav">
    <h4 class="navSlogan">Dealers in all kinds of motor vehicle spare parts & accessories</h4>
</div>
<div class="col-14 navbar"> 
        <a href="../../Auth-UI/index.php#home">Home</a> 
        <a href="../../Auth-UI/index.php#about">About</a>
        <a href="../../Auth-UI/index.php#services">Services</a>
        <a href="../customer gerneral/productsCatalogue.php">Products</a>

        <?php 
            if (isset($_SESSION['id'])){

            include '../../../includes/dbh.inc.php';    

            //this if statement checks if the session has started and if a session with the id exists

                $sql = "SELECT * FROM users WHERE id='{$_SESSION['id']}'"; //takes the user info from the id
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { 

                echo "
                <form action='../../../includes/logout.inc.php'>
                <button class='navButton'> Log Out </button>
                </form> 
                <form action='../../Auth-UI/index.php#contact'>
                <button class='navButton contact'> Contact Us </button>
                </form>
                &nbsp;&nbsp; ";

                //the following if/else statements check the user type and direct them to their respective dashboards

                        if($row['type'] == 'manager'){  //if type = manager, link to manager dashboard
                        echo "<form action='../../dashboards/managerDash.php'>
                        <button style='border:0px;cursor:pointer;'> <img src='../../../images/profile-login.png' style='max-width:35px;'></button>
                        </form>
                        ";   }

                        elseif($row['type'] == 'admin'){ //if type = admin, link to admin dashboard
                            echo "<form action='../../Administrator/adminDash.php'>
                            <button style='border:0px;cursor:pointer;'> <img src='../../../images/profile-login.png' style='max-width:35px;'></button>
                            </form>
                            ";   }  

                        elseif($row['type'] == 'cashier'){ //if type = cashier, link to cashier dashboard
                            echo "<form action='../../dashboards/cashierDash.php'>
                            <button style='border:0px;cursor:pointer;'> <img src='../../../images/profile-login.png' style='max-width:35px;'></button>
                            </form>
                            ";   }

                        else{ //if its not any of the above types, direct to customer dashboard
                            echo "<form action='./customerDash.php'>
                            <button style='border:0px;cursor:pointer;'> <img src='../../../images/profile-login.png' style='max-width:35px;'></button>
                            </form>
                            ";   }
                    }
                } 
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
