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
	$pwd = $_POST['pwd'];
	$access = $_POST['access'];

	$insertStmt = "INSERT INTO user (first, last,
		       uid, pwd, access) values ( '$firstname', '$lastname',
                      '$uid', '$pwd', '$access')";


	$result = mysql_query($insertStmt);
	echo $result;
	$message = "";

	if (!$result)
	{
  	  $message = "Error in inserting User: $lastname , $firstname: ". mysql_error();
	}
	else
	{
	  $message = "Data for User: $lastname , $firstname inserted successfully.";

	}

	show_result($message, $lastname, $firstname);

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
