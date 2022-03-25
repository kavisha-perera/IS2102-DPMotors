
<!--customer side nav bar for screens larger than 800px-->
    <style>
        .Nav-dashboard{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-dashboard{
            display:none;
        }
    </style>
<p> Welcome <?php echo $email;?> </p> <hr>


<div class="hide-in-others">
<a href="../adminDash.php" class="Nav-dashboard"> Dashboard </a> <hr>  
</div>

<div class="hide-in-dashboard">
<a href="../adminDash.php" class="Nav-dashboard"> Dashboard </a> <hr>  
</div>

<div class="hide-in-dashboard">
    <a href="../../profiles/adminViewProfile.html"> Profile </a> <hr>
    <a href="../../manageAccounts/manage.php"> Accounts </a> <hr>
    <a href="../../manageInventory/manageinventory.html"> Inventory </a> <hr>
    <a href="../../managepromotions/managepromotions.php"> Promotions </a> <hr>
    <a href="../../Admin-Employee & Supplier records/ViewSupplier.php"> Supplier </a> <hr>
    <a href="../../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a> <hr>
</div>

<div class="hide-in-others">
    <a href="../../profiles/adminViewProfile.html"> Profile </a> <hr>
    <a href="../../manageAccounts/manage.php"> Accounts </a> <hr>
    <a href="../../manageInventory/manageinventory.html"> Inventory </a> <hr>
    <a href="../../managepromotions/managepromotions.php"> Promotions </a> <hr>
    <a href="../../Admin-Employee & Supplier records/ViewSupplier.php"> Supplier </a> <hr>
    <a href="../../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a> <hr> 
</div>