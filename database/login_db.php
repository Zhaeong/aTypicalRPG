<?php
include 'base_db.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['login']) && isset($_POST['firstName']) && isset($_POST['lastName']))
{
    $dbObj = new databaseObj();
    $exist = $dbObj->doesUserExist($_POST['firstName'], $_POST['lastName']);
    
    if($exist > 0)
    {
        echo "Employee exists";
        $_SESSION['userid'] = $exist;
       
        
        //header('Location: ../main.php');   
    }
    else {
        echo "Employee Doesn't Exist";
    }  
}
else
{
    echo "database call failed";
}