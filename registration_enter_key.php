<?php
	include 'header.php';
?>

<?php
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'admin'))
	{
		session_destroy();
		echo "<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('Please logout to view this page')
			 window.location.href='index.php';
			 </SCRIPT>";
	}
	else
	{
		echo "
		<center><h2>Please enter the registration key provided by your instuctor</h2></center>
			<div id='userdataform'>
						<form action='registration_check_key.php' method='post'>
								<table align='center'>
										<tr>
												<td><span align='right'>Registration Key:</span></td>
												<td><input name='regkey' id='regkey' TYPE='text' SIZE='50' onKeyPress='return isKey(event)' required/></td>
										</tr>
								</table>
								<p align='center'>
										<input type='submit' value='Submit'/>
										<input type='reset' value='Reset'/>
								</p>
						</form>
				</div>
		";

	}
?>

</body>
</html>
