
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css" />
    <title>Add new product Reservation</title>
  </head>
  <body>
    <div class="row r1">
      <div class="col-13">
        <img src="../../images/logo.png" class="navLogo" />
      </div>
      <div class="col-nav">
        <h4 class="navSlogan">
          Dealers in all kinds of motor vehicle spare parts & accessories
        </h4>
      </div>
      <div class="col-14 navbar">
        <button class="navButton">Log Out</button>
      </div>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
    <div class="row r2">
      <div class="col-2 sideNav-dropdown">
        <img src="../../images/dropdown.svg" class="dropButton" />
        <div class="dropdown-content">
          <a href="../dashboards/cashierDash.html"> Dashboard </a>
          <a href="../profiles/cashierViewProfile.html"> Profile </a>
          <a href="../cashierbills/createbill.html"> Create Bill </a>
          <a href="../promotion/cashierReadPromotion.html"> Promotions </a>
          <a href="../Cashier View Bill History/CashierViewAllBills.html"> Bill History </a> 
          <a href="../Cashier service records/cashierViewService.html"> Vehicle Service Records </a> 
          <a href="../Cashier product reservation/ViewProductResrvation.php"> Product Reservations </a>
          <a href="../appointments/cashierReadsAppointments.html"> Appointments </a>
          <a href="../Cashier Customer register/cashier register customer.html"> Customer </a>
        </div>
      </div>
      <div class="col-10 smallWel">
        <p>Welcome @Cashier_01</p>
      </div>
    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
      <div class="col-15 sideNav">
        <p>Welcome @Cashier_01</p><hr> 
            <a href="../dashboards/cashierDash.html"> Dashboard </a><hr> 
            <a href="../profiles/cashierViewProfile.html"> Profile </a><hr>
            <a href="../cashierbills/createbill.html"> Create Bill </a><hr>
            <a href="../promotion/cashierReadPromotion.html"> Promotions </a><hr>
            <a href="../Cashier View Bill History/CashierViewAllBills.html"> Bill History </a><hr>  
            <a href="../Cashier service records/cashierViewService.html"> Vehicle Service Records </a><hr> 
            <a href="../Cashier product reservation/ViewProductResrvation.php"> Product Reservations </a><hr> 
            <a href="../appointments/cashierReadsAppointments.html"> Appointments </a><hr>
            <a href="../Cashier Customer register/cashier register customer.html"> Customer </a><hr>
      </div>

      <div class="col-16 content">
        <!--main content here-->
        <div class="pr-form-container">
          <form action="addProductReserve-inc.php" method="post">
            <div class="row1">
              <div class="pr-form-title">
                <h2>ADD NEW PRODUCT RESERVATION</h2>
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="firstname">FIRST NAME</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="fname" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="lastname">LAST NAME</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="lname" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">CONTACT NUMBER</label>
              </div>
              <div class="pr-form-input">
                <input type="tel" name="contact" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">DELIVERY ADDRESS</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="address" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">PID</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="pid" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">PR.NAME</label>
              </div>
              <div class="pr-form-label">
                <input type="text" name="prname" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">QUANTITY</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="quantity" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">DELIVERY DATETIME</label>
              </div>
              <div class="pr-form-input">
                <input
                  type="date"
                  name="deliverydatetime"
                  class="pr-input-box"
                />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">DELIVERY METHOD</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="deliverymethod" class="pr-input-box" />
              </div>
            </div>

            <div class="pr-form-add" style="margin-top: 10px">
              <button class="pr-form-add-button" name="submit">ADD</button>
            </div>
          </form>
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
