<?php
	session_start();
	require_once('../db/db.php');
	if (!(isset($_SESSION['useremail']))){
    header("location:../login1.php");
} 
	//submit
	if(isset($_POST['submit']))
	{
   		$email=$_SESSION['useremail'];
   		$name = $_POST['fullname'];
   		$phoneno = $_POST['phoneno'];
   		$area = $_POST['area'];
   	//update
		$sql = "update user set fullname='$name',phoneno='$phoneno',area='$area' where email='$email'";
		exe_query($sql);
		header('location: adminedit.php');
	}else{
		header('location: ../index.html');
	}

?>