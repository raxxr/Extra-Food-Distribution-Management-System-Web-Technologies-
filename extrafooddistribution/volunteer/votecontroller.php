<?php 
session_start();
require_once('../db/db.php');
//can't access the page without login
 if (!(isset($_SESSION['useremail'])))
   {
    header("location:../login1.php");
   }
//vote
if(isset($_POST['vote'])){

	$id=$_REQUEST['id'];
	$email=$_SESSION['useremail'] ;
	$sql="select * from restaurantvote where email='$email' and restaurantid=$id";
	
	$result = get_result($sql);
	while($row = mysqli_fetch_assoc($result))
	{
		header("location: restaurantvote.php?voted=true");
		exit;
	}
	$sql="INSERT INTO restaurantvote (email,restaurantid) VALUES ('$email',$id)";
	//echo $sql;
    $status = exe_query($sql);
    $sql = "select count(voteid) as vote_count from restaurantvote where restaurantid='$id'";
    $result = get_result($sql);
    $row = mysqli_fetch_assoc($result);
    $sql = "update ownerpost set vote = ".$row['vote_count']." where id = $id";
    exe_query($sql);
	header("location: restaurantvote.php?id=".$id);

}
else{

	header("location: ../login1.php");
}

 ?>