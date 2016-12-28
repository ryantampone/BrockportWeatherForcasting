<?php

require('db_cn.inc');
require('result_ui.inc');

search_user();
function search_user()
{
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	$uid = $_POST['uid'];
	$page = $_POST['page'];

	$sql_stmt = "SELECT * FROM user WHERE uid='$uid';";

	//Execute the query. The result will just be true or false
	$result = mysql_query($sql_stmt);

	if (!$result)
	{
		 echo "The retrieval was unsuccessful: ".mysql_error();
		 exit;
	}

	//$result is non-empty. So count the rows
	$numrows = mysql_num_rows($result);

	//Create an appropriate message
	$message = "";
	if ($numrows == 0)
		 $message = "Unable to find a user with the provided UserID";

	//Display the results
	show_result($message, $result, $page);

	//Free the result set
	mysql_free_result($result);
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
