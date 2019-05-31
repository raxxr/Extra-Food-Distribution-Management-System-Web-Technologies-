<?php
session_start();
require_once('../db/db.php'); 
if (!(isset($_SESSION['useremail']))){
    header("location:../login1.php");
} 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Event Manager Home</title>
	<link rel="stylesheet" href="css/eventmanager.css">
</head>
<body>
    <!-----header part start----->
      <div class="full_wrapper">
        <div class="wrapper">
            <div class="logo">
                <img src="../images/logo.png" width="70px" alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="allevents.php">All Events</a></li>
                    <li><a href="eventranking.php">Event Ranking</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="eventstatus.php">Event Status</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
      <div class="clr"></div>
    <!--- Header part end--->
	  <!----footer part start---->
    
     <div class="full_wrapper footer_bg">
        <div class="wrapper footer_main">
           <div class="work_head footer_head">
           </div>
                <div class="form">
                       <form action= 'controller.php' onsubmit="return getsubmit()" method="post">
                              <input type="text"  id="eventname"   placeholder="Event Name"      name="eventname" onkeyblur="geteventname()">
                    <br>
                            <div id='inputdiv'>
                              <input type="date"    placeholder="Date"  id='dateInput'    name="eventdate" >
                            <br>
                            <div id='wrongDate'>
                            </div>
                              <input type="text" row="10"  id="eventpost"   placeholder="Event Post" name="eventpost" onkeyblur="geteventpost">
                            <br>
                              <input type="text" row="10"    id="location" placeholder="Location" name="location">
                              <button type="submit" name="save">Add Event</button>
                            </div>
                            <br>
                </form>
            </div>
        </div>
    </div>
    <!--- footer part end--->
    <!-- validation part start--->
<script>

function getsubmit(){
        //check empty
          if(!geteventname() || !geteventpost() || !getlocation() || isEmpty(document.getElementById('dateInput').value))
          {
            return false;
          }
            return true;
        //check name          }
function geteventname(){
          var name = document.getElementById('eventname');
          if (isEmpty(name))
          {
            name.value = "Name can not be empty";
            return false;
          }
            return true;
        //check eventpost            }
function geteventpost(){
          var eventpost = document.getElementById('eventpost');
          if (isEmpty(eventpost))
          {
          eventpost.value = "Event Post can not be empty";
          return false;
          }
          return true;
        //check location               }
function getlocation(){
          var location = document.getElementById('location');
          if (isEmpty(location))
          {
          location.value = "Location can not be empty";
          return false;
          }
          return true;
        //empty function             }
function isEmpty(str){
          if(!str || 0 === str.length)
          return true;
          else 
          return false;
                     }
</script>
</body>
</html>