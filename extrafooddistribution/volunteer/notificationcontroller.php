<?php 
session_start();
require_once('../db/db.php');
//can't access the page without login
 if (!(isset($_SESSION['useremail'])))
   {
    header("location:../login.html");
   }
//vote
if(isset($_POST['clear'])){
	$postid = $_REQUEST['id'];
	$sql="update ownerpost set notification=1 where id=$postid";
  	    exe_query($sql);
		header('location: notification.php?id='.$id); 
}
else{

	header("location: ../login1.php");
}

 ?>