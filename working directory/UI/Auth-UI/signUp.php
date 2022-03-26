
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp     position: relative;
  bottom: 30px;-->
  <link rel="stylesheet" href="../../css/main.css">
	<title>Sign Up</title>

    <style>
        .flex-container {
        display: flex;
        gap: 5px;
        }
        body {
        background: #021257;}


        input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }

        .error{
        text-align:center;
        line-height:2;
        }

    </style>

</head>

<body>
    <div class="row r1">
        <div class="col-13" style= "background-color:white;">
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
            <form action="../Auth-UI/login.php">
                <button class="navButton"> Log In </button>
            </form>
            <form action="../landing page/index.html#contact">
                <button class="navButton contact"> Contact Us </button>
            </form>
        </div>
    </div>

    <div class="raw">
        <div class="col-4" ></div>
        <div class="col-4" >

          <div id="rcorners">


          <!--displaying errors & success-->








        <form action="../../includes/signup.inc.php" method="post" name="signUpForm" onsubmit="return(validate());" >
        
                <h2 align ="center">SIGN UP</h2>

                <div class="flex-container">
                    <input type="text" placeholder="First Name" name="fname" required>
                    <input type="text" placeholder="Last Name" name="lname" required>    
                </div>

                <input type="text" placeholder="Email Address" name="email" required>
                <input type="text" placeholder="NIC Number" name="nic" required>  
                <input type="hidden"  name="type" value="customer" >     

                <div class="flex-container">
                    <input type="password" placeholder="Password" name="password" required>  
                    <input type="password" placeholder="Confirm Password" name="confirmpw" required>  
                </div>
                
                <div class="raw">
                <br/>

                <div class="raw">
                    
                

                       <ul id="validatinError" style="margin-left:10%;color:green;">

                        </ul>

                </div>

                </br>

                <h5><input type="checkbox" name="agree" required> I agree to the 
                <a href="./terms.html" target="_blank"> 
                terms and conditions</a>.
                </h5>




                <button type="submit" name="submit" class="loginButton" >Sign Up</button>
                
                </div>     

            <?php

            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos ($fullUrl, "error=stmtfailed") == true) {
                echo '<script>alert("Something Went Wrong");history.go(-1)</script>';
                exit();

                exit();
            }
            elseif (strpos ($fullUrl, "error=emptyinput") == true) {
                echo '<script>alert("Empty Input.");history.go(-1)</script>';
                exit();
                
                exit();
            }
            elseif (strpos ($fullUrl, "error=invalidEmail") == true) {
                echo '<script>alert("You Seem To Have Entered An Invalid Email");history.go(-1)</script>';
                exit();
            }
            elseif (strpos ($fullUrl, "error=emailexists") == true) {
                echo '<script>alert("This Email Already Exists");history.go(-1)</script>';
                exit();
            }
        
        ?>

  
            </form>

          
          </div>  

        </div>
        <div class="col-4" ></div>


        <script>



        var label = document.getElementById("validatinError");
        
        
        function validate() {


            label.innerHTML = "";


            var valid  = true;

            /* validate Email

            var email = document.signUpForm.email.value;
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;


            if(!email.match(validRegex)){
                var entry = document.createElement('li');
                entry.innerHTML = "Email is not valid";
                label.appendChild(entry);
                valid = false;

            } */

            // validate NIC


            var nic = document.signUpForm.nic.value;
            var cnic_no_regex = new RegExp('^[0-9+]{9}[vV|xX]$');
            var new_cnic_no_regex = new RegExp('^[0-9+]{12}$');

            if (nic.length == 10 && cnic_no_regex.test(nic)) {
               // do nothing regex is validated
            } else if (nic.length == 12 && new_cnic_no_regex.test(nic)) {
               // do nothing regex is validated
            } else {
                
                var entry = document.createElement('li');
                entry.innerHTML = "NIC is not valid";
                label.appendChild(entry);
                valid = false;
            }


            // password validation


            var password =  document.signUpForm.password.value;
            var confirmPassword = document.signUpForm.confirmpw.value;


            if(!(password == confirmPassword)){

                var entry = document.createElement('li');
                entry.innerHTML = "Password does not match with the confirmation";
                label.appendChild(entry);
                valid = false;

            }

            if(password.length < 8){

                var entry = document.createElement('li');
                entry.innerHTML = "Password must be atleast 8 characters including one special character";
                label.appendChild(entry);
                valid = false;

            }

            return( valid );

    }
        
        
        
        </script>


    </div>   
</body>
</html>