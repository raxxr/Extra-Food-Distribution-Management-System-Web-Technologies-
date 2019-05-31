<?php
	session_start();
	require_once('../db/db.php');
//can't access the page without login
 if (!(isset($_SESSION['useremail'])))
   {
    header("location:../login1.php");
   } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Event Details</title>
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
	<table border="1" align="center">
	    <?php
		    $id = $_REQUEST['id'];
		    $sql = "select * from eventmanage where id = $id";
		    $result = get_result($sql);
		    while($row = mysqli_fetch_assoc($result))
		   {
	    ?>
		<tr>
			<td><center>Event Id:</center></td>
			<td><center><?=$row['id']?></center></td>
		</tr>
		<tr>
			<td><center>Event name:</center></td>
			<td><center><?=$row['eventname']?></center></td>
		</tr>
		<tr>
			<td><center>Event creator email:</center></td>
			<td><center><?=$row['email']?></center></td>
		</tr>
		<tr>
			<td><center>Event date:</center></td>
			<td><center><?=$row['eventdate']?></center></td>
		</tr>
		<tr>
			<td><center>Event details:</center></td>
			<td><center><?=$row['eventpost']?></center></td>
		</tr>
		<tr>
			<td><center>Event location:</center></td>
			<td><center><?=$row['location']?></center></td>
		</tr>
		<tr>
			<td><center>Event status:</center></td>
			<td><center><?=$row['eventstatus']?></center></td>
		</tr>
		<tr>
			<td><center>Event vote:</center></td>
			<td><center><?=$row['vote']?></center></td>
		</tr>
		<?php
			$sql2 = "select * from comment where eventid = $id";
			$result2 = get_result($sql2);
			while($row2 = mysqli_fetch_assoc($result2))
			{
		?>
			<tr>
				<td><center><?=$row2['commentator']?></center></td>
				<td><center><?=$row2['comment']?></center></td>
			</tr>
		<?php
			}
		?>
		<tr>
			<td><center>Post a comment:<center> </td>
			<td>
	
				<form method="post" action=<?="'commentcontroller.php?id=".$id."'"?>>
					<center><input type="text" name="commentVal"></center>
					<center><input type="submit" class="button" name="comment" value="Comment"></center>
				</form>
				
			</td>
		</tr>
	<?php
		}
	?>
	</table>
</body>
</html>
