<?php
session_start();

$expireAfter = 60;

if (isset($_SESSION['lastActivity'])) {
    
    $inactivity = time() - $_SESSION['lastActivity'];
    if($inactivity > $expireAfter){
    // last request was more than 1 minute ago
    session_unset($_SESSION['loggedIn']);     // unset $_SESSION variable for the run-time 
    session_unset($_SESSION['userName']);
    $_SESSION['lastActivity'] = time(); // update last activity time stamp
}
} 
?>

