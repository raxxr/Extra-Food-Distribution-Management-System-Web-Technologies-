<?php
    session_start();
    require_once('../db/db.php');
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Owner Home</title>
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
    
    <div class="full_wrapper footer_bg">
        <div class="wrapper footer_main">
           <div class="work_head footer_head">
            
            </div>
            <div class="form">
                <form action= 'homeController.php' method="post">
                    <input type="text"     placeholder="Restaurants Name"   id='namIn'   name="restaurantsname" onblur="chkname()" value="<?php 
                        if(isset($_SESSION['rn']))
                            echo $_SESSION['rn'];
                    ?>">
                    <?php 
                        if(isset($_SESSION['rn_empty']))
                            echo "Name can not be empty<br>";
                    ?>
                    <br>
                    <div id='inputdiv'>
                        <input type="textarea" row="10"     placeholder="Details"  id="detIn"    name="writepost" onblur="chkdet()" >
                        <?php 
                            if(isset($_SESSION['det_empty']))
                                echo "details can not be empty<br>";
                        ?>
                        <!-- <button id='faltubtn'>Add</button> -->
                        <button type="submit" name="save">Add Post</button>
                    </div>
                    <div class="table" id='tablediv' hidden>
                        
                    </div>
                    <br>
                    
                
                
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function chkname(){
        //console.log("dilam");
        var name = document.getElementById('namIn').value;
        if(name.length == 0)
            alert("Name can not be empty");
    }

    function chkdet(){
        var name = document.getElementById('detIn').value;
        if(name.length == 0)
            alert("Details can not be empty");
    }
     
</script>

</body>
</html>