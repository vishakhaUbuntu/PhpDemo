<?php
session_start();
include_once 'staticHeaded.php';
$_SESSION['url'] = "./shoes.php";
?>
<!DOCTYPE html>
<html>
    <body>
        <h1>Shoes page called</h1>
        <?php
        include './expireSession.php';
        echo $_SESSION['loggedIn'];
        if(!isset($_SESSION['loggedIn'])){
            echo $_SESSION['loggedIn'];
            $_SESSION['error'] = 5;
            header('Location: ./login.php');
        }
        ?>
    </body> 
</html>