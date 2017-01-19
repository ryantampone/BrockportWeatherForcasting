<?php
	include 'header.php';
	//include 'login/identify.php';
	echo"
		<link href='/brockportforecasting/css/cardStyles.css' type='text/css' rel='stylesheet' />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	";
?>

<?php
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'admin'))
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
                        <td><span align='right'>Username:</span></td>
                        <td><input name='uid' id='uid' TYPE='text' SIZE='50' onKeyPress='return isTextNameKey(event)' onpaste='return false' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Password:</span></td>
                        <td><input name='pwd' id='pwd' TYPE='password' SIZE='50' required/></td>
                    </tr>
										<tr>
                        <td><span align='right'>Access Group:</span></td>
                        <td><select name='access' id='access' required>
                                <option value='student'>Student</option>
                                <option value='coach'>Coach</option>
                                <option value='admin'>Admin</option>
                            </select>
                    </tr>
                </table>
								<input TYPE='hidden' name='registrationKey' id='registrationKey' value='addedByAdmin'/>
                <p align='center'>
                    <input type='submit' value='Submit'/>
                    <input type='reset' value='Reset'/>
                </p>
            </form>
        </div>
		";
	}
	else
	{
		session_destroy();
		echo "<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('Please Login as an Admin to View This Page')
			 window.location.href='index.php';
			 </SCRIPT>";
	}
?>

</body>
</html>
