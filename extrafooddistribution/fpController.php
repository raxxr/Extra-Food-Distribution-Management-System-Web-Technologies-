<?php
	session_start();
	require_once('db/db.php');
	$email = $_GET['email'];
	$_SESSION['fp_email'] = $email;
	$sql = "select * from userlogin where email='$email'";
	$result = get_result($sql);
	while($row = mysqli_fetch_assoc($result))
	{
		echo $row['ques'];
		exit;
	}
	echo 'user_not_found';
?>