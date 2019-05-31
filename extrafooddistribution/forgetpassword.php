<?php
    session_start();
    require_once('db/db.php');
    
?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
<fieldset>
    <legend><b><font color="#517fff" >Forgot Password</font></b></legend>
    <form action="updatepass.php" method="post" onsubmit="return ansValid()">
        <table align="center">
        	<br>
        	<br>
            <tr style="display: block;" id="email_tr">
                <td><font color="#517fff">Enter your Email</font></td>
				<td>:</td>
                <td><input type="text" name="email" onblur="getEmail()" id="email"></td>
            </tr>
            <tr style="display: block;" id="email_button">
                <td><input type="button" name="email_btn" value='Submit' onclick="showQ()"></td>
            </tr>
            <tr id="qi" style="display: none;">
                <td id='ques'></td>
            </tr>
             <tr id="ai" style="display: none;">
                <td id='ans'>
                    <form action="forgetcontroller.php">
                        <input type="text" name="ans">
                        <input type="submit" name="submit" value="SUBMIT">
                    </form>
                </td>
            </tr>
    
            
           
        </table>
        <br>
        <center><input style="display: none;" type="submit" class="button" name="submit" value="submit" onclick="getQues()"></center>
        <center><input style="display: none;" type="submit" class="button" name="ansb" value="submit ans" onclick="ansValid()"></center>
    </form>
</fieldset>
<script type="text/javascript">

    function showQ(){
        var val = document.getElementById('email').value;
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "fpController.php?email="+val, true);
        xhttp.send();

        xhttp.onreadystatechange = function() {
            console.log(this.status);

            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ques").innerHTML = this.responseText;
                document.getElementById("email_tr").style.display = 'none';
                document.getElementById("email_button").style.display = 'none';
                document.getElementById("qi").style.display = 'block';
                document.getElementById("ai").style.display = 'block';
                console.log(this.responseText);
            }
        };

    }

    

    function getEmail()
    {
        var email = document.getElementById('email').value;
        var emailarr = email.split('@');
        if(emailarr.length == 2)
        {
            var emailexarr = emailarr[1].split('.');
            if(emailexarr.length != 2)
            {
                alert('Email is not valid');
            }
        }
        else
        {
            alert("Email is not valid");
        }
    }

    function getQues(){
        var email = document.getElementById('email').value;
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "fpController.php?email="+email, true);
        xhttp.send();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // if(this.responseText == 'user_not_found')
                // {
                //     alert('user not found. May I suggest to create an account you moron.');
                //     retrun false;
                // }
                // document.getElementById('ques').innerHTML = this.responseText;
                //  document.getElementById('ques').style = "display: block;";
                //  document.getElementById('ans').style = "display: block;";
                //  document.getElementById('submit').style = "display: none;";
                //  document.getElementById('ansb').style = "display: block;";
                console.log(this.responseText);
            }
        };
    }

    

    function ansValid()
    {
        return true;
    }

</script>
</body>
</html>