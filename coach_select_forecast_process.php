<?php
	include 'header.php';
	require('db_cn.inc');
	require('coach_view_forecast.inc');

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

	$forecastid = $_POST['forecast'];

	$sql_stmt = "SELECT * FROM `forecasts` WHERE id='$forecastid';";

	$result = mysql_query($sql_stmt);
	$numrows = mysql_num_rows($result);
	$message = "";
	if (!$result)
	{
  	  $message = "Error retrieving forecast details for forecast: $forecastid: ". mysql_error();
			$statusFlag = "Error";
	}
	if ($numrows == 0)
	{
		$message = "Error retrieving forecast details for forecast: $forecastid";
		$statusFlag = "Error";
	}
	else
	{
			$message = "Forecast ($forecastid) retrieved successfully";
			$statusFlag = "Success";
	}
	show_result($message, $result, $forecastid, $statusFlag);
}

?>
