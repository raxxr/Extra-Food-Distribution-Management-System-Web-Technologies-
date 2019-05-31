<?php
require 'config.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    

</head>
<body>
	<!----header part start---->
    <div class="full_wrapper">
        <div class="wrapper">
            <div class="logo">
                <img src="images/logo.png" width="70px" alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="signup.php">Sign Up </a></li>
                    <li><a href="login1.php">Login </a></li>
                </ul>
            </div>
    <div class="clr"></div>
     <!----footer part start---->

<div class="full_wrapper footer_bg">
        <div class="wrapper footer_main">
           <div class="work_head footer_head">
               <center><h2>Login</h2></center>
            
            </div>
            <img src="1.gif" style="display: none;" id="loadimage">
            <div class="form">
                <form method="post" onsubmit="return getUser()" action="login.php">
                    <input type="text"     placeholder="email"      name="email"  >
                    <i class="fa fa-eye" id="eye" onclick="togglepass()"></i>
                    <input type="password" id="pwd" placeholder="Password"  name="password">
                    
                    <br>
                    <button type="submit" name="login">Login</button>
                
                <p><font color="#fff">Not a member?</font></p> 
                <a href="signup.php"><font color="#fff">Sign Up!!</font></a>
                <br>
                <a href="forgetpassword.php"><font color="#fff">Forgot Pasword??</font></a>
                
                </form>
            </div>
        </div>
    </div>
    <script>
    // var pwd = document.getElementById('pwd');
    var eye= document.getElementById('eye');
    eye.addEventListener('onclick',togglepass);

    function togglepass(){
       var x = document.getElementById('pwd');
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
