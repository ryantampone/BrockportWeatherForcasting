<?php
require('db_cn.inc');
require('generic_result.inc');

search_user();
function search_user()
{
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
	$regKey = $_POST['registrationKey'];


	$sql_stmt = "SELECT * FROM user WHERE (status='Active' and registrationKey='$regKey');";

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
		 $message = "Unable to find active users with the selected Registration Key";

	removeUsers($result);
}


function removeUsers($result)
{
		$count = 0;
		while ($row = mysql_fetch_assoc($result))
		{
		   $count = $count + 1;

		   $id = $row['id'];
		   $firstname = $row['first'];
		   $lastname = $row['last'];
		   $uid = $row['uid'];
		   $pwd = $row['pwd'];
		   $registrationKey = $row['registrationKey'];
		   $access = $row['access'];
		   $status = 'Inactive';

		   $sql_stmt2 = "UPDATE `user` SET first='$firstname', last='$lastname', uid='$uid', pwd='$pwd', access='$access', registrationKey='$registrationKey', status='$status' WHERE id='$id';";

		   $result2 = mysql_query($sql_stmt2);

		   if (!$result2)
		   {
		       $message2 = "Error removing User ($uid): ". mysql_error();
		   }
		   else
		   {
				 	$countRemoved = $countRemoved +1;
		      //$message2 = "User: ($access) $firstname, $lastname removed successfully.";
		   }

		   $fullmessage = $message2.' : '.$countRemoved.'users removed successfully';
		}
		  	show_result($fullmessage);
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
