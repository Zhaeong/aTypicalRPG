<?php
session_start();

//Check if user already logged in
if(isset($_SESSION['userid']))
{
    header( "Location: main.php" );
}

include 'PageSetup/top_menu.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo ' 

<head>
    <title>Bob</title>    
    <link rel="stylesheet" href="CSS/main.css">
    <script src="js/login.js"></script>
</head>
<body>
';

getTopMenu();

echo '
    <div id = "MainLogin">
        <Label>First Name </Label>
        <div>
            Bob<input type="radio" name = "firstName" id="bob"> 
            Barb<input type="radio" name = "firstName"  id="barb">   
        </div>
        
        <Label>Last Name: </Label>
            <input type="text" id="lastName">            
        <br>
         <button type="button" onclick="login()">Enter</button> 
    </div>
    </div>
</body>
';