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
     <table border="1" align="center">
            <tr>
                <th width="30%"><font color="blue"><center>Restaurant Name</center></font></th>
                <th width="40%"><font color="blue"><center>Restaurant Post</center></font></th>
            </tr>

            <?php
                $sql="select * from ownerpost order by id desc";
                $result = get_result($sql);
                while($row= mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <td>
                        <center>
                        <?php
                            echo $row['restaurantname'];
                        ?>
                        </center>
                    </td>
                    <td>
                        <center>
                        <?php
                            echo $row['restaurantd'];
                        ?>
                        </center>
                    </td>
                    
                </tr>
            <?php
            }
            ?>
        </table>

</body>
</html>