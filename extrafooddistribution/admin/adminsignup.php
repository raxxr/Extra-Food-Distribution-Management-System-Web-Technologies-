<?php
session_start();
require_once("../db/db.php");
//session logout
if (!(isset($_SESSION['useremail'])))
   {
    header("location:../login.html");
   }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Adminsignup</title>
	<link rel="stylesheet" href="css/registration.css">  
</head>
<body>
    <!-----header part start----->
     <div class="full_wrapper">
        <div class="wrapper">
            <div class="logo">
                <img src="../images/logo.png" width="70px" alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="signup.php">Add admin</a></li>
                    <li><a href="adminedit.php">Profile</a></li>
                    <li><a href="volunteerslist.php">Volunteers</a></li>
					<li><a href="restaurantspost.php">Restaurants Post</a></li>
					<li><a href="ownerslist.php">Owners</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
<div class="clr"></div>
	
     <!----footer1 part start---->
    
    <div class="full_wrapper footer_bg">
        <div class="wrapper footer_main">
           <div class="work_head footer_head">
               <center><h2>Sign Up!</h2></center>
            
            </div>
            <div class="form">
                <form name="form1" method="post" action="adminreg.php">
                    <input type="text"  placeholder="Full name"     id="fullname" onblur="getName()" name="fullname"  value="">
                    <input type="email" placeholder="Email Address" id="email"    name="email"        value="<?php 
                                    if(isset($_SESSION['email_exists']))
                                 echo "This email already exist, please try with another email";?>" 
                    onblur="getEmail()">
                    <input type="text" placeholder="Phone Number" name="phoneno" value=""  onblur="getPhone()">
                    <input type="text" placeholder="Area" id="area" name="area" >
                    <input type="password" placeholder="Password"  name="password"  value="" onblur="getPassword()">
                    <input type="password" placeholder="Confirm Password" name="cpassword" value="" onblur="getConfirmpassword()">
                    <br>
                    <button type="submit" id="submit" name="submit">Signup</button>
                </form>
                
            </div>
        </div>
    </div>


<script>
  function getName()
  {
      
      var name = document.getElementById('fullname').value;
      var hasBigLetter   = false;
      var hasSmallLetter = false;
      var namelength=name.length;
  


      for (var i = 0; i < namelength; i++) {
        var charCode = name.charCodeAt(i);
        if(charCode > 64 && charCode < 91)
          hasBigLetter = true;
        if(charCode > 96 && charCode < 123)
          hasSmallLetter = true;
        

      }

      if(!hasBigLetter && !hasSmallLetter)
      {
          alert("incorrect name pattern ");
      }  
    
    
  }  

  function getEmail()
{
    var email = document.getElementById('email').value;
    var emailarr = email.split('@');
    if(emailarr.length == 2)
    {
        var emailexarr = emailarr[1].split('.');
        if(emailexarr.length != 2)
        {
            alert('Email is not valid');
        }
    }
    else
    {
        alert("Email is not valid");
    }
}
function getPhone()
{
    var phone = document.getElementById('phoneno').value;
    var length= phone.length;
    if(length!=11){
      alert("Phoneno is not valid!");
      return 0;

    }
    for( var i = 0; i<length; i++)
    {
        if(!(phone[i]>= 0 && phone[i]<= 11))
        {
            alert("Phone no is not valid");
        }
    }
}

function getPassword()
{
  var password = document.getElementById('pass').value;
    var length= password.length;
    if(length< 8){
      alert("Password must be 8 characters!");
    }else{
      var charFlag = false;
      for(var i=0; i<length; i++)
      {
        if((password[i]>='a' && password[i]<='z') || (password[i]>='A' && password[i]<='Z'))
        {
          charFlag = true;
          break;
        }
      }
      if(!charFlag)
      {
        alert('Password must contains at least one char!!');
        return -1;
      }
      var specChar = false;
      for(var i=0; i<length; i++)
      {
        if(password[i]>='!' && password[i]<='/')
        {
          specChar = true;
          break;
        }
      }
      if(!specChar)
      {
        alert('Password must contains at least one special char!!');
        return -1; 
      }
    }
}

function getConfirmpassword(){
  var password = document.getElementById('pass').value;
  var cpassword= document.getElementById('compass').value;
  if( cpassword!=password){
    alert("password doesnot match");
  }
}

</script>

</body>
</html>