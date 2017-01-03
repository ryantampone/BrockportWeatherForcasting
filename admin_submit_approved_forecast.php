<?php
	session_start();
?>
<?php
require('db_cn.inc');
require('forecast_submit_result_ui.inc');

submit_forecast();

function submit_forecast()
{
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
	$forecastid = $_POST['forecastid'];
	$sport = $_POST['sport'];
	$gamedate = $_POST['date'];
	$gametime = $_POST['gametime'];
	$location = $_POST['location'];
	$forecast = $_POST['forecast'];
	$temperaturehigh = $_POST['temperaturehigh'];
	$temperaturelow = $_POST['temperaturelow'];
	$windspeed = $_POST['windspeed'].' MPH';
	$winddirection = $_POST['winddirection'];
	$chanceofrain = $_POST['chanceofrain'];
	$discussion = $_POST['discussion'];
	$forecasterfn = $_POST['forecasterfn'];
	$forecasterln = $_POST['forecasterln'];
	$datesubmitted = date('Y-m-d');
	$status = 'approved';

	$insertStmt = "UPDATE `forecasts` SET dateofgame='$gamedate', timeofgame='$gametime', sport='$sport', location='$location',
	forecast='$forecast', temphigh='$temperaturehigh', templow='$temperaturelow', windspeed='$windspeed', winddirection='$winddirection',
	chanceofrain='$chanceofrain', discussion='$discussion', forecasterfn='$forecasterfn', forecasterln='$forecasterln', datesubmitted='$datesubmitted', status='$status' WHERE id='$forecastid'";


	$result = mysql_query($insertStmt);
	echo $result;
	$message = "";

	if (!$result)
	{
  	  $message = "Error Approving Forecast ($forecast): ". mysql_error();
			$statusFlag = "error";
	}
	else
	{
	  $message = "Forecast ($forecastid, $forecast) has been approved).";
		$statusFlag = "success";
	}


	$sql1 = "SELECT * FROM `emailAndTextNotifications` WHERE id='1';";
	$result1 = mysql_query($sql1);
	if (!$result1)
	{
		$fmemail = 'Error A';
		$fmphone = 'Error A';
		//echo "Error getting Factulty member contact info";
		exit;
	}
	while($row = mysql_fetch_assoc($result1))
	{
		$fmemail = $row['email'];
		$fmphone = $row['phone'];
	}
	mysql_free_result($result1);

	//--------------------------------------------------------------------------

	$sql2 = "SELECT * FROM `emailAndTextNotifications` WHERE id='2';";
	$result2 = mysql_query($sql2);
	if (!$result2)
	{
		$hfemail = 'Error retrieving head forecaster email address for notification';
		$hfphone = 'Error retrieving head forecaster phone number for notification';
		//echo "Error getting Head Forecaster contact info"; //be sure to change
		exit;
	}
	while($row = mysql_fetch_assoc($result2))
	{
		$hfemail = $row['email'];
		$hfphone = $row['phone'];
	}
	mysql_free_result($result1);

	if ($fmphone != "")
	{
		$facultyPhone = str_replace("-", "", $fmphone).'@vtext.com';
	}
	else
	{
		$facultyPhone = "";
	}

	if ($hfphone != "")
	{
		$headForecasterPhone = str_replace("-", "", $hfphone).'@vtext.com';
	}
	else
	{
		$headForecasterPhone = "";
	}

	$adminfirstName = (string)$_SESSION['first'];
	$adminlastName = (string)$_SESSION['last'];

	$emailSubject = "Weather Forecast Approved";
	$emailText = "Admin ('$adminlastName', '$adminfirstName') has Approved Forecast: $forecastid, $forecast";
	$phoneSubject = "Weather Forecast Approved";
	$phoneText = "Admin ('$adminlastName', '$adminfirstName') has Approved Forecast: $forecastid, $forecast";


	show_result($message, $fmemail, $facultyPhone, $hfemail, $headForecasterPhone, $forecasterfn, $forecasterln, $statusFlag, $emailSubject, $emailText, $phoneSubject, $phoneText);

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
