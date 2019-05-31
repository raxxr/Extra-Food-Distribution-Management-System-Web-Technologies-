<?php
	session_start();
	require_once('../db/db.php');
	if(isset($_POST['request']))
	{
		$postid = $_REQUEST['id'];
  	    $email=$_SESSION['useremail'] ;
  	    $sql1="select * from volunteerrequest where postid='$postid' and email='$email'";
  	    $result = get_result($sql1);
  	    while($row=mysqli_fetch_assoc($result)){
  	    	header('location:home.php?id='.$postid.'&re=yes');
  	    	exit;
  	    }
  	    $sql="insert into volunteerrequest(email,postid,status) values ('$email','$postid','APPLIED')";
  	    exe_query($sql);
		header('location: home.php?id='.$postid); 		
	}
	else{
		header('location: ../index.html');
	}

?>