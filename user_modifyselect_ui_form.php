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
		echo "
		<center><h2>Please select a user to modify</h2></center>
    	<div id='userdataform'>
            <form action='user_search.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>UserID:</span></td>
                        <td><input name='uid' id='uid' TYPE='text' SIZE='50' required/></td>
                    </tr>
                </table>
								<input TYPE='hidden' name='page' id='page' SIZE='50' value='userModifySearch'/>
                <p align='center'>
                    <input type='submit' value='Submit'/>
                    <input type='reset' value='Reset'/>
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
