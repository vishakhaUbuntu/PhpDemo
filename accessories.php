<?php
include_once './staticHeaded.php';
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    
}
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
        $query= "select * from imagestable where category='accessory'";
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
                  <button type="submit" id="Add">Add</button>
                  </div>
                 </div>
                </form>';
        }
        ?>
            
        <!--<div class="card">
            <img src="./imageRefs/accessories/accessory2.jpg" alt="Avatar" style="width:100%">
            <div class="container">
            <h4><b>Accessory 2</b></h4> 
            <p>$300</p> 
            <button id="Add">Add</button>
        </div>
        </div>-->            
    </body>
</html>