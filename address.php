<?php
include_once './staticHeaded.php';
?>
<!DOCTYPE html>
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="./css/itemCards.css">
    </head>
    <body>
        <h1>Address page called</h1> 
        <h4>Add a new address</h4><br>
        <form name="login" id="login" action='' method="post">
        Full Name:<br><input type="text"><br>
        <br>Mobile number:<br><input type="text"><br>
        <br>Pincode:<br><input type="text"><br>
        <br>Flat, House no., Building, Company, Apartment:<br><input type="text"><br>
        <br>Area, Colony, Street:<br><input type="text"><br>
        <br>Landmark:<br><input type="text"><br>
        <br>Town/City:<br><input type="text"><br>
        <br>State:<br><input type="text"><br>
        <br><input type="submit" onclick="return addAddress()/>
        </form>  
    </body>
</html>

