<?php
session_start();
include_once 'staticHeaded.php';
$_SESSION['url'] = "./furniture.php";
?>
<!DOCTYPE html> 
<html>
    <body>
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
        <h1>Furniture page called</h1>
        <?php
        $con = mysql_connect("localhost", "root", "123456");
        mysql_select_db("test", $con);
        $query= "select * from imagestable";
        $result=mysql_query($query, $con);
        echo '<div style="display: flex;">';
        while($row = mysql_fetch_assoc($result))
        {
            echo '<form method="GET">
                  <div class="card">
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
    </body> 
</html>