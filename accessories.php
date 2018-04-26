<?php
include_once './staticHeaded.php';
?> 
<!DOCTYPE html>
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="./css/itemCards.css">
    </head>
    <body>
        <script>

            function sendAjaxRequest() {
                var $url = "sql/addProductsToDB.php";
             var clickedButton = element;
              $.ajax({type: "POST",
                  url: $url,
                  data: { quantity: 5 },
                  success:function(result){
                    alert('ok');
                  },
                 error:function(result)
                  {
                  alert('error');
                 }
             });
     }
        </script>

        <h1>Accessories page called</h1> 
        <?php
        $con = mysql_connect("localhost", "root", "123456");
        mysql_select_db("test", $con);
        $query= "select * from imagestable where category='accessory'";
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
                  <button type="submit" id="Add" name="Add" onclick="add()">Add</button>
                  </div>
                  </div>
                  </form>';
        }
        ?>
    </body>
</html>