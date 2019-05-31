<?php
	require_once("../db/db.php");
	
	$val = $_REQUEST['restaurantname'];
	$sql = "select * from ownerpost where restaurantname like '".$val."%'";
	$result = get_result($sql);
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<tr><td>".$row['restaurantname']."</td><td>".$row['vote']."</td></tr>";
	}

?>