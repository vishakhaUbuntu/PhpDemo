<?php
include_once './connection.php';
session_start();
$userId = $_SESSION['userID'];
$status = 0;
$productId = $_POST['Add'];
$quantity = $_POST['qty'];
$query = $GLOBALS['$con']->query("SELECT orderID FROM ORDERS WHERE userId = $userId AND status = $status") or die($con->error);
$orderExist = $query->fetch_assoc();

if($orderExist == null)
{
    $query = $GLOBALS['$con']->query("INSERT INTO ORDERS (userID,status) 
                VALUES ('$userId','$status')") or die($GLOBALS['$con']->error);
      if($query){
          $query = $GLOBALS['$con']->query("SELECT orderID FROM ORDERS WHERE userId = $userId AND status = 0") or die($GLOBALS['$con']->error);
          $orderExist = $query->fetch_assoc();
          $_SESSION['orderId'] = $orderExist['orderID'];
          
          //Insert product details in order_details table using order id generated
          $query = $GLOBALS['$con']->query("INSERT INTO ORDERS_DETAILS (orderID,productID, quantity) 
                VALUES ('$orderId','$productId', '$quantity')");
          $query = $GLOBALS['$con']->query("SELECT COUNT(productID) from ORDERS_DETAILS where orderID = $orderId") or die($GLOBALS['$con']->error);
          $productCount = $query->fetch_assoc();
          $_SESSION['count'] = $productCount['COUNT(productID)'];
      }
}
else
{
    $_SESSION['orderId'] = $orderExist['orderID'];
    
    $query = $GLOBALS['$con']->query("SELECT * FROM ORDERS_DETAILS WHERE productID = $productId AND orderID = $orderId") or die($GLOBALS['$con']->error);
    $productExist = $query->fetch_assoc();
    
    if($productExist == null){
    //Insert product details in order_details table using order id generated
    $query = $GLOBALS['$con']->query("INSERT INTO ORDERS_DETAILS (orderID,productID, quantity) 
                VALUES ('$orderId','$productId', '$quantity')");
    $query = $GLOBALS['$con']->query("SELECT COUNT(productID) from ORDERS_DETAILS where orderID = $orderId") or die($GLOBALS['$con']->error);
    $productCount = $query->fetch_assoc();
    $_SESSION['count'] = $productCount['COUNT(productID)'];
    }
    else{
        if($quantity == 0)
        {
            $query = $GLOBALS['$con']->query("DELETE FROM ORDERS_DETAILS 
                WHERE orderID = $orderId AND productID = $productId") or die($GLOBALS['$con']->error);
            $query = $GLOBALS['$con']->query("SELECT COUNT(productID) from ORDERS_DETAILS where orderID = $orderId") or die($GLOBALS['$con']->error);
            $productCount = $query->fetch_assoc();
            $_SESSION['count'] = $productCount['COUNT(productID)'];
        }
        else{
        $query = $GLOBALS['$con']->query("UPDATE ORDERS_DETAILS SET quantity = $quantity
                WHERE orderID = $orderId AND productID = $productId") or die($GLOBALS['$con']->error);
        $query = $GLOBALS['$con']->query("SELECT COUNT(productID) from ORDERS_DETAILS where orderID = $orderId") or die($GLOBALS['$con']->error);
        $productCount = $query->fetch_assoc();
        $_SESSION['count'] = $productCount['COUNT(productID)'];
        }
    }
}
?>

