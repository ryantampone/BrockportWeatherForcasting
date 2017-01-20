<?php
require('db_cn.inc');
require('forgotpassword_enter_new_password.inc');

forgot_password();
function forgot_password()
{
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
	$netID = $_POST['netID'];
	$resetCode = $_POST['resetCode'];

	//check to make sure there is a user with the provided netID and password reset code
	$sql_stmt = "SELECT * FROM `user` WHERE uid='$netID' AND pwdResetCode='$resetCode';";

	$result = mysql_query($sql_stmt);
	$message = "";
	$numrows = mysql_num_rows($result);
	if (!$result)
	{
  	  $message = "An unknown error occured.  Please contact your professor for further assistance: ". mysql_error();
			echo "<SCRIPT LANGUAGE='JavaScript'>
				 window.alert('$message')
				 window.location.href='forgotpassword.php';
				 </SCRIPT>";
	}
	else if ($numrows == 0)
	{
	  $message = "Invalid NetID or Password Reset Code.  Check your information and try again.";
		echo "<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('$message')
			 window.location.href='forgotpassword.php';
			 </SCRIPT>";
	}
	else
	{
		showPWDForm($netID, $resetCode);
	}
}


function connect_and_select_db($server, $username, $pwd, $dbname)
{
	// Connect to db server
	$conn = mysql_connect($server, $username, $pwd);

	if (!$conn) {
	    echo "Unable to connect to DB: " . mysql_error();
    	    exit;
	}

	// Select the database
	$dbh = mysql_select_db($dbname);
	if (!$dbh){
    		echo "Unable to select ".$dbname.": " . mysql_error();
		exit;
	}
}

?>
