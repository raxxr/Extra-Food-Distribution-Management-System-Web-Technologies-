<?php
session_start();
require_once('db/db.php');
if(isset($_POST['submit'])){
	$ans = $_POST['ans'];
	$found = false;
	$user = $_SESSION['fp_email'];
	$sql = "select ans from login where email = '$user' and ans ='$ans'";
	$res = get_result($sql);
	while($row = mysqli_fetch_assoc($res))
	{
		$found = true;
		$pass = getName(8);
		//update assword with a dummy value 
		//show it to user
	}
	if(!$found){
		echo "Answer ";
	}
}

function getName($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUV'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 

?>