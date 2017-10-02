<?php
include 'base_db.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['drinkCoffee']) )
{
    $dbObj = new databaseObj();
    //$exist = $dbObj->doesUserExist($_POST['firstName'], $_POST['lastName']);    
    echo $dbObj->addMind(20);    
}