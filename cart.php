<?php
include_once './staticHeaded.php';
include_once './sql/connection.php';
?>
<!DOCTYPE html>
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="./css/itemCards.css">
    </head>
    <body>
        <h1>Cart page called</h1> 
        <button>Checkout</button>
        
        <!--Code to create tables if they don't exist-->
        <?php
            //Orders table
            $query = $GLOBALS['$con']->query("SHOW TABLES LIKE 'ORDERS'");
            if($query->num_rows == 0){
                $sql = "CREATE TABLE ORDERS (
                        orderID int NOT NULL AUTO_INCREMENT,
                        userID int NOT NULL,
                        address varchar(250) NOT NULL,
                        status int NOT NULL,
                        PRIMARY KEY (orderID),
                        FOREIGN KEY (userID) REFERENCES first_table(id)
                )";
            $GLOBALS['$con']->query($sql) or die($GLOBALS['$con']->error);
            }
            
            //Order details table
            $query = $GLOBALS['$con']->query("SHOW TABLES LIKE 'ORDERS_DETAILS'");
            if($query->num_rows == 0){
                $sql = "CREATE TABLE ORDERS_DETAILS (
                        orderID int NOT NULL AUTO_INCREMENT,
                        productID int NOT NULL,
                        quantity int NOT NULL,
                        PRIMARY KEY (orderID, productID),
                        FOREIGN KEY (productID) REFERENCES imagestable(id)
                )";
            $GLOBALS['$con']->query($sql) or die($GLOBALS['$con']->error);
            }
        ?>          
    </body>
</html>

