<?php
include_once './staticHeaded.php';
include_once './sql/connection.php';
<<<<<<< HEAD
=======

//Creating the table if it doesn't exist
$query = $GLOBALS['$con']->query("SHOW TABLES LIKE 'ORDERS'");
if($query->num_rows == 0){
echo 'Going inside tables loop';
$sql = "CREATE TABLE ORDERS (
        orderID int NOT NULL AUTO_INCREMENT,
        userID int NOT NULL,
        status varchar(25) NOT NULL,
        PRIMARY KEY (orderID),
        FOREIGN KEY (userID) REFERENCES first_table(id)
)";
$query = $GLOBALS['$con']->query($sql) or die($GLOBALS['$con']->error);
if($query)
    echo 'Table created';
else
    echo 'Table not created';
}

//Creating the table if it doesn't exist
$query = $GLOBALS['$con']->query("SHOW TABLES LIKE 'ORDER_DETAILS'");
if($query->num_rows == 0){
echo 'Going inside tables loop';
$sql = "CREATE TABLE ORDER_DETAILS(
        orderID int NOT NULL AUTO_INCREMENT,
        productID int NOT NULL,
        quantity int NOT NULL,
        PRIMARY KEY (orderID),
        FOREIGN KEY (productID) REFERENCES imagestable(id)
)";
$query = $GLOBALS['$con']->query($sql) or die($GLOBALS['$con']->error);
if($query)
    echo 'Table created';
else
    echo 'Table not created';
}
>>>>>>> 5b965cd8971b1c618ffd8dae0cf93941ec57836e
?>
<!DOCTYPE html>
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="./css/itemCards.css">
    </head>
    <body>
        <h1>Cart page called</h1> 
        <script>
        function loadDoc()
        {
            <?php  
            if(isset($_GET['Add'])){
            session_start();
            $_SESSION['count'] = $_SESSION['count'] + 1; 
            echo 'document.getElementById("cartCount").innerHTML = '.$_SESSION['count']. ';';
            }
            ?>
        }
        </script>
        <?php
        $con =mysql_connect("localhost", "root", "123456");
        mysql_select_db("test", $con);
        $query= "select * from imagestable where category='mobile'";
        $result=mysql_query($query, $con);
        echo '<div style="display: flex;">';
        while($row = mysql_fetch_assoc($result))
        {
        echo '<form method="GET"><div class="card">
            <img src="data:image/jpeg;base64,'.base64_encode($row[image]).'">
        <div class="container">
            <h4><b>'.$row[item_name].'</b></h4>
        <p>'.$row[price].'</p> 
            <input type="number" name="qty" pattern="/^(0|[1-9]\d*)$/"></input>
            <button type="submit" id="Add" name="Add" onclick="loadDoc()">Add</button>
        </div>
        </div>
        </form>';
        }
        ?>
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

