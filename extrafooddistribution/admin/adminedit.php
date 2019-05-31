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
	<title>Restaurantspost</title>
	<link rel="stylesheet" href="css/admin.css">
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
                <img src="../images/logo.png" width="70px" alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="adminsignup.php">Add admin</a></li>
                    <li><a href="adminedit.php">Profile</a></li>
                    <li><a href="volunteerslist.php">Volunteers</a></li>
                    <li><a href="restaurantspost.php">Restaurants Post</a></li>
                    <li><a href="ownerslist.php">Owners</a></li>
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
          <table border="1" align="center">
              <tr>
                 <td width="30%">Name:</td>
                 <td width="30%"><?=$row['fullname']?></td>
              </tr>

              <tr>
                 <td width="30%">Phone no:</td>
                 <td width="30%"><?=$row['phoneno']?></td>
              </tr>

              <tr>
                 <td width="30%">Area:</td>
                 <td width="30%"><?=$row['area']?></td>
              </tr>
              <tr>
                  <td width="30%" colspan="2">
                        <form method="post" action=<?="'editProfile.php?id=".$email."'"?>
                    
                        <center><input type="submit" class="button" name="editProfile" value="Edit Profile"></center>
                        </form>
                   </td>
              </tr>
        </table>

        <?php

         }

        ?> 
</body>
</html>