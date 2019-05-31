<?php
session_start();
require_once('../db/db.php');
    
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Restaurants Ranking</title>
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
     <table border="1" align="center">
            <tr>
                <th width="30%"><font color="blue">Accepted Request</font></th>
                <th width="30%"><font color="blue">PostID</font></th>
            </tr>

            <?php
            $sql="select * from ownerpost order by vote desc";
            $result = get_result($sql);
            while($row= mysqli_fetch_assoc($result)){
            ?>
                <tr>
    
                    <td>
                        <?php
                            echo $row['restaurantname'];
                        ?>
                    </td>

                     <td>
                        <?php
                            echo $row['vote'];
                        ?>
                    </td>
              <?php
                   }     
                ?>  

           </tr>
            
        </table>
    



</body>
</html>