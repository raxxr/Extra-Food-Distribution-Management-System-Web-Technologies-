<?php

session_start();
require_once('../db/db.php');
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Owner Profile</title>
	<link rel="stylesheet" href="css/owner.css">
 
    
    
    
    
    
   
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
                    <li><a href="owneredit.php">Profile</a></li>
					<li><a href="restaurantsranking.php">Restaurants Ranking</a></li>
					<li><a href="ownerspost.php">Owners Post</a></li>
                    <li><a href="../logout.php">Logout</a></li>
					
					
					
					
                </ul>
            </div>
<div class="clr"></div>
	
     <!----footer1 part start---->
   <?php
   $email=$_SESSION['useremail'];
   $sql= "select * from user where email = '$email'";
   $result= get_result($sql);
   while($row= mysqli_fetch_assoc($result)){
    ?>
       <tr>
            <td>Name:</td>
            <td><?=$row['fullname']?></td>
        </tr>
        <br>

        <tr>
            <td>Phone no:</td>
            <td><?=$row['phoneno']?></td>
        </tr>
        <br>

        <tr>
            <td>Area:</td>
            <td><?=$row['area']?></td>
        </tr>
        <br>

                    <td>
                <form method="post" action=<?="'editProfile.php?id=".$email."'"?>>
                    
                    <input type="submit" name="editProfile" value="Edit Profile">
                </form>
            </td>



    <?php

   }

   ?> 
</body>
</html>