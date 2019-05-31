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
    <title>Event Ranking</title>
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
                <img src="../images/logo.png" width="70px"  alt="logo">
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
    <!-- header part end->

    <!----footer part start---->
    <table border="1" align="center">
            <tr>
                <th width="30%"><font color="blue"><center>Event Name</center></font></th>
                <th width="30%"><font color="blue"><center>Vote</center></font></th>
            </tr>
            
            <?php
            $sql="select * from eventmanage order by vote desc";
            $result = get_result($sql);
            while($row= mysqli_fetch_assoc($result)){
            ?>
            <tr>
    
                <td>
                    <center>
                    <!-- print eventname-->
                        <?php
                            echo $row['eventname'];
                        ?>
                    </center>
                </td>

                <td>
                    <center>
                    <!-- print vote-->
                        <?php
                            echo $row['vote'];
                        ?>
                    </center>
                </td>
              <?php
                   }     
                ?>  

            </tr>
            
    </table>
  <!-- footer part end-->
    

</body>
</html>