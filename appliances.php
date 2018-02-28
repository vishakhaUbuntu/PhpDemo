<!DOCTYPE html>
<html>
    <body>
        <h1>Appliances page called</h1>
        <?php
        include './expireSession.php';
        echo $_SESSION['loggedIn'];
        if(!isset($_SESSION['loggedIn'])){
            echo $_SESSION['loggedIn'];
            header('Location: ./login.php');
        }
        ?>
    </body>
</html>