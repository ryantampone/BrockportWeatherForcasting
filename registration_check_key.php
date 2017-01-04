<?php

require('db_cn.inc');
require('registration_Signup_Form.inc');

search_user();
function search_user()
{
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	$regkey = $_POST['regkey'];
	$page = $_POST['page'];

	$sql_stmt = "SELECT * FROM `registrationKeys` WHERE registrationKey='$regkey';";

	//Execute the query. The result will just be true or false
	$result = mysql_query($sql_stmt);

	if (!$result)
	{
		 echo "Unable to verify the registration key you entered: ".mysql_error();
		 exit;
	}

	//$result is non-empty. So count the rows
	$numrows = mysql_num_rows($result);

	//Create an appropriate message
	$message = "";
	if ($numrows == 0)
	{
		 echo "<SCRIPT LANGUAGE='JavaScript'>
		 window.alert('Invalid Registration Key.')
		 window.location.href='registration_enter_key.php';
		 </SCRIPT>";
	}
	else if ($numrows == 1)
	{
		while ($row = mysql_fetch_assoc($result))
		{
			 $userGroup = $row['userGroup'];
		}

		//Display the results
		show_result($userGroup);

		//Free the result set
		mysql_free_result($result);
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
