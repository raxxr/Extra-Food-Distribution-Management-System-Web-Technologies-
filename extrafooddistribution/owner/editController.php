<?php

session_start();
require_once('../db/db.php');
if(isset($_POST['save'])){
    $id = $_REQUEST['id'];
    $RN= $_POST['restaurantsname'];
    $Details= $_POST['writepost'];
    if (empty($RN) || empty($Details))
    {
    	header("location: home.php");
    }
    else {
    	$sql= "update ownerpost set restaurantname='$RN', restaurantd='$Details' where id=$id";
    	$status = exe_query($sql);
    	// echo $status;
     //    echo $id;
     //    echo $sql;
    	header("location: ownerspost.php");
    }
}
else{
	header("location: ../login1.php");
}



?>