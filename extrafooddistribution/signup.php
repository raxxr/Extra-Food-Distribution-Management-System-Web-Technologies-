<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/registration.css">
  <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css" >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	
</head>
<body>
    <!-----header part start----->
     <div class="full_wrapper">
        <div class="wrapper">
            <div class="logo">
                <img src="images/logo.png" width="100px" alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="signup.php">Sign Up </a></li>
                    <li><a href="login1.php">Login </a></li>
                </ul>
            </div>
<div class="clr"></div>
	
     <!----footer1 part start---->
    <div class="full_wrapper footer_bg">
        <div class="wrapper footer_main">
           <div class="work_head footer_head">
               <center><h2>Sign Up!</h2></center>
            
            </div>
            <div class="form" >
                <form name="form1" method="post" onsubmit="return getans()" action="regcheckdb.php">
                    <input type="text"  placeholder="Full name"     id="fullname" name="fullname"  value="">
                    <input type="text" placeholder="Email Address" id="email"  name="email"     value="<?php 
                      if(isset($_SESSION['email_exists']))
                        echo "This email already exist, please try with another email";
                    ?>" onkeydown="getName()">

                    <input type="text" placeholder="Phone Number Must be contains 11 digits"    id="phoneno"   name="phoneno"   value=""  onkeydown="getEmail()">
                    <input type="text" placeholder="Area"           id="area"     name="area"      value="" onkeydown="getPhone()" >

                     <i class="fa fa-eye" id="eye" onclick="togglepass()"></i>
                    <input type="password" placeholder="Password must contains 8 characters and must contain special characters"    id="pass"  name="password"  value="">
                    <input type="password" placeholder="Confirm Password" id="compass"  name="cpassword" value="" onkeydown="getPassword()">

                    <div class= "placeholder">
                    <font color="#fff">User Type:</font>
                    
                            <input type="radio" style="width: 0px" id="owner" onchange="getConfirmpassword()" name="usertype" value="owner"/>
                            <font color="#fff">Owner</font>
                            <input type="radio" style="width: 0px" id="volunteer" onchange="getConfirmpassword()" name="usertype" value="volunteer"/>
                            <font color="#fff">Volunteer</font>
                            <input type="radio" style="width: 0px" id="manager" onchange="getConfirmpassword()" name="usertype" value="manager"/>
                            <font color="#fff">Event Manager</font>
                            <input type="radio" style="width: 0px" id="generaluser" onchange="getConfirmpassword()" name="usertype" value="generaluser"/>
                            <font color="#fff">General User</font>
                    </div>
                    <br>
                    <input type="text" placeholder="Question" id="ques"  name="ques" value="" onkeydown="getUser()">
                    <br>
                    <input type="text" placeholder="Answer" id="ans"  name="ans" value="" onkeydown="getques()">
                    <br>
  
                    <button type="submit" id="submit" name="submit">Signup</button>
                </form>
                <p><font color="#fff">already a member?</font> </p> 
                <a href="login1.php"><font color="#fff"> sign in</font> </a>
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

  function getques(){
    var ques=document.getElementById('ques').value;
    if(ques.length==0)
    {
      alert('Enter the question');
    }
  }

  function getans(){
    var ans=document.getElementById('ans').value;
    if(ans.length==0)
    {
      alert('Enter the question');
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

function getUser(){

   var owner = document.getElementById('owner').checked;
   var volunteer= document.getElementById('volunteer').checked;
   var manager=document.getElementById('manager').checked;
   var generaluser = document.getElementById('generaluser').checked;

   if(!owner&&!volunteer&&!manager&&!generaluser){
    alert('Please select an option!');
    return false;


   }
   else
    return true;
}

// var pwd = document.getElementById('pwd');
    var eye= document.getElementById('eye');
    eye.addEventListener('onclick',togglepass);

    function togglepass(){
       var x = document.getElementById('pass');
       if(x.type==="password"){
        x.type="text";
        console.log(x.type);
       }else{
        x.type="password";
       }
    
    }
</script>


</body>
</html>