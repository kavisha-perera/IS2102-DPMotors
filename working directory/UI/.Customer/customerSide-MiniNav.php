
<!--customer side nav bar for screens smaller than 800px-->

<div class="col-2 sideNav-dropdown" >
    <img src="../../images/dropdown.svg" class="dropButton">
    <div class="dropdown-content">
        <a href="../Auth-UI/customerDash.php" class="Nav-dashboard"> Dashboard </a>  
        <a href="../profiles/customerViewProfile.php" class="Nav-profile"> Profile </a>
        <a href="../customer appointments/viewAppointments.php" class="Nav-Appointments"> Appointments </a> 
        <a href="../customer service records/viewServices.php" class="Nav-ServiceRecs"> Vehicle Service Records </a>
        <a href="../customer product reservations/viewPReservationList.php"class="Nav-ProductRes"> Product Reservations </a>  
        <a href="../customer payment history/viewBillList.php" class="Nav-PayHistory"> Payment History </a> 
        <a href="../customer gerneral/customer read promotions.php" class="Nav-Promotions"> Promotions </a> 
    </div>
</div>
<div class="col-10 smallWel">
    <p> Welcome <?php echo $customerEmail;?> </p>
</div>