<?php
//Connection Settings
    $host = 'localhost';
    $user = 'root';
    $pass = '123456';
    $db = 'test';
    $GLOBALS['$con'] = new mysqli($host, $user, $pass, $db) OR die($con->error);

    // Check connection
    if ($con->connect_errno)
      {
        echo "Failed to connect to MySQL: " . $con->error;
      }
    else
      {
        echo "Connected<br>";
      }
?>

