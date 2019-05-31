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

<div class="full_wrapper footer_bg">
        <div class="wrapper footer_main">
           <div class="work_head footer_head"> 
            </div>
            
            <div class="form">
                <?php
                    $ename=$edate=$epost=$location=null;                    
                    $id = $_REQUEST['id']; 
                  //select data
                    $sql =" select eventname,eventdate,eventpost,location from eventmanage where id=$id";
                    $result = get_result($sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                       // print_r($row);
                        $ename= $row['eventname'];
                        $edate= $row['eventdate'];
                        $epost= $row['eventpost'];
                        $location= $row['location'];

                    }
                ?>
                <table border="1">
                        <form action= <?="'editController.php?id=".$id."'"?> method="post">
                    <tr>
                        <td>
                        <!--print event name-->
                             <center><input type="text"     placeholder="Event Name"      name="eventname" value='<?=$ename?>'></center>
                        </td>
                    </tr>
                    <div id='inputdiv'>
                        <tr>
                            <td>
                        <!--print event date-->
                                <center><input type="date"    placeholder="Date"  name="eventdate" value='<?=$edate?>'></center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                        <!--print event post-->
                                <center><input type="text" row="10" placeholder="Event Post" name="eventpost" value='<?=$epost?>'></center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                        <!--print event loaction-->
                                 <center><input type="text" row="10"    placeholder="Location" name="location" value='<?=$location?>'>
                                 </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                        <!--update button-->
                               <center><button type="submit" class="button" name="save">Update</button></center>
                            </td>
                        </tr>
                    </div>
                    <br>
                </table>
                       </form>
            </div>
        </div>
    </div>
</body>
</html>
