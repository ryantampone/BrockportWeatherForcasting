<?php
	include 'header.php';


	//Connect to the DB
	require('db_cn.inc');
	connect_and_select_db(DB_SERVER, DB_UN,DB_PWD,DB_NAME);
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
		<center><h2>Please enter the UserID of the user you would like to remove</h2></center>
    	<div id='userdataform'>
            <form name='form1' action='user_search.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>UserID:</span></td>
                        <td><input name='uid' id='uid' onKeyPress='return isTextCityOrPersonKey(event)' TYPE='text' SIZE='50' required/></td>
                    </tr>
                </table>
								<input TYPE='hidden' name='page' id='page' SIZE='50' value='userRemoveSearch'/>
                <p align='center'>
                    <input type='submit' value='Submit'/>
                    <input type='reset' value='Reset'/>
                </p>
            </form>
        </div>

				<br><center><h4>Or batch remove users based on their registration key</h4></center>

				<div id='batchremoveusersoption'>
						<form name='form2' action='user_batch_remove_search.php' method='post'>
						<table align='center'>
								<tr>
										<td><span align='right'>Registration Key:</span></td>
										<td><select id='registrationKey' name='registrationKey'>";

											$sql = "SELECT DISTINCT registrationKey FROM `user` WHERE status='Active' AND registrationKey not like 'developer' ORDER BY 'registrationKey';";
											$result = mysql_query($sql);
											if (!$result)
											{
												$message = "Error! Unable to retrieve registration keys from the Database: ".mysql_error();
												echo "<SCRIPT LANGUAGE='JavaScript'>
													 window.alert('$message')
													 window.location.href='index.php';
													 </SCRIPT>";
												exit;
											}
											while ($row = mysql_fetch_assoc($result))
											{
												$regKey = $row['registrationKey'];

												echo "<option value='$regKey'>".$regKey."</option>";
											}

										echo "
										</td>
								</tr>
						</table>

								<p align='center'>
										<input type='submit' value='Remove Users with Selected Key'/>
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
