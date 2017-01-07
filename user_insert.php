<?php

require('db_cn.inc');
require('user_result_ui.inc');

insert_user();

function insert_user()
{
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);


	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$uid = $_POST['uid'];
	$password = $_POST['pwd'];
	$pwd = password_hash($password, PASSWORD_DEFAULT); //creates an encrypted password
	$access = $_POST['access'];
	$registrationKey = $_POST['registrationKey'];
	$status = 'Active';

	$insertStmt = "INSERT INTO user (first, last, uid, pwd, access, registrationKey, status) values ( '$firstname', '$lastname', '$uid', '$pwd', '$access', '$registrationKey', '$status')";


	$result = mysql_query($insertStmt);
	echo $result;
	$message = "";

	if (!$result)
	{
  	  $message = "Error in inserting User: $lastname , $firstname: ". mysql_error();
	}
	else
	{
	  $message = "User ($lastname , $firstname) registered successfully.";

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
