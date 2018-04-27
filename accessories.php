<?php
include_once './staticHeaded.php';
?> 
<!DOCTYPE html>
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="./css/itemCards.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>       
<!--        <script>

            function sendAjaxRequest() {
               var xmlHttp = new XMLHttpRequest();
               var url = "sql/addProductsToDB.php"
               var parameters = "firstname=Vishakha&lastname=Gupta";
               xmlHttp.open("POST", url, true);
               xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               xmlHttp.onreadystatechange=function() {
                    if (xmlHttp.readyState==4 && xmlHttp.status==200) {
                    document.getElementById("status").value="processed";
                    }
                }
        xmlHttp.send(parameters);
        document.getElementById("status").innerHTML = "processing";
}
        </script>-->
    </head>
    <body>
        <?php
         if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            require './sql/connection.php';
            if(isset($_POST['Add']))
                require './sql/addProductsToDB.php';
        }
        ?>

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
                  <input type="number" name="qty" min="1" value="1" pattern="/^([1-9]\d*)$/"></input>
                  <button type="submit" id="'.$row[id].'" name="Add">Add</button>
                  </div>
                  </div>
                  </form>';
        }
        ?>
    </body>
</html>