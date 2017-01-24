<?php
include 'header.php';

function show_result($userGroup, $regkey)
{
    echo "
		<center><h2>Please fill out the user information below</h2></center>
    	<div id='userdataform'>
            <form action='user_insert.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>First Name:</span></td>
                        <td><input name='firstname' id='firstname' TYPE='text' SIZE='50' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Last Name:</span></td>
                        <td><input name='lastname' id='lastname' TYPE='text' SIZE='50' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Brockport NetID:</span></td>
                        <td><input name='uid' id='uid' TYPE='text' SIZE='50' onKeyPress='return isTextNameKey(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Password:</span></td>
                        <td><input name='pwd' id='pwd' TYPE='password' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Retype Password:</span></td>
                        <td><input name='pwdcheck' id='pwdcheck' TYPE='password' SIZE='50' onblur='checkpwds()' required/></td>
                    </tr>
                </table>
                <input TYPE='hidden' name='access' id='access' value='$userGroup'>
                <input TYPE='hidden' name='registrationKey' id='registrationKey' value='$regkey'/>
                <p align='center'>
                    <input type='submit' value='Submit'/>
                    <input type='reset' value='Reset'/>
                </p>
            </form>
        </div>
		";
}
?>
