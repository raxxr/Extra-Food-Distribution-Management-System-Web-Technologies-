<?php
  
  session_start();
  require_once('db/db.php');
  

  if(isset($_POST['submit'])){
  	$email =  $_POST['email'];
  	$_SESSION['email'] = $email;
  	$username= $_POST['fullname'];
  	$password= $_POST['password'];
    $phoneno= $_POST['phoneno'];
  	$area= $_POST['area'];
  	$usertype= $_POST['usertype'];
    $ques= $_POST['ques'];
    $ans= $_POST['ans'];
    if(email_db_chk($email))
    {
      $sql="INSERT INTO user ( fullname, email, phoneno, area, usertype)VALUES( '$username','$email','$phoneno','$area','$usertype')";
      $status = exe_query($sql);
      //echo $status;  
      $sql="INSERT INTO userlogin ( email, password, usertype, status,ques,ans)VALUES( '$email','$password','$usertype','APPLIED','$ques','$ans')";
      $status = exe_query($sql);
      //echo $status;
      unset($_SESSION['email_exists']);
      header('location: login1.php');
      exit;
    }else{
      $_SESSION['email_exists'] = true;
      header('location: signup.php');
      exit;
    }


    //echo $usertype;
  	
  } else{
  	header("location: login1.php");
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







