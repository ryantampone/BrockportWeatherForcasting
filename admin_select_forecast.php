<?php
	include 'header.php';
	require('db_cn.inc');

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


	echo"
		<link href='/brockportforecasting/css/cardStyles.css' type='text/css' rel='stylesheet' />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	";
?>

<?php
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'admin'))
	{
		echo "
		<center><h2>Please select the forecast you would like to approve</h2></center>
    	<div id='userdataform'>
            <form action='admin_select_forecast_process.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>Forecast:</span></td>
                        <td><select id='forecast' name='forecast'>";


													connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
													$sql = "SELECT * FROM `forecasts` WHERE status = 'awaitingApproval' ORDER BY 'id';";
													$result = mysql_query($sql);
													if (!$result)
													{
														$message = "Error! Unable to get forecasts from the Database: ".mysql_error();
														echo "<SCRIPT LANGUAGE='JavaScript'>
															 window.alert('$message')
															 window.location.href='index.php';
															 </SCRIPT>";
														exit;
													}
													while ($row = mysql_fetch_assoc($result))
													{
														$id = $row['id'];
														$sport = $row['sport'];
														$forecast = $row['forecast'];
														$forecasterfn = $row['forecasterfn'];
														$forecasterfn = $row['forecasterfn'];
														$name = $forecasterfn.', '.$forecasterln;
														$option = $id.': '.$sport.', '.$forecast;

														echo "<option value='$id'>".$option."</option>";
													}

												echo "
												</td>
                    </tr>
                </table>
								<input TYPE='hidden' name='page' id='page' SIZE='50' value='userModifySearch'/>
                <p align='center'>
                    <input type='submit' value='Submit'/>
                </p>
            </form>
        </div>
		";
	}
	else
	{
		session_destroy();
		echo "<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('Please Login as an Admin to View This Page')
			 window.location.href='index.php';
			 </SCRIPT>";
	}
?>

</body>
</html>
