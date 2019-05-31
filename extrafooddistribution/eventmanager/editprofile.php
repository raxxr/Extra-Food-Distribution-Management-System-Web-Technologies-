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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/admin.css">
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
               <center><h2>Edit Profile</h2></center>
            
            </div>
            <?php
                $email = $_REQUEST['id'];
                $sql = "select * from user where email='$email'";
                $result = get_result($sql);
                $row = mysqli_fetch_assoc($result);
                $name = $row['fullname'];
                $phone = $row['phoneno'];
                $area = $row['area'];
            ?>
            <div class="form">
                <table border="1" align="center">
                <form name="form1" method="post" action="editProfileController.php">
                    <tr>
                        <td>
                             <center><input type="text"  placeholder="Full name"     id="fullname" onblur="getName()" name="fullname"  value="<?=$name?>"></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center><input type="text" placeholder="Phone Number"                 name="phoneno"    value="<?=$phone?>"  onblur="getPhone()"></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center><input type="text" placeholder="Area"           id="area"     name="area"  value="<?=$area?>"></center>
                        </td>
                    </tr
                    <tr>
                        <td>
                            <center>
                            <button type="submit" class="button" id="submit" name="submit">Update</button>
                        </center>
                        </td>
                    </tr>
                </table>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
