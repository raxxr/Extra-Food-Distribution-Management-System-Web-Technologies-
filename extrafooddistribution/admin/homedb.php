<?php
session_start();
require_once("../db/db.php");
if(isset($_POST["accept"]))
{
	$email = $_GET['email'];
	$sql="update userlogin set status='APPROVED' where email='$email'";
	$status = exe_query($sql);
	//echo $status; 
	header("location: home.php");
}
elseif(isset($_POST["reject"])) {
	$email = $_GET['email'];
	$sql="update userlogin set status='REJECT' where email='$email'";
	$status = exe_query($sql);
	//echo $status;  
	header("location: home.php");
}

?>