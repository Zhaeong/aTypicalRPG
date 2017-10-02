<?php
include 'PageSetup/top_menu.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo ' 

<head>
    <title>Regis</title>    
    <link rel="stylesheet" href="CSS/main.css">    
    <script src="js/registration.js"></script>

</head>

<body>
';

getTopMenu();

echo ' 
    <div id = "Registration">
        <Label>First Name </Label>

            
<div>
    Bob<input type="radio" name = "firstName" id="bob"> 
    Barb<input type="radio" name = "firstName"  id="barb">   
</div>
        
        <Label>Last Name: </Label>
            <input type="text" id="lastName">        
            
        <br>
         <button type="button" onclick="register()">Apply</button> 
    </div>
    
</body>

';




 

// Check connection

