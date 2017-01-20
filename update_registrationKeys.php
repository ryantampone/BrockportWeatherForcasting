<?php

require('db_cn.inc');
require('update_emailAndTextNotifications_result_ui.inc');

update_registrationKeys();

function update_registrationKeys()
{
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	$studentKey = $_POST['studentKey'];
	$coachKey = $_POST['coachKey'];

	$sql_stmt1 = "UPDATE `registrationKeys` SET registrationKey='$studentKey' WHERE userGroup='student';";

	$result1 = mysql_query($sql_stmt1);
	echo $result1;
	$message1 = "";

	if (!$result1)
	{
  	  $message1 = "Error updating student registration key: ". mysql_error();
	}
	else
	{
	  $message1 = "Student registration key updated successfully";
	}


	$sql_stmt2 = "UPDATE `registrationKeys` SET registrationKey='$coachKey' WHERE userGroup='coach';";

	$result2 = mysql_query($sql_stmt2);
	echo $result2;
	$message2 = "";

	if (!$result2)
	{
  	  $message2 = "Error updating coach registration key: ". mysql_error();
	}
	else
	{
	  $message2 = "Coach registration key updated successfully";
	}

	$message = $message1.", ".$message2;
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
