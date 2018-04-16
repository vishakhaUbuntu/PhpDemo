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
<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>

<body>
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

    <!-- The Modal for Login-->
        <div id="id01" class="modal">
          <span onclick="document.getElementById('id01').style.display='none'" 
        class="close" title="Close Modal">&times;</span>

          <!-- Modal Content -->
          <form class="modal-content animate" action="" method="post">

          <label style="display: block; text-align: center; font-size: 2em"><b>Login</b></label>
            <div class="container">
              <label for="email"><b>Email Id</b></label>
              <input type="text" placeholder="Enter Email Id" name="emailLogin" id="emailLogin" onfocus ="resetForm(this.id)" required>

              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="passwdLogin" id="passwdLogin" required>

              <button type="submit" value="Submit" name="Login" onclick="return loginValidate()">Login</button>
              <label>
                <input type="checkbox" name="remember" value="remember">Remember Me
              </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
              <button type="button" id="cancelLogin" onclick="resetForm(this.id)" class="cancelbtn">Cancel</button>
              <span class="psw"><a onclick="hideLogin()">Register</a></span>
            </div>
          </form>
        </div>   
    
<!-- The Modal for Register-->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="" method="post">
<label style="display: block; text-align: center; font-size: 2em"><b>Register</b></label>
    <div class="container">
      <label for="firstname"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="fname" id="fname" required>
      
      <label for="lastname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="lname" id="lname" required>

      <label for="email"><b>Email Id</b></label>
      <input type="text" placeholder="Enter Email Id" name="email" id="emailRegister" required>
      
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="passwd" id="passwdRegister" required>

      <button type="submit" value="Submit" name="Register" onclick="return Validate()">Register</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" id="cancelRegister" onclick="resetForm(this.id)" class="cancelbtn">Cancel</button>
      <span class="psw"><a onclick="hideRegister()">Login</a></span>
    </div>
  </form>
</div>

   
<script>  
    function resetForm(id){
        document.getElementById(id).form.reset();
//        if(id == 'cancelLogin')
//            document.getElementById("id01").style.display="none";
//        else
//            document.getElementById("id02").style.display="none";
    }
    
    function hideRegister()
        {
            document.getElementById("id02").style.display="none";
            document.getElementById("id01").style.display="block";
        }
        
    function hideLogin()
        {
            document.getElementById("id02").style.display="block";
            document.getElementById("id01").style.display="none";
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
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("emailRegister").value) === false)
                {  
                    alert("You have entered an invalid email address!")  
                    return false;
                }  
            if (!(password.test(document.getElementById("passwdRegister").value)))  
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
</body>
</html>

