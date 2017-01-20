<?php

require('db_cn.inc');
require('update_emailAndTextNotifications_result_ui.inc');

update_emailAndTextNotifications();

function update_emailAndTextNotifications()
{
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	$email1 = $_POST['email1'];
	$phone1 = $_POST['phone1'];
	$email2 = $_POST['email2'];
	$phone2 = $_POST['phone2'];

	$sql_stmt1 = "UPDATE `emailAndTextNotifications` SET email='$email1', phone='$phone1' WHERE id='1';";

	$result1 = mysql_query($sql_stmt1);
	echo $result1;
	$message1 = "";

	if (!$result1)
	{
  	  $message1 = "An error occurred when updating the Faculty member contact information: ". mysql_error();
	}
	else
	{
	  $message1 = "Faculty contact info updated successfully.";
	}


	$sql_stmt2 = "UPDATE `emailAndTextNotifications` SET email='$email2', phone='$phone2' WHERE id='2';";

	$result2 = mysql_query($sql_stmt2);
	echo $result2;
	$message2 = "";

	if (!$result2)
	{
			$message2 = "An error occurred when updating the Head Forecaster contact information: ". mysql_error();
	}
	else
	{
		$message2 = "Head Forecaster updated successfully.";
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
