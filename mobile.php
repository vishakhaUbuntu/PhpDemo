<?php
include_once './staticHeaded.php';
?> 
<!DOCTYPE html>
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="./css/itemCards.css">
    </head>
    <body>
        <h1>Mobile page called</h1>
        
        <script>
        function loadDoc()
        {
            <?php  
            if(isset($_GET['Add'])){
            session_start();
            $_SESSION['count'] = $_SESSION['count'] + 1; 
            echo 'document.getElementById("cartCount").innerHTML = '.$_SESSION['count']. ';';
            }
            ?>
        }
        </script>
        <?php
        $con =mysql_connect("localhost", "root", "123456");
        mysql_select_db("test", $con);
        $query= "select * from imagestable where category='mobile'";
        $result=mysql_query($query, $con);
        echo '<div style="display: flex;">';
        while($row = mysql_fetch_assoc($result))
        {
        echo '<form method="GET"><div class="card">
            <img src="data:image/jpeg;base64,'.base64_encode($row[image]).'">
        <div class="container">
            <h4><b>'.$row[item_name].'</b></h4>
        <p>'.$row[price].'</p> 
            <input type="number" name="qty" pattern="/^(0|[1-9]\d*)$/"></input>
            <button type="submit" id="Add" name="Add" onclick="loadDoc()">Add</button>
        </div>
        </div>
        </form>';
        }
        ?>
            
<!--            <div class="card">
            <img src="./imageRefs/accessories/accessory2.jpg" alt="Avatar" style="width:100%">
          <div class="container">
            <h4><b>Accessory 2</b></h4> 
            <p>$300</p> 
            <button id="Add">Add</button>
        </div>
        </div>
            
            <div class="card">
            <img src="./imageRefs/accessories/accessory3.jpg" alt="Avatar" style="width:100%">
          <div class="container">
            <h4><b>Accessory 3</b></h4> 
            <p>$300</p> 
            <button id="Add">Add</button>
        </div>
        </div>
            
            <div class="card">
            <img src="./imageRefs/accessories/accessory4.jpg" alt="Avatar" style="width:100%">
          <div class="container">
            <h4><b>Accessory 4</b></h4> 
            <p>$300</p> 
            <button id="Add">Add</button>
        </div>
        </div>
            
            <div class="card">
            <img src="./imageRefs/accessories/accessory5.jpg" alt="Avatar" style="width:100%">
          <div class="container">
            <h4><b>Accessory 5</b></h4> 
            <p>$300</p> 
            <button id="Add">Add</button>
        </div>
        </div>
            
        </div>-->            
    </body>
</html>

<?php 
//session_start();
//include_once 'staticHeaded.php';
//$_SESSION['url'] = "./mobil.php";
?>
<!--<!DOCTYPE html>
<html>
    <body>
        <h1>Mobile page called</h1>
        //<?php
//        include './expireSession.php';
//        echo $_SESSION['loggedIn'];
//        if(!isset($_SESSION['loggedIn'])){
//            echo $_SESSION['loggedIn'];
//            $_SESSION['error'] = 5;
//            header('Location: ./login.php');
//        }
//        ?>
    </body> 
</html>-->