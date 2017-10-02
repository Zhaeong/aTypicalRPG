/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function register()
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
        alert("Pick a First Name");
    }
    
    if(firstName !== '')
    {      
       if(lastName !== '')
       {
            var params = "register=1&lastName=" + lastName + "&firstName=" + firstName;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState === XMLHttpRequest.DONE && xhttp.status === 200) {            

                    console.log(this.responseText);
                    alert(this.responseText);
                }
            };
            xhttp.open("POST", "database/registration_db.php", true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send(params);           
       }  
       else{
          alert("Enter a Last Name"); 
       }
    }  
}