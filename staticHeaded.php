<?php
include_once './register.php';
if(!isset($_SESSION['userID']))
{
    echo '<script>document.getElementById(\'id01\').style.display=\'block\'</script>';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Some New Page Rechanged</title>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./css/welcomePage.css">
    </head>
    <body>
      
        <?php
        include_once './sql/connection.php';
          $userId = $_SESSION['userID'];
          if($userId != null){
          $query = $GLOBALS['$con']->query("SELECT orderID FROM ORDERS WHERE userId = $userId AND status = 0") or die($GLOBALS['$con']->error);
          $orderExist = $query->fetch_assoc();
          $orderId = $orderExist['orderID'];
          
          if($orderId != null){
          $query = $GLOBALS['$con']->query("SELECT COUNT(productID) from ORDERS_DETAILS where orderID = $orderId") or die($GLOBALS['$con']->error);
          $productCount = $query->fetch_assoc();
          $_SESSION['count'] = $productCount['COUNT(productID)'];
          }
          else{
              unset($_SESSION['count']);
          }
          }
        ?>
      <div class="second">
            <div class="header">
                <a href="index.php" style="text-decoration: none; color: white"><b>Shopping</b><span style="font-size: 50%;padding-top: 15px;padding-bottom: 10px;">.in</span></a>
                <input type="text" id="searchValue" style="width: 40%; height:10%; margin-top: 8px; padding: 5px; margin-left: 15px" placeholder="Search" onkeyup ="searchFunction(this.value)"> 
                <!--<div id="livesearch" style="width: 200px; height: 200px; background-color: yellow; color: red">Som</div>-->
            <button style="background-color:darkorange; width:50px ;border: none; height: 10%; margin-top: 8px; padding: 5px; font-size: 0.6em;" class="fa fa-search"></button>
            </div>
        <div class="header">              
            <?php
            session_start();
            if($_SESSION['loggedIn'] && $_SESSION['userName'] != ""){
                
                echo '<button style="background-color:transparent; border: none; margin-left: 12%; height: 10%; margin-top: 8px; padding: 5px; text-align: left; color: white">Hello '. $_SESSION['userName'].'<br><b>Your Orders</b> <i class="fa fa-caret-down" style="color: white;"></i></button>';
            }
            else{
                echo '<button type="button" style="background-color:transparent; border: none; margin-left: 12%; height: 5%; margin-top: 8px; padding: 5px; text-align: left; color: white" onclick="document.getElementById(\'id01\').style.display=\'block\'">Sign In</button>';
            }
            ?>         
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 8px; padding: 2px; text-align: left; color: white; font-size: 0.9em;" onclick="location.href='cart.php';"><i class="fa fa-shopping-cart" style="color: white;"></i><span style="font-size: 0.5em"><b>Cart</b></span></button>
            <p id="cartCount" style="background-color:transparent; border: none; margin-left: 2px; height: 10%; margin-top: 8px; text-align: left; color: white; font-size: 0.9em;"><?php session_start(); if(isset($_SESSION['count'])){echo $_SESSION['count'];} ?></p>
            <?php if($_SESSION['loggedIn'] && $_SESSION['userName'] != ""){
                session_start();
                $_SESSION['logout'] = true;
                echo '<span style="font-size: 0.5em"><a href="expireSession.php">Logout</a></span>';
            }
            ?>
        </div>
        </div>
        
<!--        <script>
          function searchFunction(str) {
              var str = "acc";
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","search.php?q="+str,true);
  xmlhttp.send();
}  
    </script>        -->
<!--//        function searchFunction(){
//            alert "something";
//        $con = mysql_connect("localhost", "root", "123456");
//        mysql_select_db("test", $con);
//        $query= "select * from imagestable where item_name LIKE ";
//        $result=mysql_query($query, $con);
//        echo '<div style="display: flex;">';
//        while($row = mysql_fetch_assoc($result))
//        {
//            echo '<form method="GET">
//                 <div class="card">
//                  <img src="data:image/jpeg;base64,'.base64_encode($row[image]).'">
//                  <div class="container">
//                  <h4><b>'.$row[item_name].'</b></h4>
//                  <p>'.$row[price].'</p> 
//                  <input type="number" name="qty" pattern="/^(0|[1-9]\d*)$/"></input>
//                  <button type="submit" id="Add" name="Add" onclick="loadDoc()">Add</button>
//                  </div>
//                 </div>
//                 </form>';
//        }
//        }-->
        
    </body>
</html>

