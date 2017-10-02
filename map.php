<?php
include 'PageSetup/top_menu.php';
include 'PageSetup/side_profile.php';
include 'database/base_db.php';
if(!isset($_SESSION)) 
{
   session_start(); 
} 
if(!$_SESSION['userid'])
{
    header( "Location: index.php" );
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$userId = $_SESSION['userid'];
echo ' 

<head>
    <title>Employee ' . $userId .
    '</title> <link rel="stylesheet" href="CSS/main.css">
    <script src="js/login.js"></script>
</head>
<body>
';
    getMainTopMenu();


    echo '<div class = "Main">';
        getSideProfile();

        echo '<div class = "Content">';
            echo '<div id = "Map">';
               echo '<div class = "map-item" onclick="location.href=\'breakroom.php\';">';
                    echo 'Break Room';
               echo '</div>';  
               
               echo '<div class = "map-item" >';
                    echo 'Steve\'s Cube';
               echo '</div>';  
            echo '</div>';  
        echo '</div>';


//close the Main div
    echo '</div>';
//close the body div    
echo '</body>';