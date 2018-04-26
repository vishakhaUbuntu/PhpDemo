<?php 
    include_once 'connection.php';
    session_start();
    /*------------------Get the value of all the variables of a form--------------------*/
    $email      = filter_input(INPUT_POST, 'emailLogin');
    $password   = filter_input(INPUT_POST, 'passwdLogin');
    $rememberMe = $_POST['remember'];

    /*------------------Escape the variables before passing in SQL query----------------*/
    $email = $GLOBALS['$con']->escape_string($email);
    $password = $GLOBALS['$con']->escape_string($password);

    /*------------------Run a query to fetch password for an email id-------------------*/
    $query = $GLOBALS['$con']->query("SELECT * FROM first_table WHERE email = '$email'") or die($con->error);
    $userDetails = $query->fetch_assoc();
    
    /*-----------------------Check if email id exists or not----------------------------*/
    if($userDetails == null){
//        $_SESSION['error'] = 4; 
//        header('location: /PhpDemo/error.php');
    }
    else
    {
        $md5UserPass = md5($password);
        $saltFromDB = $userDetails['salt'];
        $password = md5($saltFromDB.$md5UserPass);
        if($password == $userDetails['password']){ 
            if(isset($rememberMe))
            {
                $_SESSION['userEmail']    = $email;
                $_SESSION['userPassword'] = $password;
            }
            $_SESSION['userName'] = explode(" ", $userDetails['full_name'])[0];
            $_SESSION['userID'] = $userDetails['id'];
            if(isset($_SESSION['url']))
            {
               header("Location:".$_SESSION['url'], TRUE);
               $_SESSION['loggedIn'] = true;
               $_SESSION['lastActivity'] = time();
            }
            else {
                echo 'Login Successful';
//               $_SESSION['error'] = 3;//Login Successful
               $_SESSION['loggedIn'] = true;
               $_SESSION['lastActivity'] = time();
//               header('location: /PhpDemo/error.php');
            }
        }
        else {
            echo 'something';
//            $_SESSION['error'] = 4;//Typed password does not match
//            header('location: /PhpDemo/error.php');
        }
    }
//}
// else {
//    header('location: /PhpDemo/index.php');
//}
?>