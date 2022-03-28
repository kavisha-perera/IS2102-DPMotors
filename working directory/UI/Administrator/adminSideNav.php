<link rel="stylesheet" href="../../../css/main.css">
<link rel="stylesheet" href="../../../css/navbar.css">

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
    <a href="../Administrator profile/adminViewProfile.php"> Profile </a> <hr>
    <a href="../manageaccounts/manage.php"> Accounts </a> <hr>
    <a href="../manageInventory/manageinventory.php"> Inventory </a> <hr>
    <a href="../../managepromotions/managepromotions.php"> Promotions </a> <hr>
    <a href="../manageSupplier/Supplier.php"> Supplier </a> 
    <a href="../../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a> <hr>
</div>

<div class="hide-in-others">
    <a href="../Administrator profile/adminViewProfile.php"> Profile </a> <hr>
    <a href="../manageAccounts/manage.php"> Accounts </a> <hr>
    <a href="../manageInventory/manageinventory.php"> Inventory </a> <hr>
    <a href="../../managepromotions/managepromotions.php"> Promotions </a> <hr>
    <a href="../manageSupplier/Supplier.php"> Supplier </a> 
    <a href="../../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a> <hr> 
</div>