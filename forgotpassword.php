<?php
include 'header.php';



echo "
<center><h2>Enter your Brockport NetID to reset your account password</h2></center>
  <div id='userpasswordform'>
        <form action='forgotpassword_process.php' method='post'>
            <table align='center'>
                <tr>
                    <td><span align='right'>NetID:</span></td>
                    <td><input name='netID' id='netID' TYPE='text' SIZE='50' required/></td>
                </tr>
            </table>
            <p align='center'>
                <input type='submit' value='Submit'/>
                <input type='reset' value='Reset'/>
            </p>
        </form>
    </div>
";
//finishes the html body
echo "</BODY>";
echo "</HTML>";

?>
