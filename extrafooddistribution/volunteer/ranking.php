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
	<title>Restaurant Ranking</title>
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
                <img src="../images/logo.png" width="70px" alt="logo">
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
  <form method="#" action="ownersearchcontroller.php">
        <input type="text" id="restaurantname" name="restaurantname" onkeyup="createTable()">
    </form>
    <div id="tablediv1">
        
    </div>
    <table border="1" align="center">
            <tr>
                <th width="30%"><font color="blue">Restaurantname</font></th>
                <th width="30%"><font color="blue">Vote</font></th>
            </tr>

            <?php
            $sql="select * from ownerpost order by id desc";
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
    <script>
        function createTable()
        {
            var val = document.getElementById('restaurantname').value;
            console.log(val);
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "rankingsearchcontroller.php?restaurantname="+val, true);
            xhttp.send();
            
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var table ="<table><tr><th>Restaurantname</th><th>Vote</th></tr>";
                    var table2 = table + this.responseText + "</table>";
                    document.getElementById("tablediv1").innerHTML = table2;
                    console.log(table2);
                }
            };
        }
    </script>


</body>
</html>