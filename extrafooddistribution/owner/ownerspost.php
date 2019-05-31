<?php
    session_start();
    require_once('../db/db.php');
    $idArr = array();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Owners PostS</title>
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
                <th width="30%">Restaurant Name</th>
                <th width="40%">Restaurant Post</th>
                <th width="40%">Action</th>
            </tr>

            <?php
            $sql="select * from ownerpost where user='".$_SESSION['useremail']."'";
            $result = get_result($sql);
            while($row= mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <td>
                        
                      <?php
                            array_push($idArr, $row['id']);
                            echo $row['restaurantname'];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row['restaurantd'];
                        ?>
                    </td>
                    <td>
                        <form  method="post" action="<?="ownerspostController.php?id=".$row['id']?>">
                            <input type = 'submit' name='vr' value='View Request'>
                            <input type = 'submit' name='edit' value='Edit'>
                            <input type = 'submit' name='delete' value='Delete'>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>

</body>
</html>