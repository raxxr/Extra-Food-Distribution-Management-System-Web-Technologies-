<?php
    session_start();
    require_once('../db/db.php');
?>     
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/admin.css">
 
    
    
    
    
    
   
</head>
<body>


         <div class="full_wrapper footer_bg">
        <div class="wrapper footer_main">
           <div class="work_head footer_head">
               <center><h2>Edit Profile!</h2></center>
            
            </div>
            <?php
                $email = $_REQUEST['id'];
                $sql = "select * from user where email='$email'";
                $result = get_result($sql);
                $row = mysqli_fetch_assoc($result);
                $name = $row['fullname'];
                $phone = $row['phoneno'];
                $area = $row['area'];
            ?>
            <div class="form">
                <form name="form1" method="post" action="editProfileController.php">
                    <input type="text"  placeholder="Full name"     id="fullname" onblur="getName()" name="fullname"  value="<?=$name?>">
                    
                    <input type="text" placeholder="Phone Number"                 name="phoneno"    value="<?=$phone?>"  onblur="getPhone()">
                    <input type="text" placeholder="Area"           id="area"     name="area"  value="<?=$area?>">
                    
                    <br>
                    <button type="submit" id="submit" name="submit">Update</button>
                </form>
                
            </div>
        </div>
    </div>
</body>
