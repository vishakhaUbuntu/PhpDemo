<?php
include_once './connection.php';
echo 'add products to db page called';
$userId = 1;
$status = 0;
$productId = 3;
$quantity = 1;
$query = $GLOBALS['$con']->query("SELECT orderID FROM ORDERS WHERE userId = $userId AND status = $status") or die($con->error);
$orderExist = $query->fetch_assoc();
echo $orderExist;

if($orderExist == null)
{
    $query = $GLOBALS['$con']->query("INSERT INTO ORDERS (userID,status) 
                VALUES ('$userId','$status')");
      if($query){
          $query = $GLOBALS['$con']->query("SELECT orderID FROM ORDERS WHERE userId = $userId AND status = 0") or die($con->error);
          $orderExist = $query->fetch_assoc();
          $orderId = $orderExist['orderID'];
          
          //Insert product details in order_details table using order id generated
          $query = $GLOBALS['$con']->query("INSERT INTO ORDERS_DETAILS (orderID,productID, quantity) 
                VALUES ('$orderId','$productId', '$quantity')");
      }
}
else
{
    $orderId = $orderExist['orderID'];
    
    $query = $GLOBALS['$con']->query("SELECT * FROM ORDERS_DETAILS WHERE productID = $productId AND orderID = $orderId") or die($con->error);
    $productExist = $query->fetch_assoc();
    
    if($productExist == null){
    //Insert product details in order_details table using order id generated
    $query = $GLOBALS['$con']->query("INSERT INTO ORDERS_DETAILS (orderID,productID, quantity) 
                VALUES ('$orderId','$productId', '$quantity')");
    }
    else{
        if($quantity == 0)
        {
            $query = $GLOBALS['$con']->query("DELETE FROM ORDERS_DETAILS 
                WHERE orderID = $orderId AND productID = $productId") or die($GLOBALS['$con']->error);
        }
        else{
        $query = $GLOBALS['$con']->query("UPDATE ORDERS_DETAILS SET quantity = $quantity
                WHERE orderID = $orderId AND productID = $productId") or die($GLOBALS['$con']->error);
        }
    }
}
?>

