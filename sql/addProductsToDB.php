<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './connection.php';

$userId = 1;
$status = 0;
$productId = 2;
$quantity = 5;
$query = $GLOBALS['$con']->query("SELECT * FROM ORDERS WHERE userId = $userId AND status = $status") or die($con->error);
$orderExist = $query->fetch_assoc();

if($orderExist->num_rows == 0)
{
    $query = $GLOBALS['$con']->query("INSERT INTO ORDERS (userID,status) 
                VALUES ('$userId','$status')");
      if($query){
          $query = $GLOBALS['$con']->query("SELECT orderID FROM ORDERS WHERE userId = $userId AND status = 0") or die($con->error);
          $orderExist = $query->fetch_assoc();
          $orderId = $orderExist['id'];
          
          //Insert product details in order_details table using order id generated
          $query = $GLOBALS['$con']->query("INSERT INTO ORDER_DETAILS (orderID,productID, quantity) 
                VALUES ('$orderId','$productId', '$quantity')");
      }
}
else
{
    $orderId = $orderExist['id'];
    
    $query = $GLOBALS['$con']->query("SELECT quantity FROM ORDERS_DETAILS WHERE productID = $userId AND orderID = $orderId") or die($con->error);
    $productExist = $query->fetch_assoc();
    
    if($productExist->num_rows == 0){
    //Insert product details in order_details table using order id generated
    $query = $GLOBALS['$con']->query("INSERT INTO ORDER_DETAILS (orderID,productID, quantity) 
                VALUES ('$orderId','$productId', '$quantity')");
    }
    else{
        if($quantity == 0)
        {
            $query = $GLOBALS['$con']->query("DELETE FROM ORDER_DETAILS 
                WHERE orderID = $orderID AND productID = $productId");
        }
        else{
        $query = $GLOBALS['$con']->query("UPDATE ORDER_DETAILS SET quantity = $quantity 
                WHERE orderID = $orderID AND productID = $productId");
        }
    }
}

?>

