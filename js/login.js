/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function login()
{  
    lastName = document.getElementById('lastName').value;
    firstName = '';
    isBob = document.getElementById('bob').checked;
    isBarb = document.getElementById('barb').checked;
    
    if(isBob)
    {
        firstName = 'Bob';
    }
    else if(isBarb)
    {
        firstName = 'Barb';
    }
    else
    {
        alert("Enter a First Name");
    }
    
    if(firstName !== '')
    {      
       if(lastName !== '')
       {
            var params = "login=1&lastName=" + lastName + "&firstName=" + firstName;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState === XMLHttpRequest.DONE && xhttp.status === 200) { 
                    console.log(this.responseText);
                    
                    if(this.responseText === "Employee exists")
                    {
                        window.location.href = "main.php";
                    }
                    else
                    {
                        alert(this.responseText);
                    }                    
                }
            };
            xhttp.open("POST", "database/login_db.php", true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send(params);           
       }
       else{
          alert("Enter a Last Name"); 
       }
       
    }
    
}