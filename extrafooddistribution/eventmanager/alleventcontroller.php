<?php 
session_start();
require_once('../db/db.php');
if (!(isset($_SESSION['useremail']))){
    header("location:../login1.php");
} 

//submit edit
if(isset($_POST['edit']))
   {
	$id=$_REQUEST['id'];
	header("location: editevent.php?id=".$id);
   }
//submit delete                       }
elseif(isset($_POST['delete']))
    {
	$id=$_REQUEST['id'];
	$sql= "delete from eventmanage where id= $id";
	$status = exe_query($sql);
	header("location: allevents.php");
	// echo "delete";

    }
elseif(isset($_POST['complete']))
    {
	$id=$_REQUEST['id'];
	$sql= "update eventmanage set eventstatus='complete' where id= $id";
	//echo $sql;
	$status = exe_query($sql);
	header("location: eventstatus.php");
    }
else{

	header("location: ../login1.php");
    }

 ?>