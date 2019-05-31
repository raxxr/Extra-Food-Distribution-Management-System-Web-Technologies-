<?php
session_start();
require_once('db/db.php');
    if(isset($_POST['ansb']))
    {
        $ans= $_POST['ans'];
        $mail = $_SESSION['fp_email'];
        $sql = "select * from userlogin where email = '$mail' and ans='$ans'";
        $res = get_result($sql);
        while($row = mysqli_fetch_assoc($res))
        {
            echo "<form action='#' method='post'>
                new Password: <input type='text' name='npass'>
                <input type='submit' name='npassbtn' value='Submit'>
            </form>";
        }

    }
?>

