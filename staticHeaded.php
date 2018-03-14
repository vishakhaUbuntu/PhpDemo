<!DOCTYPE html>
<html>
    <head>
        <title>Some New Page Rechanged</title>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./css/welcomePage.css">
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    </head>
    <body>
        <div class="second">
        <div class="header"><b>Shopping</b><span style="font-size: 50%;padding-top: 15px;padding-bottom: 10px; ">.in</span>
            <button style="margin-left: 10%; width: 50px; height: 10%; margin-top: 8px; padding: 5px">All <i class="fa fa-caret-down" aria-hidden="true"></i></button>
            <input type="text" style="width: 40%; height:10%; margin-top: 8px; padding: 5px" placeholder="Search"> 
            <button style="background-color:darkorange; width:50px ;border: none; height: 10%; margin-top: 8px; padding: 5px; font-size: 0.6em;" class="fa fa-search"></button>
            <!--<button style="background-color:darkorange; width:50px ;border: none; height: 10%; margin-top: 8px; padding: 5px; font-size: 0.6em;" class="fa fa-search"></div>-->
        </div>
        <div class="header">
            <!--<div class="dropdown">-->
            <!--<button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 8px; padding: 5px; text-align: left; color: white">Shop By <br><b>Categories</b> <i class="fa fa-caret-down" style="color: white;"></i></button>-->
            <!--<div class="dropdown-content">-->
            <!--</div>-->
            <!--</div>--> 
            
            <button style="background-color:transparent; border: none; margin-left: 18%; height: 10%; margin-top: 21px; padding: 2px; color:white">Your Amazon.in</button>
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 21px; padding: 2px; color:white">Today's Deals</button>
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 21px; padding: 2px; color:white">Amazon pay</button>
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 21px; padding: 2px; color:white">Sell</button>
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 21px; padding: 2px; color:white">Customer Service</button>
        
            <?php
            session_start();
            if($_SESSION['loggedIn'] && $_SESSION['userName'] != ""){
                
                echo '<button style="background-color:transparent; border: none; margin-left: 12%; height: 10%; margin-top: 8px; padding: 5px; text-align: left; color: white">Hello '. $_SESSION['userName'].'<br><b>Your Orders</b> <i class="fa fa-caret-down" style="color: white;"></i></button>';
            }
            else{
                echo '<input type="button" style="background-color:transparent; border: none; margin-left: 12%; height: 5%; margin-top: 8px; padding: 5px; text-align: left; color: white">Hello<a href="login.php">Sign In</a></input>';
            }
            ?>         
            <button style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 8px; padding: 5px; text-align: left; color: white; font-size: 0.9em;"><i class="fa fa-shopping-cart" style="color: white;"></i><span style="font-size: 0.5em"><b>Cart</b></span></button>
            <p style="background-color:transparent; border: none; margin-left: 10px; height: 10%; margin-top: 8px; padding: 2px; text-align: left; color: white; font-size: 0.9em;">2</p>
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

