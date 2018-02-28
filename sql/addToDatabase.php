<?php
//include_once 'connection.php';
require __DIR__ . '/../validations/phpValidations.php'; 
/*------------------Get the value of all the variables of a form--------------------*/
$first_name = filter_input(INPUT_POST, 'fname');
$last_name = filter_input(INPUT_POST, 'lname');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'passwd');

/*------------------Check for the validity of all the variables---------------------*/
if(checkForStrings($first_name) && checkForStrings($last_name) && checkForEmails($email) && !empty($password))
{
    $full_name = $first_name.' '.$last_name;                //Combine first and last name
    
    /*------------------Encrypt the password and generate a salt string--------------------*/
      $md5Password = md5($password);                        //Encrpt the password and generate a string
      $salt = bin2hex(openssl_random_pseudo_bytes(12));     //Generate a salt string
      $combine = $salt.$md5Password;                        //Append password string to salt
      $finalMD5 = md5($combine);                            //Encrypt salt and password together
      
    /*------------------Escape the string variables before putting in dbc-------------------*/
      $full_name = $GLOBALS['$con']->real_escape_string($full_name);
      $email = $GLOBALS['$con']->real_escape_string($email);

    /*------------------Add the data to the db after all the validations--------------------*/  
      $query = $GLOBALS['$con']->query("INSERT INTO first_table (full_name,email,password,salt) 
                VALUES ('$full_name','$email','$finalMD5','$salt')");
      if($query){
         $_SESSION['error'] = "1";  //Registered Successfully!
         header('Location: /PhpDemo/error.php');
      }
      else {
         $_SESSION['error'] = "2";//Unable to register
         header('Location: /PhpDemo/error.php');
      }
}
?>