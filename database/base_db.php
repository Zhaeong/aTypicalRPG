<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

class databaseObj {
    public $databaseIp = 'localhost';    
    public $user = 'root';    
    public $pass = '';    
    public $databaseName = 'atypicaldb';
    private $link;   
   
    function databaseObj() {
        $this->connectDB();
    }
    function connectDB() {
        $this->link = mysqli_connect($this->databaseIp, $this->user, $this->pass, $this->databaseName); 
    }
    
    function disconnectDB()
    {
        mysqli_close($this->link);        
    }
    
    function registerUser($firstName, $lastName)
    {
        if($this->doesUserExist($firstName, $lastName) == -1)
        {
            if($this->link === false){
            echo "ERROR: Could not connect. " . mysqli_connect_error();
            }
            $sql = "INSERT INTO users (firstname, lastname) VALUES ('". $firstName ."' , '". $lastName . "')";

            if(mysqli_query($this->link, $sql)){
                echo "Records inserted successfully.";        
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($this->link);
            }       
        }
        else
        {
            echo "Employee Already Exists";
        }
    }    
    
    //Searches for user, returns -1 if user doesn't exist, else returns userid
    function doesUserExist($firstName, $lastName)
    {
        if($this->link === false){
            echo "ERROR: Could not connect. " . mysqli_connect_error();
        }
        $sql = "SELECT userid FROM users WHERE firstName = '". $firstName ."' AND lastName = '". $lastName . "'";
        
        $result = mysqli_query($this->link, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            //return true;
            // output data of each row
            $row = mysqli_fetch_assoc($result);
            return $row["userid"];
            //while($row = mysqli_fetch_assoc($result)) {
            //    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            //}
        } else {
            //echo "0 results";
            return -1;
        }    
    }
    
    function getName($userId)
    {
        if($this->link === false){
            echo "ERROR: Could not connect. " . mysqli_connect_error();
        }
        $sql = "SELECT firstname, lastname, rankname, mind, body, exp "
                . "FROM users u LEFT JOIN employeerank er ON u.rank = er.rankid "
                . "WHERE userID = ". $userId ;
        
        
        $result = mysqli_query($this->link, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            //echo "0 results";
            return -1;
        }    
    }
    
    function addMind($value)
    {
        if($this->link === false){
            return "ERROR: Could not connect. " . mysqli_connect_error();
        }      
        $userId = $_SESSION['userid'];
        
        $sql = "SELECT mind "
                . "FROM users "
                . "WHERE userID = ". $userId ;
        
        
        $result = mysqli_query($this->link, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $previousMindValue = $row["mind"];
            
            $newMindValue = $previousMindValue + $value;
            $sqlUpdate = "UPDATE users "
                . " SET mind = " . $newMindValue
                . " WHERE userID = ". $userId ;
            
            if (mysqli_query($this->link, $sqlUpdate) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }           
            
        } else {
            //echo "0 results";
            return -1;
        }    
    }
    
} 