<?php
	session_start();
	require_once('../db/db.php');
	//can't access the page without login
 if (!(isset($_SESSION['useremail'])))
   {
    header("location:../login1.php");
   } 
	if(isset($_POST['submit']))
	{
   		$email=$_SESSION['useremail'];
   		$name = $_POST['fullname'];
   		$phoneno = $_POST['phoneno'];
   		$area = $_POST['area'];
		$sql = "update user set fullname='$name',phoneno='$phoneno',area='$area' where email='$email'";
		exe_query($sql);
		header('location: profile.php');
	}else{
		header('location: ../index.html');
	}

?>