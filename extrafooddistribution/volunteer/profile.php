<?php
session_start();
require_once('../db/db.php'); 
//can't access the page without login
 if (!(isset($_SESSION['useremail'])))
   {
    header("location:../login1.php");
   }  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<link rel="stylesheet" href="css/Volunteer.css">
 <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th {
        border: 1px solid #05d1ff;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #a3eeff;
      }
      .button {
        background-color: #0260f7;
        border: none;
        color: white;
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>
</head>
<body>
    <!-----header part start----->
     <div class="full_wrapper">
        <div class="wrapper">
            <div class="logo">
                <img src="../images/logo.png" width="70px"  alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="notification.php">Notification</a></li>
                    <li><a href="ranking.php">Ranking</a></li>
                    <li><a href="acceptedpost.php">Accepted Post</a></li>
                    <li><a href="restaurantvote.php">Vote</a></li>
					          <li><a href="profile.php">Profile</a></li>
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
       <table>
       <tr>
            <td><font color="blue">Name:</font></td>
            <td><?=$row['fullname']?></td>
        </tr>
        <br>

        <tr>
            <td><font color="blue">Phone no:</font></td>
            <td><?=$row['phoneno']?></td>
        </tr>
        <br>

        <tr>
            <td><font color="blue">Area:</font></td>
            <td><?=$row['area']?></td>
        </tr>
        <br>

                    <td colspan="2">
                <form method="post" action=<?="'editProfile.php?id=".$email."'"?>>
                    
                    <center><input type="submit" class="button" name="editProfile"  value="Edit Profile"></center>
                </form>
            </td>



    <?php

   }

   ?> 
</table>
    

</body>
</html>