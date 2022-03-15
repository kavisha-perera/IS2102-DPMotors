
<!--customer side nav bar for screens smaller than 800px-->

<div class="col-2 sideNav-dropdown" >

    <img src="../../../images/dropdown.svg" class="dropButton hide-in-others">
    <img src="../../../images/dropdown.svg" class="dropButton hide-in-dashboard">

    <div class="dropdown-content">
    
        <div class="hide-in-others">
        <a href="../adminDash.php" class="Nav-dashboard"> Dashboard </a>   
        </div>

        <div class="hide-in-dashboard">
        <a href="../adminDash.php" class="Nav-dashboard"> Dashboard </a>  
        </div>
        
        <div class="hide-in-dashboard">
            <a href="../../profiles/adminViewProfile.html"> Profile </a>
            <a href="../manageAccounts/manage.php"> Accounts </a> 
            <a href="../../manageInventory/manageinventory.html"> Inventory </a>
            <a href="../../managepromotions/managepromotions.php"> Promotions </a>  
            <a href="../../Admin-Employee & Supplier records/ViewSupplier.php"> Supplier </a> 
            <a href="../../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a>
        </div>

        <div class="hide-in-others">
            <a href="../../profiles/adminViewProfile.html"> Profile </a>
            <a href="../manageAccounts/manage.php"> Accounts </a> 
            <a href="../../manageInventory/manageinventory.html"> Inventory </a>
            <a href="../../managepromotions/managepromotions.php"> Promotions </a>  
            <a href="../../Admin-Employee & Supplier records/ViewSupplier.php"> Supplier </a> 
            <a href="../../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a>
        </div>


    </div>
</div>
<div class="col-10 smallWel">
    <p> Welcome <?php echo $adminEmail;?> </p>
</div>