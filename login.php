<!DOCTYPE html>
<?php
session_start();
$_SESSION['error'] = 0;
?>
<html>
<head>
<title>Shopping</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" type="text/css" href="./css/login.css">
<!--<link href="https://bootswatch.com/4/sketchy/bootstrap.min.css" rel="stylesheet" type="text/css">-->
</head>

<body onload="document.getElementById('id01').style.display='block'">
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            require './sql/connection.php';
            if(isset($_POST['Login']))
            {
                require './sql/getFromDatabase.php';
            }

            if(isset($_POST['Register'])){
                require './sql/addToDatabase.php';
            }      
        }
    ?>

<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="" method="post">

  <label style="display: block; text-align: center; font-size: 2em"><b>Login</b></label>
    <div class="container">
      <label for="email"><b>Email Id</b></label>
      <input type="text" placeholder="Enter Email Id" name="emailLogin" id="emailLogin" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="passwdLogin" id="passwdLogin" required>

      <button type="submit" value="Submit" name="Login" onclick="return loginValidate()">Login</button>
      <label>
        <input type="checkbox" name="remember" value="remember">Remember Me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="location.href='index.php';" class="cancelbtn">Cancel</button>
      <span class="psw"><a href="register.php">Register</a></span>
    </div>
  </form>
</div>

   
<script>
    
    function populateAlert()
        {
            document.getElementById("errorDiv").innerHTML = "Error Message";
        }
    
    function hideRegister()
        {
            document.getElementById("register").style.display="none";
            document.getElementById("login").style.display="block";
        }
        
    function hideLogin()
        {
            document.getElementById("register").style.display="block";
            document.getElementById("login").style.display="none";
        }
        
    function Validate()
        {
            var letters = "[a-zA-Z][a-zA-Z\s]*";
            var password = "[a-zA-Z0-9][^\w\s]*";
            var firstName = document.getElementById("fname").value;
            var lastName = document.getElementById("lname").value;
            if(firstName === "" || lastName === "")
                {
                    alert ("First name or Last name fields cannot be blank");
                    return false;
                }
            if(!(/^[a-zA-Z]*$/g.test(firstName)) || !(/^[a-zA-Z]*$/g.test(lastName)))
                {
                    alert ("Invalid name format");
                    return false;
                }
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value) === false)
                {  
                    alert("You have entered an invalid email address!")  
                    return false;
                }  
            if (!(password.test(document.getElementById("passwd").value)))  
                {  
                    alert("You have entered an invalid password!");  
                    return false;
                }    
            }
           
           function loginValidate()
            {
                var password = "[a-zA-Z0-9][^\w\s]*";
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("emailLogin").value) === false)
                    {  
                        alert("You have entered an invalid email address!")  
                        return false;
                    }
                if (!(password.test(document.getElementById("passwdLogin").value)))  
                    {  
                        alert("You have entered an invalid password!");  
                        return false;
                    } 
            } 
        </script>
        <?php
        if($_SESSION['error'] == 5){
            $_SESSION['error'] = 0;
        echo "<script type='text/javascript'>
                hideRegister();
        </script>";
        }
        if($_SESSION['error'] == 6){
            $_SESSION['error'] = 0;
        echo "<script type='text/javascript'>
                hideLogin();
        </script>";
        }
        if($_SESSION['userEmail'] && ($_SESSION['error'] == 0)){
            echo "<script type='text/javascript'>
                hideRegister();
                populateFields();
        </script>";
        }
        ?>

</body>
</html>