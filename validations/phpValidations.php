<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function checkForStrings($str){
    if(!empty($str))
    {
        $result = rtrim($str);//
        if(!empty($result))
        {
            return true;
        }
        else {
            return false;    
        }
    }
    else {
        return false;    
    }
}

function checkForEmails($eMail){
    if(!empty($eMail))
    {
        if(filter_var($eMail, FILTER_VALIDATE_EMAIL))
            return true;
        else
            return false;
    }
}

?>
