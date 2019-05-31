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
	<title>Accepted Post</title>
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
  <!-- header part end-->
	
  <!----footer part start---->
     <table border="1" align="center">
            <tr>
                <th width="30%"><font color="blue"><center>Accepted Request</center></font></th>
                <th width="30%"><font color="blue"><center>PostID</center></font></th>
            </tr>

            <?php
            $sql="select * from volunteerrequest where status='ACCEPTED' order by reqid desc";
            $result = get_result($sql);
            while($row= mysqli_fetch_assoc($result)){
            ?>
                <tr>
    
                    <td>
                      <center>
                        <?php
                            echo $row['status'];
                        ?>
                      </center>
                    </td>

                     <td>
                      <center>
                        <?php
                            echo $row['postid'];
                        ?>
                      </center>
                    </td>
              <?php
                   }     
                ?>  

           </tr>
            
        </table>

</body>
</html>