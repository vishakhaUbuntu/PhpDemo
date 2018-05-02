<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
include_once './staticHeaded.php';
?> 
<!DOCTYPE html>
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="./css/itemCards.css">
    </head>
    <body>
        <h1>Accessories page called</h1> 
        <?php
        $con = mysql_connect("localhost", "root", "123456");
        mysql_select_db("test", $con);
        $query= "select * from imagestable where category = 'accessory'";
        $result=mysql_query($query, $con);
        echo '<div style="display: flex;">';
        while($row = mysql_fetch_assoc($result))
        {
            echo '<form method="POST">
                  <div class="card">
                  <img src="data:image/jpeg;base64,'.base64_encode($row[image]).'">
                  <div class="container">
                  <h4><b>'.$row[item_name].'</b></h4>
                  <p>'.$row[price].'</p> 
                  <input type="number" name="qty" min="0" value="1" pattern="/^([0-9]\d*)$/"></input>
                  <button type="submit" value="'.$row[id].'" name="Add">Add</button>
                  </div>
                  </div>
                  </form>';
        }
        ?>
        
                <?php
         if($_SERVER['REQUEST_METHOD'] == 'POST')
        {    
             if(!isset($_SESSION['userID'])){
                include_once './register.php';
                echo '<script>hideRegister()</script>';
             }
            
            require './sql/connection.php';
            if(isset($_POST['Add']))
                require './sql/addProductsToDB.php';
            
            session_start();
            echo '<script>document.getElementById(\'cartCount\').innerHTML =' .$_SESSION['count'].'</script>';
        }
        ?>
    </body>
</html>