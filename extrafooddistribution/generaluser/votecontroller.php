<?php 
session_start();
require_once('../db/db.php');
//can't access the page without login
if (!(isset($_SESSION['useremail'])))
   {
    header("location:../login1.php");
   } 
//for vote
if(isset($_POST['vote'])){

	$id=$_REQUEST['id'];
	$email=$_SESSION['useremail'] ;
	$sql="select * from vote where email='$email' and eventid=$id";
	$result = get_result($sql);
	while($row = mysqli_fetch_assoc($result))
	{
		header("location: home.php?voted=true");
		exit;
	}
	//vote insert
	$sql="INSERT INTO vote (email,eventid)VALUES('$email',$id)";
    $status = exe_query($sql);
    $sql = "select count(voteid) as vote_count from vote where eventid='$id'";
    $result = get_result($sql);
    $row = mysqli_fetch_assoc($result);
    //vote update
    $sql = "update eventmanage set vote = ".$row['vote_count']." where id = $id";
    exe_query($sql);
	header("location: eventranking.php?id=".$id);

}
else{

	header("location: ../login.html");
}

 ?>