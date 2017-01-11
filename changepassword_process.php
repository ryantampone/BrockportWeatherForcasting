<?php

require('db_cn.inc');
require('generic_result.inc');

update_password();
function update_password()
{
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
	$uid = $_POST['uid'];
	$password = $_POST['pwd'];
	$pwd = password_hash($password, PASSWORD_DEFAULT); //creates an encrypted password

	$sql_stmt = "UPDATE `user` SET pwd='$pwd' WHERE uid='$uid';";

	$result = mysql_query($sql_stmt);
	echo $result;
	$message = "";

	if (!$result)
	{
  	  $message = "Error updating your ($uid) password: ". mysql_error();
	}
	else
	{
	  $message = "Your ($uid) password was updated successfully.";

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
