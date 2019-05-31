<?php
	require_once("../db/db.php");
	
	$val = $_REQUEST['fullname'];
	$sql = "select * from user where fullname like '".$val."%'";
	$result = get_result($sql);
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<tr><td>".$row['fullname']."</td><td>".$row['email']."</td><td>".$row['phoneno']."</td><td>".$row['area']."</td></tr>";
	}

?>