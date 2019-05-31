<?php

session_start();
require_once('../db/db.php');
if (!(isset($_SESSION['useremail']))){
    header("location:../login1.php");
} 
if(isset($_POST['save'])){
    $RN= $_POST['eventname'];
    $date=$_POST['eventdate'];
    $Details= $_POST['eventpost'];
    $location=$_POST['location'];
    if (empty($RN) || empty($date) || empty($Details) || empty($location))
    {
    	header("location: home.php");
    }
    else {
    	$sql= "insert into eventmanage (eventname,email,eventdate,eventpost,location,eventstatus) values('$RN','".$_SESSION['useremail']."','$date','$Details','$location','ongoing')";
    	$status = exe_query($sql);
    	//echo $status;
        //echo $sql;
    	header("location: allevents.php");
    }
}
else{
	header("location: ../login1.php");
}



?>