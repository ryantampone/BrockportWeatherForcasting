<?php

require('db_cn.inc');
require('user_result_ui.inc');

modify_user();

function modify_user()
{
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$uid = $_POST['uid'];
	$password = $_POST['pwd'];
	$pwd = password_hash($password, PASSWORD_DEFAULT); //creates an encrypted password
	$access = $_POST['access'];
	$registrationKey = $_POST['registrationKey'];
	$status = 'Active';

	$sql_stmt = "UPDATE `user` SET first='$firstname', last='$lastname', uid='$uid', pwd='$pwd', access='$access', registrationKey='$registrationKey', status='$status' WHERE id='$id';";

	$result = mysql_query($sql_stmt);
	echo $result;
	$message = "";

	if (!$result)
	{
  	  $message = "Error updating $access User: $lastname, $firstname: ". mysql_error();
	}
	else
	{
	  $message = "Data for $access User: $lastname, $firstname updated successfully.";

	}

	show_result($message);

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
