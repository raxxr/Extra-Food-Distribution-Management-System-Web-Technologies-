<?php
require 'config.php';
session_start();
$em=$_POST['email'];
$pw=$_POST['password'];


        if (isset($_POST['login']))
        {
        	$_SESSION['useremail']=$em;
			$sql1= "  select * from userlogin where email='$em' and password='$pw'";
			$result1=mysqli_query($conn , $sql1);
			while($row=mysqli_fetch_assoc($result1)){
				if($row['status'] != 'APPROVED')
				{
					echo "<a href='index.html'>Go home -_-!!</a>";
					exit;
				}
				if($row['usertype']=='owner'){
					
					header("location:owner/home.php");
					exit;
				}
				elseif($row['usertype']=='volunteer'){
					
					header("location:volunteer/home.php");
					exit;
				}
				elseif($row['usertype']=='generaluser'){
					
					header("location:generaluser/home.php");
					exit;
				}
				elseif($row['usertype']=='manager'){
					
					header("location:eventmanager/home.php");
					exit;
				}
				elseif($row['usertype']=='admin'){
					
					header("location:admin/home.php");
					exit;
				}elseif($row['usertype']=='owner')
				{
					echo 'owner';
					header("location:owner/home.php");
					exit;
				}
				echo 'page not found'.$row['usertype'];
			}
		}		
         else
        {
            echo "User Name or Password is empty !!!!";
        }
    

          

 ?>