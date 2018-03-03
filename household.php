<?php
session_start();
include_once 'staticHeaded.php';
//$_SESSION['url'] = "./household.php";
$_SESSION['url'] = $_SERVER["REQUEST_URI"];
echo substr($_SESSION['url'],8);
$val_test = $_GET['test'];
?>
<!DOCTYPE html>
<html>
    <body>
        <h1>Household page called</h1>
        <h2><?php echo 'Got',$val_test?></h2>
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