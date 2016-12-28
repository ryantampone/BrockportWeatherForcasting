<?php
	include 'header.php';
	//include 'login/identify.php';
	echo"
		<link href='/brockportforecasting/css/cardStyles.css' type='text/css' rel='stylesheet' />
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	";
?>


<?php
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'admin'))
	{
		echo '
		<div class="cardContainer" style="text-align: center">


			<div class="cardBody">
	      <div class="cardHeader">
	        <div class="cardHeaderTitle">
	            Users
	        </div>
	      </div>

	      <div class="cardBodyContentContainer">
	        <div class="cardBodyContent">
	          <form action="/brockportforecasting/user_add_ui_form.php"><button >Register User</button></form><br>
						<form action="/brockportforecasting/user_modifyselect_ui_form.php"><button >Modify User</button></form><br>
						<form action="/brockportforecasting/user_removeselect_ui_form.php"><button >Remove User</button></form>
	        </div>
	      </div>
	    </div>



			<div class="cardBody">
				<div class="cardHeader">
					<div class="cardHeaderTitle">
							Email and Text Notifications
					</div>
				</div>

				<div class="cardBodyContentContainer">
					<div class="cardBodyContent">
						<center>
						<form action="update_emailAndTextNotifications.php" method="post">
						<table cellpadding="5px">
							<tr>
									<th>
											Contact Person
									</th>
									<th>
											Email Address
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
											<input name="email1" id="email1" TYPE="text" required/>
									</td>
									<td>
											<input name="phone1" id="phone1" TYPE="text" />
									</td>
							</tr>
							<tr>
									<td>
											Head Forecaster:
									</td>
									<td>
											<input name="email2" id="email2" TYPE="text" required/>
									</td>
									<td>
											<input name="phone2" id="phone2" TYPE="text" />
									</td>
							</tr>
						</table>
						<input type="submit" value="Update"/>
						</form>
						</center>
					</div>
				</div>
			</div>


			<div class="cardBody">
				<div class="cardHeader">
					<div class="cardHeaderTitle">
							Manage Emailing List
					</div>
				</div>

				<div class="cardBodyContentContainer">
					<div class="cardBodyContent">
						<form action="/brockportforecasting/user_add_ui_form.php"><button >Register User</button></form><br>
						<form action="/brockportforecasting/user_add_ui_form.php"><button >Modify User</button></form><br>
						<form action="/brockportforecasting/user_add_ui_form.php"><button >Remove User</button></form>
					</div>
				</div>
			</div>
		</div>
		';
	}
	else
	{
		//echo "<script type='text/javascript'>alert('Please login to view this page')</script>";
		session_destroy();
		echo "<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('Please Login as an Admin to View This Page')
			 window.location.href='index.php';
			 </SCRIPT>";
	}
?>

</body>
</html>
