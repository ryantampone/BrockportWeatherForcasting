<?php
	include 'header.php';
	include 'dbh.php';
?>
<?php
		if (isset($_SESSION['id']))
		{
				$group = (string)$_SESSION['access'];
				$loginID = (string)$_SESSION['id'];

				/*
				$sql1 = "SELECT * FROM `emailAndTextNotifications` WHERE id='1'";
				$result1 = mysql_query($sql1);
				echo $result1;
				$message1 = "";

				if (!$result1)
				{
			  	  $message1 = "Error Selecting Faculty Email and Phone: ". mysql_error();
				}
				else
				{
				  $message1 = "Data for User: ($access) $firstname, $lastname updated successfully.";

				}

				show_result($message1);
				*/


				if ($group == 'admin')
				{
					echo "<SCRIPT LANGUAGE='JavaScript'>window.location.href='adminoptions.php';</SCRIPT>";
				}
				else if ($group == 'student')
				{
					echo "<SCRIPT LANGUAGE='JavaScript'>window.location.href='studentoptions.php';</SCRIPT>";
				}
				else if ($group == 'coach')
				{
					echo "<SCRIPT LANGUAGE='JavaScript'>window.location.href='coachoptions.php';</SCRIPT>";
				}

		}
		else
		{
				echo"
						<center>
						<br><br><br><br><br>
						<div id='callToAction'>
						</div>
						<div id='login'>
							<div class='innerTable'>
							<p align='center'><img src='src/login_icon.png' height='110' width='110'/></p>
							<form action='login/login.php' method='POST'>
									<input type='text' name='uid' id='uid' placeholder='Username' required><br><br>
									<input type='password' name='pwd' placeholder='Password' required><br><br>
									<button type='submit' name='submit' id='submit' onClick=''>Login</button>
							</form>
							</div>
						</div>
						</center>
						";
		}


?>




</body>
</html>
