<?php
//include 'database/base_db.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getSideProfile() {
    $userId = $_SESSION['userid'];
    $dbObj = new databaseObj();
    $name = $dbObj->getName($userId);
    
    //echo '<div id="sidebar">';
        echo '<aside id="profile">';   
            echo '<img id = "profilepic" src="profileimages/bob.png" >';            
            echo '<br>';
            echo 'Name: ' . $name["firstname"] . ' ' . $name["lastname"];
            echo '<br>';
            echo 'Title: ' . $name["rankname"];
            echo '<br>';
            echo 'Work Experience: ' . $name["exp"];
            echo '<br>';
            echo 'Mind: ' . $name["mind"] . '%';
            echo '<br>';
            echo 'Body: ' . $name["body"] . '%';


        echo '</div>';    
    //echo '</div>';   
} 