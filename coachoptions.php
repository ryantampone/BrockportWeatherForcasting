<?php
	include 'header.php';
	echo"
		<link href='/brockportforecasting/css/cardStyles.css' type='text/css' rel='stylesheet' />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	";

	require('db_cn.inc');
	connect_and_select_db(DB_SERVER, DB_UN,DB_PWD,DB_NAME);
	$todaysDate = date("Y-m-d");

	$sql3 = "SELECT COUNT(*) FROM `forecasts` WHERE status = 'approved' AND dateofgame >= '$todaysDate';";
	$result3 = mysql_query($sql3);
	if (!$result3)
	{
		echo "Error getting number of approved forecasts";
		exit;
	}
	while($row = mysql_fetch_assoc($result3))
	{
		$numberOfReportsApproved = $row['COUNT(*)'];
		$numberOfReportsApproved = $row['COUNT(*)'];
	}
	mysql_free_result($result3);


	//Connect to the DB
	function connect_and_select_db($server, $username, $pwd, $dbname)
	{
		$conn = mysql_connect($server, $username, $pwd);

		if (!$conn)
		{
			echo "Unable to connect to DB:".mysql_error();
			exit;
		}

		$dbh = mysql_select_db($dbname);
		if(!$dbh)
		{
			echo "Unable to select".$dbname.":".mysql_error();
			exit;
		}
	}
?>


<?php
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'coach' || (string)$_SESSION['access'] == 'admin'))
	{
		echo "
		<center><h2>Please select a forecast from the dropdown below</h2></center>

		<div class='cardContainer' style='text-align: center'>

			<div class='cardBody'>
				<div class='cardHeader'>
					<div class='cardHeaderTitle'>
							Available Forecasts
					</div>
				</div>
				<div class='cardBodyContentContainer'>
					<div class='cardBodyContent'>
						<center><strong>Number of Reports Available for Viewing: $numberOfReportsApproved</strong></center><br>
						<form action='coach_select_forecast_process.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>Forecast:</span></td>
                        <td><select id='forecast' name='forecast'>";


													connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
													$sql = "SELECT * FROM `forecasts` WHERE status = 'approved' AND dateofgame >= '$todaysDate' ORDER BY 'id';";
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
                    <input type='submit' value='View Selected Forecast'/>
                </p>
            </form>
					</div>
				</div>
			</div>


		</div>
		";
	}
	else
	{
		//echo "<script type='text/javascript'>alert('Please login to view this page')</script>";
		session_destroy();
		echo "<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('Please Login as an Coach to View This Page')
			 window.location.href='index.php';
			 </SCRIPT>";
	}
?>

</body>
</html>
