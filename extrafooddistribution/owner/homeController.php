<?php

session_start();
require_once('../db/db.php');
if(isset($_POST['save'])){
    reset_flags();
    $RN= $_POST['restaurantsname'];
    $Details= $_POST['writepost'];
    if (empty($RN))
    {
        $_SESSION['rn_empty'] = true;
    	header("location: home.php");
        exit;
    }elseif(empty($Details)){
        $_SESSION['rn'] = $RN;
        $_SESSION['det_empty'] = true;
        header("location: home.php");
        exit;
    }
    else {
    	$sql= "insert into ownerpost (user,restaurantname,restaurantd) values('".$_SESSION['useremail']."','$RN','$Details')";
    	$status = exe_query($sql);
    	//echo $status;
        reset_flags();
    	header("location: ownerspost.php");
    }
}
else{
	header("location: ../login1.php");
}

function reset_flags()
{
    unset($_SESSION['rn_empty']);
    unset($_SESSION['det_empty']);
    unset($_SESSION['rn']);
}

?>