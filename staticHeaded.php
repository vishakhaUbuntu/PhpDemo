<?php
include_once './register.php';
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
      <div class="second">
            <div class="header">
                <a href="index.php" style="text-decoration: none; color: white"><b>Shopping</b><span style="font-size: 50%;padding-top: 15px;padding-bottom: 10px;">.in</span></a>
            <input type="text" style="width: 40%; height:10%; margin-top: 8px; padding: 5px; margin-left: 15px" placeholder="Search"> 
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
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 8px; padding: 2px; text-align: left; color: white; font-size: 0.9em;"><i class="fa fa-shopping-cart" style="color: white;"></i><span style="font-size: 0.5em"><b>Cart</b></span></button>
            <p id="cartCount" style="background-color:transparent; border: none; margin-left: 2px; height: 10%; margin-top: 8px; text-align: left; color: white; font-size: 0.9em;"><?php session_start(); echo $_SESSION['count']; ?></p>
            <!--<p style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 8px; padding: 2px; text-align: left; color: white; font-size: 0.9em;"><?php // session_start(); $_SESSION['cartCount'] = 1; echo $_SESSION['cartCount'];?></p>-->
            <?php if($_SESSION['loggedIn'] && $_SESSION['userName'] != ""){
                session_start();
                $_SESSION['logout'] = true;
                echo '<span style="font-size: 0.5em"><a href="expireSession.php">Logout</a></span>';
            }
            ?>
        </div>
        </div>
    </body>
</html>

