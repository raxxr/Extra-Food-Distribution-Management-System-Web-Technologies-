<?php
  
  session_start();
  require_once('../db/db.php');
  

  if(isset($_POST['submit'])){
  	$email =  $_POST['email'];
  	$_SESSION['email'] = $email;
  	$username= $_POST['fullname'];
  	$password= $_POST['password'];
    $phoneno= $_POST['phoneno'];
  	$area= $_POST['area'];
    if(email_db_chk($email))
    {
      $sql="INSERT INTO user ( fullname, email, phoneno, area, usertype)VALUES( '$username','$email','$phoneno','$area','admin')";
      $status = exe_query($sql);
     // echo $status; 
      $sql="INSERT INTO userlogin ( email, password, usertype, status)VALUES( '$email','$password','admin','APPROVED')";
      $status = exe_query($sql);
     // echo $status;
      unset($_SESSION['email_exists']);
      header('location: home.php');
    }else{
      $_SESSION['email_exists'] = true;
      header('location: adminsignup.php');
      exit;
    }


    //echo $usertype;
  	
  } else{
  	header("location: ../login1.php");
  }


  // call this method to check if email already in the database
function email_db_chk($email)
{
    $sql = "select email from userlogin where email = '$email'";
    while($row = mysqli_fetch_assoc(get_result($sql)))
    {
        return false;
    }
    return true;
} 
?>







