<?php
 session_start();
 require_once('../db/db.php');
 if(isset($_POST['accept'])){
 		$id = $_REQUEST['id'];
 		$email = $_REQUEST['email'];
 		$sql = "update volunteerrequest set status = 'ACCEPTED' where email ='$email' and postid=$id";
 		$stat = exe_query($sql);
 		header("location: ownerspost.php");
 } elseif (isset($_POST['reject'])) {
 	$id = $_REQUEST['id'];
 		$email = $_REQUEST['email'];
 		$sql = "update volunteerrequest set status = 'REJECTED' where email ='$email' and postid=$id";
 		$stat = exe_query($sql);
 		header("location: ownerspost.php");
 }else {
 	header("location: ../index.html");
 }

?>

