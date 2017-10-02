<?php
include 'base_db.php';
if(isset($_POST['register']) && isset($_POST['lastName']) && isset($_POST['firstName']))
{
    $dbObj = new databaseObj();
    $dbObj->registerUser($_POST['firstName'], $_POST['lastName']);
    $dbObj->disconnectDB();    
}
else
{
    echo "didn't insert";
}
