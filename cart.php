<?php
include_once './staticHeaded.php';
include_once './sql/connection.php';
?>
<!DOCTYPE html>
<html> 
    <head>
        <!--<link rel="stylesheet" type="text/css" href="./css/itemCards.css">-->
    </head>
    <body>
        <h1 style="margin-left: 45%; margin-right: 30%;">Cart page called</h1> 
        <?php
        $orderID = 1;
        $con = mysql_connect("localhost", "root", "123456");
        mysql_select_db("test", $con);
        $query= "select imagestable.id,imagestable.image,imagestable.item_name,imagestable.quantity as actual,imagestable.price,ORDERS_DETAILS.quantity from imagestable join ORDERS_DETAILS on imagestable.id = ORDERS_DETAILS.productID where ORDERS_DETAILS.orderID = $orderID;";
        $result=mysql_query($query, $con);
        echo '<table style="width: 100%;">
              <tbody>';
        while($row = mysql_fetch_assoc($result))
        {
            if($row[actual] < $row[quantity]){
                $message = "Only ".$row[actual]." items left in stock";
                $checkout = 0;
            }
            else{
                $message = "";
                $checkout = 1;
            }
            echo '<tr>
                  <th><img style="width:50px; height:50px" src="data:image/jpeg;base64,'.base64_encode($row[image]).'"></th>
                  <td style="width:20%"><p>'.$row[item_name].'</p></td>
                  <td style="width:20%"><p>'.$row[quantity].'</p></td>
                  <td style="width:20%"><p>'.$row[price].'</p></td>
                  <td style="width:10%; color:red;"><p>'.$message.'</p></td>
                  </tr>';
            $priceTotal += ($row[price]*$row[quantity]); 
        }
        echo '<tr>
              <td style="width:20%"><p></p></td>
              <td style="width:20%"><p></p></td>
              <td style="width:20%"><b>Total</b></td>
              <td style="width:20%"><b>'.$priceTotal.'</b></td>
              </tr>
              </tbody>
              </table>'
        ?>
        <br><br>
        <div  style="text-align: center">
        <?php
        if($checkout == 0){
        echo '
             <button type="button" disabled>Checkout</button>
             <div style="color:red">You cannot proceed and few items in you cart are out of stock</div>';
        }
        else{
            echo '<button onclick="location.href=\'address.php\';">Checkout</button>';
        }
        ?>
        </div>
        
        <!--Put all table creations code in one page-->
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

