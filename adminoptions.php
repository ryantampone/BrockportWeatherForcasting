<?php
	include 'header.php';
	echo"
		<link href='/brockportforecasting/css/cardStyles.css' type='text/css' rel='stylesheet' />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	";


		require('db_cn.inc');
		connect_and_select_db(DB_SERVER, DB_UN,DB_PWD,DB_NAME);
		//function to prepopulate the email and text Notifications card
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
			$hfemail = 'Error B';
			$hfphone = 'Error B';
			//echo "Error getting Head Forecaster contact info"; //be sure to change
			exit;
		}
		while($row = mysql_fetch_assoc($result2))
		{
			$hfemail = $row['email'];
			$hfphone = $row['phone'];
		}
		mysql_free_result($result2);

		//--------------------------------------------------------------------------

		$sql3 = "SELECT COUNT(*) FROM `forecasts` WHERE STATUS = 'awaitingApproval';";
		$result3 = mysql_query($sql3);
		if (!$result3)
		{
			echo "Error getting forecasts awaiting approval count";
			exit;
		}
		while($row = mysql_fetch_assoc($result3))
		{
			$numberOfReportsAwaitingApproval = $row['COUNT(*)'];
		}
		mysql_free_result($result3);


		//--------------------------------------------------------------------------

		$sql4 = "SELECT registrationKey FROM `registrationKeys` WHERE userGroup = 'student';";
		$result4 = mysql_query($sql4);
		if (!$result4)
		{
			echo "Error retrieving student registration key";
			exit;
		}
		while($row = mysql_fetch_assoc($result4))
		{
			$studentKey = $row['registrationKey'];
		}
		mysql_free_result($result4);

		//--------------------------------------------------------------------------

		$sql5 = "SELECT registrationKey FROM `registrationKeys` WHERE userGroup = 'coach';";
		$result5 = mysql_query($sql5);
		if (!$result5)
		{
			echo "Error retrieving coach registration key";
			exit;
		}
		while($row = mysql_fetch_assoc($result5))
		{
			$coachKey = $row['registrationKey'];
		}
		mysql_free_result($result5);


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
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'admin'))
	{
		echo "
		<div class='cardContainer' style='text-align: center'>


			<div class='cardBody'>
	      <div class='cardHeader'>
	        <div class='cardHeaderTitle'>
	            Users
	        </div>
	      </div>
	      <div class='cardBodyContentContainer'>
	        <div class='cardBodyContent'>
					<center>
					<form action='update_registrationKeys.php' method='post'>
					<table cellpadding='5px'>
						<tr>
								<th>
										Student Key
								</th>
								<th>
										Coach Key
								</th>
						</tr>
						<tr>
								<td>
										<input name='studentKey' id='studentKey' TYPE='text' value='$studentKey' onKeyPress='return isKey(event)' onpaste='return false' maxlength='20' required/>
								</td>
								<td>
										<input name='coachKey' id='coachKey' TYPE='text' value='$coachKey' onKeyPress='return isKey(event)' onpaste='return false' maxlength='20' required/>
								</td>
						</tr>
					</table>
					<center>
									<input type='submit' value='Update Registration Keys' style='margin-bottom: 5px'/>
					</center>
					</form>

					<hr style='width:50%'>

					<table>
	          <tr>
								<td>
										<form action='/brockportforecasting/user_add_ui_form.php'><button >Add User</button></form>
								</td>
								<td>
										<form action='/brockportforecasting/user_modifyselect_ui_form.php'><button >Modify User</button></form>
								</td>
								<td>
										<form action='/brockportforecasting/user_removeselect_ui_form.php'><button >Remove User</button></form>
								</td>
						<tr>
					</table>
					</center>
					<br>
	        </div>
	      </div>
	    </div>



			<div class='cardBody'>
				<div class='cardHeader'>
					<div class='cardHeaderTitle'>
							Notifications
					</div>
				</div>
				<div class='cardBodyContentContainer'>
					<div class='cardBodyContent'>
						<center>
						<form action='update_emailAndTextNotifications.php' method='post'>
						<table cellpadding='5px'>
							<tr>
									<th>
											Contact
									</th>
									<th>
											Email
									</th>
									<th>
											Phone
									</th>
							</tr>
							<tr>
									<td>
											<span align='right'>Faculty:</span>
									</td>
									<td>
											<input name='email1' id='email1' TYPE='text' onKeyPress='return isEmail(event)' value='$fmemail' required/>
									</td>
									<td>
											<input name='phone1' id='phone1' TYPE='text' SIZE='14' onblur='isPhoneNumber1()' value='$fmphone'/>
									</td>
							</tr>
							<tr>
									<td>
											<span align='right'>Forecaster:</span>
									</td>
									<td>
											<input name='email2' id='email2' TYPE='text'  onKeyPress='return isEmail(event)' value='$hfemail' required/>
									</td>
									<td>
											<input name='phone2' id='phone2' TYPE='text' SIZE='14' onblur='isPhoneNumber2()' value='$hfphone'/>
									</td>
							</tr>
						</table>
						<input type='submit' value='Update'/>
						</form>
						</center>
					</div>
				</div>
			</div>



			<div class='cardBody'>
				<div class='cardHeader'>
					<div class='cardHeaderTitle'>
							Reports
					</div>
				</div>
				<div class='cardBodyContentContainer'>
					<div class='cardBodyContent'>
					<center>
					<table cellpadding='5px'>
						<tr>
								<th>
										Number of Forecasts Awaiting Approval: $numberOfReportsAwaitingApproval
								</th>
						</tr>";
						if ($numberOfReportsAwaitingApproval != 0)
						{
							echo "
								<form action='admin_select_forecast_process.php' method='post'>
		                    <tr>
		                        <td align='center'><span>Forecast: </span>
		                        <select id='forecast' name='forecast'>";


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
		                    <input type='submit' value='Review and Approve Selected Forecast' style='margin-bottom: 5px'/>
		            </form>

								<hr style='width:50%'>

								<form action='/brockportforecasting/forecast_student_select.php'><button >Past Reports</button></form>
								</center>
								";
						}
						else
						{
							echo "<br><center>No reports to review :)</center><br>";
						}

						echo "
					</div>
				</div>
			</div>


			<div class='cardBody'>
				<div class='cardHeader'>
					<div class='cardHeaderTitle'>
							Dashboards
					</div>
				</div>
				<div class='cardBodyContentContainer'>
					<div class='cardBodyContent'>
						<form action='/brockportforecasting/studentoptions.php'><button >Student Dashboard</button></form><br>
						<form action='/brockportforecasting/coachoptions.php'><button >Coach Dashboard</button></form><br>
					</div>
				</div>
			</div>



		</div>
		";
	}
	else
	{
		//echo '<script type='text/javascript'>alert('Please login to view this page')</script>';
		session_destroy();
		echo "<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('Please Login as an Admin to View This Page')
			 window.location.href='index.php';
			 </SCRIPT>";
	}
echo "
</body>
</html>
"
?>
