<?php

session_start();
require_once('../db/db.php');
if (!(isset($_SESSION['useremail']))){
    header("location:../login1.php");
} 
if(isset($_POST['save'])){
    $id =     $_REQUEST['id'];
    $ename=   $_POST['eventname'];
    $edate=   $_POST['eventdate'];
    $epost=   $_POST['eventpost'];
    $location=$_POST['location'];

    if (empty($ename) || empty($edate)|| empty($epost)|| empty($location))
    {
    	header("location: home.php");
    }
    else {
    	$sql= "update eventmanage set eventname='$ename', eventdate='$edate',eventpost='$epost', location='$location' where id=$id";
    	$status = exe_query($sql);
    	header("location: allevents.php");
    }
}
else{
	header("location: ../login1.php");
}



?>