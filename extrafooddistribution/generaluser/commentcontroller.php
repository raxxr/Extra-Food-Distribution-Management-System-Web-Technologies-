<?php
	session_start();
	require_once('../db/db.php');
	//can't access the page without login
   if (!(isset($_SESSION['useremail'])))
   {
    header("location:../login1.php");
   } 
	//comment
	if(isset($_POST['comment']))
	{
		$id = $_REQUEST['id'];
		$email = $_SESSION['useremail'];
		$commentVal = $_POST['commentVal'];
		$sql = "insert into comment (eventid, comment, commentator) values ('$id', '$commentVal','$email')";
		$stat = exe_query($sql);
		header('location: eventdetails.php?id='.$id);
	}else{
		header("locatoin: ../index.html");
	}

?>