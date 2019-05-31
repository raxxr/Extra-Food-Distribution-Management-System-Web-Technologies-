
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
	<title>Adminslist</title>
	<link rel="stylesheet" href="css/admin.css">
 
    
    
    
    
    
   
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
    
            <form method="#" action="adminsearchcontroller.php">
        <input type="text" id="fullname" name="fullname" onkeyup="createTable()">
    </form>
    <div id="tablediv1">
        
    </div>
    <table border="1" align="center">
            <tr>
                <th width="30%"><font color="blue">Fullname</font></th>
                <th width="30%"><font color="blue">Email</font></th>
                <th width="30%"><font color="blue">Phoneno</font></th>
                <th width="30%"><font color="blue">Area</font></th>
            </tr>

            <?php
            $sql="select * from user where usertype='admin' order by id desc";
            $result = get_result($sql);
            while($row= mysqli_fetch_assoc($result)){
            ?>
                <tr>
    
                    <td>
                        <?php
                            echo $row['fullname'];
                        ?>
                    </td>

                     <td>
                        <?php
                            echo $row['email'];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row['phoneno'];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row['area'];
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
            var val = document.getElementById('fullname').value;
            console.log(val);
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "voluunteersearchcontroller.php?fullname="+val, true);
            xhttp.send();
            
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var table ="<table><tr><th>Fullname</th><th>Email</th><th>Phoneno</th><th>Area</th></tr>";
                    var table2 = table + this.responseText + "</table>";
                    document.getElementById("tablediv1").innerHTML = table2;
                    console.log(table2);
                }
            };
        }
    </script>



</body>
</html>