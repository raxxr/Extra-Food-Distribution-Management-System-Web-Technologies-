<?php
	session_start();
	require_once('../db/db.php');
	if(isset($_POST['edit']))
	{
		$id = $_REQUEST['id'];
		header('location: editpost.php?id='.$id); 		
	}elseif(isset($_POST['delete'])){
		$id = $_REQUEST['id'];
		$sql = "delete from ownerpost where id=$id";
		exe_query($sql);
		header('location: ownerspost.php');
	}elseif(isset($_POST['vr'])){
		$id = $_REQUEST['id'];
		header('location: volunteers.php?id='.$id);
	}
	else{
		header('location: ../index.html');
	}

?>