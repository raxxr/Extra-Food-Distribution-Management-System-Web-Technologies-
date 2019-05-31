<?php
    session_start();
    require_once('../db/db.php');
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Post</title>
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
     <!----footer1 part start---->
    
    <div class="full_wrapper footer_bg">
        <div class="wrapper footer_main">
           <div class="work_head footer_head">
            
            </div>
            <div class="form">
                <?php
                $rname=$rdetails=null;                    
                    $id = $_REQUEST['id']; 
                    $sql =" select restaurantname,restaurantd from ownerpost where id=$id";
                    $result = get_result($sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                       // print_r($row);
                        $rname= $row['restaurantname'];
                        $rdetails= $row['restaurantd'];

                    }
                ?>
                <form action= <?="'editController.php?id=".$id."'"?> method="post">
                    <input type="text"     placeholder="Restaurants Name"      name="restaurantsname" value='<?=$rname?>' >
                    <br>
                    <div id='inputdiv'>
                        <input type="textarea" row="10"     placeholder="Details"      name="writepost" value='<?=$rdetails?>' >
                        <!-- <button id='faltubtn'>Add</button> -->
                        <button type="submit" name="save">Update</button>
                    </div>
                    <div class="table" id='tablediv' hidden>
                        
                    </div>
                    <br>
                    
                
                
                </form>
            </div>
        </div>
    </div>

</body>
</html>