<?php
    session_start();
    require_once('../db/db.php');


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Volunteers</title>
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
                    <li><a href="volunteers.php">Volunteers</a></li>
					<li><a href="restaurantsranking.php">Restaurants Ranking</a></li>
					<li><a href="ownerspost.php">Owners Post</a></li>
                    <li><a href="../logout.php">Logout</a></li>
					
					
					
					
                </ul>
            </div>
<div class="clr"></div>
	
     <!----footer1 part start---->
    
<table border="1" align="center">
            <tr>
                <th width="30%">Name</th>
                <th width="40%">Email</th>
                <th width="50%">Action</th>
            </tr>

        



            <?php
            $id = $_REQUEST['id'];
            $sql="select * from volunteerrequest where status= 'APPLIED' and postid=$id";
            $result = get_result($sql);
            while($row= mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <td>
                      <?php
                      $sql2 = "select fullname from user where email='".$row['email']."'";
                      $nameRes = get_result($sql2);
                      $name = mysqli_fetch_assoc($nameRes);
                      echo $name['fullname'];
                      ?>
                    </td>
                    <td>
                        <?php
                            echo $row['email'];
                        ?>
                    </td>

                    <td>
                        <form  method="post" action="volunteersController.php?email=<?=$row['email']?>&id=<?=$id?>">
                            <input type = 'submit' name='accept' value='Accept'>
                            <input type = 'submit' name='reject' value='Reject'>
                        </form>
                    </td>

                </tr>
            <?php
            }

            ?>
        </table>



</body>
</html>