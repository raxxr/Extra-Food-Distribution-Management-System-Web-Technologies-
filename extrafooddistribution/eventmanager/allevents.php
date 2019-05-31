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
    <title>All Events</title>
    <link rel="stylesheet" href="css/eventmanager.css">
 
  <style>
     table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
           }

    td, th {
            border: 1px solid #05d1ff;
            text-align: left;
            padding: 8px;
           }

    tr:nth-child(even) {
            background-color: #a3eeff;
           }
    .button {
            background-color: #0260f7;
            border: none;
            color: white;
            padding: 10px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            }
  </style>
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
    <!--- header part end--->
    <!----footer part start---->
      <table border="1" align="center">
            <tr>
                <th width="30%"><font color="blue"><center>Event Name</center></font></th>
                <th width="40%"><font color="blue"><center>Event Date</center></font></th>
                <th width="40%"><font color="blue"><center>Post
                </center></font></th>
                <th width="40%"><font color="blue"><center>Action</center></font></th>
            </tr>
              <!-- select from eventmanage database in desc order-->
                <?php
                     $sql="select * from eventmanage order by id desc";
                     $result = get_result($sql);
                     while($row= mysqli_fetch_assoc($result)){
                ?>
            <tr>
                <td>
              <!-- print eventname-->
                    <center> 
                      <?php
                        echo $row['eventname'];
                      ?>
                </td>
                <td>
              <!-- print eventdate-->
                    <center>
                      <?php
                        echo $row['eventdate'];
                      ?>
                    </center>
                </td>
                <td>
              <!-- print eventpost-->
                    <center>
                      <?php
                        echo $row['eventpost'];
                      ?>
                    </center>
                </td>
                <td>
                    <center>
                <!-- form action-->
                            <form  method="post" action=<?="'alleventcontroller.php?id=".$row['id']."'"?>>
                              <input type = 'submit' class="button" name='edit' value='edit'>
                              <input type = 'submit' class="button" name='delete' value='delete' >
                            </form>
                    </center>
                </td>
            </tr>
               <?php
                   }
                ?>
      </table>
    <!--- Footer part end--->
</body>
</html>