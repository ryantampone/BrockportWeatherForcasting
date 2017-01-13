<?php
	include 'header.php';
	require('db_cn.inc');
	require('forecast_student_select_process_result.inc');

	//database function
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


//function that gets all of the forecast data based on the selected forecast
getForecast();
function getForecast()
{
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	$studentNetID = $_POST['student'];

	$sql_stmt = "SELECT * FROM `forecasts` WHERE netID='$studentNetID';";

	$result = mysql_query($sql_stmt);
	$message = "";

	if (!$result)
	{
  	  $message = "Error retrieving forecast from user $studentNetID: ". mysql_error();
			$statusFlag = "Error";
	}
	show_result($message, $result);
}

?>
