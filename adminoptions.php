<?php
	include 'header.php';
	//include 'login/identify.php';
	echo"
		<link href='/brockportforecasting/css/cardStyles.css' type='text/css' rel='stylesheet' />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	";
?>

<?php
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
			echo "Error getting count";
			exit;
		}
		while($row = mysql_fetch_assoc($result3))
		{
			$numberOfReportsAwaitingApproval = $row['COUNT(*)'];
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
	          <form action='/brockportforecasting/user_add_ui_form.php'><button >Register User</button></form><br>
						<form action='/brockportforecasting/user_modifyselect_ui_form.php'><button >Modify User</button></form><br>
						<form action='/brockportforecasting/user_removeselect_ui_form.php'><button >Remove User</button></form>
	        </div>
	      </div>
	    </div>



			<div class='cardBody'>
				<div class='cardHeader'>
					<div class='cardHeaderTitle'>
							Email and Text Notifications
					</div>
				</div>
				<div class='cardBodyContentContainer'>
					<div class='cardBodyContent'>
						<center>
						<form action='update_emailAndTextNotifications.php' method='post'>
						<table cellpadding='5px'>
							<tr>
									<th>
											Contact Person
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
											Faculty Member:
									</td>
									<td>
											<input name='email1' id='email1' TYPE='text' value='$fmemail' required/>
									</td>
									<td>
											<input name='phone1' id='phone1' TYPE='text' onblur='isPhoneNumber1()' value='$fmphone'/>
									</td>
							</tr>
							<tr>
									<td>
											Head Forecaster:
									</td>
									<td>
											<input name='email2' id='email2' TYPE='text' value='$hfemail' required/>
									</td>
									<td>
											<input name='phone2' id='phone2' TYPE='text' onblur='isPhoneNumber2()' value='$hfphone'/>
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
							Submitted Forecasts
					</div>
				</div>
				<div class='cardBodyContentContainer'>
					<div class='cardBodyContent'>
						<p>Number of Reports Awaiting Approval: $numberOfReportsAwaitingApproval</p><br>
						<form action='/brockportforecasting/admin_select_forecast.php'><button >Approve Submitted Forecasts</button></form>
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
?>

</body>
</html>
